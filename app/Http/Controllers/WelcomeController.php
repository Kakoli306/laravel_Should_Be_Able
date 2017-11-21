<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Product;

class WelcomeController extends Controller
{
    public function index(){
       $allPublishedProduct = Product::where('publication_status',1)
           ->get();
      return view('frontEnd.home.homeContent',['allPublishedProducts'=>$allPublishedProduct]);
    }
    public function newFunction($id){
       $productsByCategoryId= Product::where('category_id',$id)
               ->where('publication_status',1)
               ->get();
      return view('frontEnd.category.categoryContent', ['productsByCategoryId'=>$productsByCategoryId]);
    }

    public function productDetails($id){
      $productById =Product::find($id);
      $categoryId = $productById->category_id;
            $productsByCategoryId = Product::where(['category_id' => $categoryId,'publication_status'=>1])
            ->orderBy('id','desc')
            ->take(10)->get();
      return view('frontEnd.product.productDetails',['productById' => $productById,'productsByCategoryId'=> $productsByCategoryId]);
    }
    public function addStudent(){
        return view('student.add');
    }
    public function saveStudent(Request $request ){
        //return $request->all();
       // $student = new Student();
        //$student->studentName = $request->studentName;
        //$student->phoneNumber = $request->phoneNumber;
       // $student->save();

       // $date = date('Y-M-D');
        DB::table('students')->insert([
           'studentName' => $request->studentName,
            'phoneNumber' => $request->phoneNumber,
        ]);

      //  Student::create($request->all());
        return redirect('/add-student')->with('message','Student info save successfully');
    }
}
