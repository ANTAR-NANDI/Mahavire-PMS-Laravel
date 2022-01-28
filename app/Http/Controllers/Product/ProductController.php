<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\AddProductRequest;
use App\Models\Product;
use App\Models\DebitCredit;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Excel;
class ProductController extends Controller
{
   public function product()
    {
        return view('Admin.pages.Product.AddProduct');
        
    }   

   public function addproduct(Request $request)
    {
     
        $obj=new Product();
        $obj->sku=$request->sku;
        $obj->title=$request->title;
        $obj->cost=$request->cost;
        $obj->shipping=$request->shipping;
        $obj->commision=$request->commision;
        $obj->profit=$request->profit;
        $obj->max_price =$request->max_price;
        $obj->item_price = ($request->profit + $request->cost + $request->shipping + $request->commision);
        $obj->Min_Price = $obj->item_price;
          // dd($obj);
        
        if($obj->save())
        {
            return redirect('/admin/product-all');
        }
        return redirect()->back()->with('error','Failed to store product!');
    }
    public function allproducts()
    {
        $products = Product::all();
        $status   = $products->count() ? true : false;
        return view('Admin.pages.Product.AllProduct',['products'=>$products]);   
    }
    
    
    public function getUpdatedProduct($id){
        $editproduct=Product::find($id);
        return view('Admin.pages.Product.UpdateProduct',['editproduct'=>$editproduct]);
    }
    public function updateProduct(Request $request,$id)
    {
        $obj=Product::find($id);
        $obj->sku=$request->sku;
        $obj->title=$request->title;
        $obj->cost=$request->cost;
        $obj->shipping=$request->shipping;
        $obj->commision=$request->commision;
        $obj->profit=$request->profit;
        $obj->max_price =$request->max_price;
        $obj->item_price =($request->profit + $request->cost + $request->shipping + $request->commision);
        $obj->min_price = $obj->item_price;
        if($obj->save())
        {
            return redirect('/admin/product-all');
        }
        return redirect()->back()->with('error','Failed to update product!');
    }

    public function deleteProduct($id)
    {
        $obj=Product::find($id);
        if($obj->delete()){
            return redirect()->to('/admin/product-all');
        }
    }


    public function insert()
    {
        $employees = Category::all();
        $status   = $employees->count() ? true : false;
        if($status)
        {
            return view('Admin.pages.Debit-Credit',['employees'=>$employees]);
        }
    }

    public function addProductCSV(){
        return view('Admin.pages.Product.AddProductFromCSV');
    }

    public function storeProductCSV(Request $req){
        if($req->hasfile('csv')){
            $data = Excel::toArray(new Product, $req->file('csv'));
            $data = $data[0];
            //dd($data);

            for($i=1; $i<sizeof($data); $i++){
                $obj=new Product();
                $obj->sku=$data[$i][0];
                $obj->title=$data[$i][1];
                $obj->cost=$data[$i][2];
                $obj->shipping=$data[$i][3];
                $obj->commision=$data[$i][4];
                $obj->profit=$data[$i][5];
                $obj->max_price =$data[$i][8];
                $obj->item_price = ($data[$i][5] + $data[$i][2] + $data[$i][3] + $data[$i][4]);
                $obj->Min_Price = $obj->item_price;
                $obj->save();
            }
            return redirect('/admin/product-all');
        }
    }
    
    
}
