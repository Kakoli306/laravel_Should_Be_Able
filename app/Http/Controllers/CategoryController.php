<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.addCategory');
        
         
    }
    public function saveCategory(Request $request){
       // return $request->all();
        Category::create($request->all());
        return redirect('/category/add')->with('message','Category info created successfully');
    }
    public function manageCategory(){
        $categories = Category::all();
         return view('admin.category.manageCategory',['categories'=>$categories]);
    }
    public function unpublishedCategory($id){
        //$CategoryById = Category::find($id);
        //$CategoryById->publication_status = 0;
        //$CategoryById->save();
        
        DB::table('categories')->where('id',$id)->update(['publication_status' => 0]);
        return redirect('/category/manage')->with('message','Category info unpublished successfully');
    }
    
    public function publishedCategory($id){
        //$CategoryById = Category::find($id);
        //$CategoryById->publication_status = 0;
        //$CategoryById->save();
        
        DB::table('categories')->where('id',$id)->update(['publication_status' => 1]);
        return redirect('/category/manage')->with('message','Category info published successfully');
    }
    public function editCategory($id){
        $categoryById = Category::find($id);
        return view('admin.category.editCategory',['categoryById'=> $categoryById]);
    }
    public function updateCategory(Request $request){
        $categoryId = $request->category_id;
        $category=Category::find($categoryId);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status= $request->publication_status;
        $category->save();
        return redirect('/category/manage')->with('message','Category info updated successfully');

    }
    
    

    
    public function deleteCategory(Request $request){
        
        $category = Category::find($request->category_id);
        $category->delete();
        return redirect('/category/manage')->with('message','Category info deleted successfully');

    }
}
