<?php

namespace App\Http\Controllers\Sku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Sku;
// use App\Http\Requests\Sku\AddSkuRequest;
class SkuController extends Controller
{
    // public function addsku(AddSkuRequest $request)
    // {
    //      $Skus = SKU::create(
    //         $request->validated());

    //     $status = $Skus ? true : false;
    //     if($status)
    //     {
               
    //         return redirect('/Admin/Sku/All');
    //     }
    // }

    //  public function allskus()
    // {
    //     $skus = Sku::all();
    //     $status   = $skus->count() ? true : false;
    //     if($status)
    //     {
    //         return view('Admin.pages.SKU.AllSku',['skus'=>$skus]);
    //     }
        
    // }  

    // public function update($id)
    // {
    //     $sku=Sku::find($id);
    //    return view('Admin.pages.Sku.UpdateSku',['editsku'=>$sku]);
    // }
    // public function updatesku(Request $request,$id)
    // {
    //     $obj=Sku::find($id);
    //     $obj->name=$request->name;
    //     $obj->description=$request->description;
    //        if($obj->save())
    //     {
           
    //         return redirect()->to('/Admin/Sku/All');
    //      }
    // }
    // public function delete($id)
    // {
    //   $obj=Sku::find($id);
    //   if($obj->delete()){
    //     return redirect()->to('/Admin/Sku/All');
    //   }
    // }
}
