<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Employee\AddEmployeeRequest;
use App\Models\Category;
use App\Models\Employee;
use Session;
use App\Models\Product;
class AdminController extends Controller
{
    public function category()
    {
        return view('Admin.pages.Category.AddCategory');
    }   
     public function addcategory(AddCategoryRequest $request)
    {
        $category = Category::create(
            $request->validated());

        $result = $category ? true : false;
        if($result)
        {
               
            return redirect('/admin/all-categories');
        }
    }
    public function allcategories()
    {
        $categories = Category::all();
            return view('Admin.pages.Category.AllCategories',['categories'=>$categories]);
    
    }
     public function update($id)
    {
        $category=Category::find($id);
       return view('Admin.pages.Category.UpdateCategory',['editcategory'=>$category]);
    }
    public function updatecategory(Request $request,$id)
    {
        $obj=Category::find($id);
        $obj->name=$request->name;
        $obj->status=$request->status;
           if($obj->save())
        {
           
            return redirect()->to('/admin/all-categories');
         }
    }
     public function home()
    {
      $employee = Employee::count();
        $category = Category::count();
         $product = Product::count();
     return view('Admin.pages.index',['product'=>$product,'employee'=>$employee,'category'=>$category]);
    }
    public function delete($id)
    {
      $obj=Category::find($id);
      if($obj->delete()){
        return redirect()->to('/Admin/Category/All');
      }
    }
     public function logout()
    {
         Session::flush();
       return redirect()->to('/');
    }
     
}
