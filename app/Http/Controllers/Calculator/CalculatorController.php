<?php

namespace App\Http\Controllers\Calculator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calculator;
use Illuminate\Support\Facades\DB;
use Excel;

class CalculatorController extends Controller
{
    public function addAmazonCSV()
    {
        return view('Admin.pages.Product.AddAmazonFromCSV');
    }
    public function storeAmazonCSV(Request $req)
    {
        if ($req->hasfile('csv')) {
            $data = Excel::toArray(new Calculator, $req->file('csv'));
            $data = $data[0];

            //dd($data);
            for ($i = 1; $i < sizeof($data); $i++) {
                $obj = new Calculator();
                $obj->Sku = $data[$i][0];
                $obj->Title = $data[$i][1];
                $obj->QuantityinStock = $data[$i][2];
                $obj->Vendor = $data[$i][3];
                $obj->Brand = $data[$i][4];
                $obj->SmartType = $data[$i][5];
                $obj->TotalOrders = $data[$i][6];
                $obj->UnitsSold = $data[$i][7];
                $obj->Payment = $data[$i][8];
                $obj->ItemPrice = $data[$i][9];
                $obj->Revenue = $data[$i][10];
                $obj->Commission = $data[$i][11];
                $obj->Tax = $data[$i][12];
                $obj->Discount = $data[$i][13];
                $obj->ShippingPrice = $data[$i][14];
                $obj->ShippingCost = $data[$i][15];
                $obj->ItemCost = $data[$i][16];
                $obj->Profit = $data[$i][17];
                $obj->MarginPercentage = $data[$i][18];
                $obj->save();
            }
            return redirect('/admin/amazon-all');
        }
    }

    public function allamazonsales()
    {
        $amazons = Calculator::all();
        $TotalUnitsSold = DB::table("calculators")->get()->sum("UnitsSold");
        $TotalItemCost = DB::table("calculators")->get()->sum("ItemCost");
        return view('Admin.pages.Product.AllAmazonSales', ['amazons' => $amazons, 'TotalUnitsSold' => $TotalUnitsSold, 'TotalItemCost' => $TotalItemCost]);
    }
}
