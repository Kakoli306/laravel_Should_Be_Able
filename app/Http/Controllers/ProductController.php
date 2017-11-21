<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
Use Image;
use App\Product;
use DB;

class ProductController extends Controller {

    public function index() {
        $publishedCategories = Category::where('publication_status', 1)->get();
        $publishedManufacturers = Manufacturer::where('publication_status', 1)->get();
        return view('admin.product.addProduct', ['publishedCategories' => $publishedCategories, 'publishedManufacturers' => $publishedManufacturers]);
    }

    public function productFormValidation($request) {
        $this->validate($request, [
            'product_name' => 'required|max:100',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_image' => 'required',
        ]);
    }

    public function productImageUpload($request) {
        $productImage = $request->file('product_image');
        $fileExtension = $productImage->getClientOriginalExtension();
        $uploadPath = 'product_images/';
        // dd($productImage);
        $imageName = $request->product_name . '.' . $fileExtension;
        $imageUrl = $uploadPath . $imageName;
        Image::make($productImage)->resize(200, 200)->save($uploadPath . $imageName);
        return $imageUrl;
    }

    public function saveProductBasicInfo($request, $imageUrl) {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_long_description = $request->product_long_description;
        $product->product_short_description = $request->product_short_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function saveProduct(Request $request) {


        //$productImage =  $request->file('product_image');
        //$uploadPath='product_image/';
        // $imageExtension= $productImage->getClientOriginalExtension();
        // $imageName= strtolower($request->product_name).'.'.$imageExtension;
        //  $productImage->move($uploadPath,$imageName);
        // return 'success';
        // return $productImage->getClientOriginalName();
        // dd($productImage);

        $this->productFormValidation($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductBasicInfo($request, $imageUrl);
        return redirect('product/add')->with('message', 'Product info save successfully');
    }

    public function manageProduct() {
        //$products = Product::all();
        $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                 ->select('products.*', 'categories.category_name', 'manufacturers.manufacturer_name')
                ->get();
        //echo '<pre>';
      //  print_r($products);
        //exit();
         return view('admin.product.manageProduct',['products'=>$products]);
    }
    
    public function deleteProduct(Request $request){
      $productById  = Product::find($request->product_id);
      unlink($productById->product_image);
      $productById -> delete();
      return redirect('product/manage')->with('message', 'Product info deleted successfully');
    }
}
