<?php

namespace App\Http\Controllers\SalesHistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesHistory;
use App\Models\Category;
use DB;

class SalesHistoryController extends Controller
{
    public function salesHistory(){
        $categories = Category::all();
        return view('Admin.pages.SalesHistory.AddSalesHistory', ['categories'=>$categories]);
    }

    public function storeSalesHistory(Request $request){
        $month = $request->month;
        $year = $request->year;
        $cat_id = $request->cat_id;
        $amount = $request->amount;
        $salesRow = SalesHistory::where('year', $year)->where('category_id', $cat_id)->first();
        if($salesRow){
            $salesRow->$month = $amount;
            if($salesRow->save()){
                $years = SalesHistory::select('year')->distinct()->get();
                $sales = SalesHistory::where('year',$year)->get();
            }
        }

        $salesRow = new SalesHistory();
        $salesRow->category_id = $cat_id;
        $salesRow->year = $year;
        $salesRow->$month = $amount;
        if($salesRow->save()){
            $years = SalesHistory::select('year')->distinct()->get();
            $sales = SalesHistory::where('year',$year)->get();
        }
        return redirect()->back()->with('success','Sales Info Added Successfully');
    }

    public function salesHistoryByMonth($year){
        $years = SalesHistory::select('year')->distinct()->get();
        $sales = DB::table('sales_histories')
                    ->join('categories','sales_histories.category_id','=','categories.id')
                    ->where('year',$year)
                    ->where('january','!=', null)
                    ->select('sales_histories.*', 'categories.name', 'categories.status')
                    ->get();
        return view('Admin.pages.SalesHistory.ShowHistoryByMonth', ['years'=>$years, 'sales'=>$sales, 'year'=>$year, 'month'=>'january']);
    }

    public function postSalesHistoryByMonth(Request $request){
        $years = SalesHistory::select('year')->distinct()->get();
        $sales = DB::table('sales_histories')
                    ->join('categories','sales_histories.category_id','=','categories.id')
                    ->where('year',$request->year)
                    ->where($request->month, '!=', null)
                    ->select('sales_histories.*', 'categories.name', 'categories.status')
                    ->get();

        return view('Admin.pages.SalesHistory.ShowHistoryByMonth', ['years'=>$years, 'sales'=>$sales, 'month'=>$request->month, 'year'=>$request->year]);
    }

    public function salesHistoryByYear($year){
        $years = SalesHistory::select('year')->distinct()->get();
        $sales = DB::table('sales_histories')
                    ->join('categories','sales_histories.category_id','=','categories.id')
                    ->where('year',$year)
                    ->select('sales_histories.*', 'categories.name', 'categories.status')
                    ->get();

        $profit = array_fill(0,12, 0);
        for($j=0; $j<sizeof($sales); $j++){
            if($sales[$j]->status=="Debit"){
                $profit[0] += $sales[$j]->january;
                $profit[1] += $sales[$j]->february;
                $profit[2] += $sales[$j]->march;
                $profit[3] += $sales[$j]->april;
                $profit[4] += $sales[$j]->may;
                $profit[5] += $sales[$j]->june;
                $profit[6] += $sales[$j]->july;
                $profit[7] += $sales[$j]->august;
                $profit[8] += $sales[$j]->september;
                $profit[9] += $sales[$j]->october;
                $profit[10] += $sales[$j]->november;
                $profit[11] += $sales[$j]->december;
            }
            else{
                $profit[0] -= $sales[$j]->january;
                $profit[1] -= $sales[$j]->february;
                $profit[2] -= $sales[$j]->march;
                $profit[3] -= $sales[$j]->april;
                $profit[4] -= $sales[$j]->may;
                $profit[5] -= $sales[$j]->june;
                $profit[6] -= $sales[$j]->july;
                $profit[7] -= $sales[$j]->august;
                $profit[8] -= $sales[$j]->september;
                $profit[9] -= $sales[$j]->october;
                $profit[10] -= $sales[$j]->november;
                $profit[11] -= $sales[$j]->december;
            }
        }
        $total_profit =0;
        for($i=0; $i<12; $i++){
            $total_profit += $profit[$i];
        }

        return view('Admin.pages.SalesHistory.ShowHistoryByYear', ['years'=>$years, 'sales'=>$sales, 'month'=>'january', 'year'=>$year , 'profit' => $profit, 'total_profit'=>$total_profit]);
    }

    public function postSalesHistoryByYear(Request $request){
        $years = SalesHistory::select('year')->distinct()->get();
        $sales = DB::table('sales_histories')
                    ->join('categories','sales_histories.category_id','=','categories.id')
                    ->where('year',$request->year)
                    ->select('sales_histories.*', 'categories.name', 'categories.status')
                    ->get();
        $profit = array_fill(0,12, 0);
        for($j=0; $j<sizeof($sales); $j++){
            if($sales[$j]->status=="Debit"){
                $profit[0] += $sales[$j]->january;
                $profit[1] += $sales[$j]->february;
                $profit[2] += $sales[$j]->march;
                $profit[3] += $sales[$j]->april;
                $profit[4] += $sales[$j]->may;
                $profit[5] += $sales[$j]->june;
                $profit[6] += $sales[$j]->july;
                $profit[7] += $sales[$j]->august;
                $profit[8] += $sales[$j]->september;
                $profit[9] += $sales[$j]->october;
                $profit[10] += $sales[$j]->november;
                $profit[11] += $sales[$j]->december;
            }
            else{
                $profit[0] -= $sales[$j]->january;
                $profit[1] -= $sales[$j]->february;
                $profit[2] -= $sales[$j]->march;
                $profit[3] -= $sales[$j]->april;
                $profit[4] -= $sales[$j]->may;
                $profit[5] -= $sales[$j]->june;
                $profit[6] -= $sales[$j]->july;
                $profit[7] -= $sales[$j]->august;
                $profit[8] -= $sales[$j]->september;
                $profit[9] -= $sales[$j]->october;
                $profit[10] -= $sales[$j]->november;
                $profit[11] -= $sales[$j]->december;
            }
        }

        $total_profit =0;
        for($i=0; $i<12; $i++){
            $total_profit += $profit[$i];
        }

        return view('Admin.pages.SalesHistory.ShowHistoryByYear', ['years'=>$years, 'sales'=>$sales, 'month'=>$request->month, 'year'=>$request->year , 'profit' => $profit, 'total_profit'=>$total_profit]);
    }

    public function editSalesHistory($id, $year, $month){
        $sales = DB::table('sales_histories')
                    ->join('categories','sales_histories.category_id','=','categories.id')
                    ->where('year',$year)
                    ->where($month, '!=', null)
                    ->select('sales_histories.*', 'categories.name', 'categories.status')
                    ->first();
        return view('Admin.pages.SalesHistory.EditSalesHistory', ['sales' =>$sales, 'year'=>$year, 'month'=>$month]);
    }

    public function updateSalesHistory(Request $request){
        $month = $request->month;
        $year = $request->year;
        $id = $request->id;

        $amount = $request->amount;
        $salesRow = SalesHistory::find($id);
        if($salesRow){
            $salesRow->$month = $amount;
            $salesRow->save();
            return redirect()->back()->with('success','Sales Info Updated Successfully');
        }
        return redirect()->back()->with('error','Failed To Update Sales Info');
    }


    public function deleteSalesHistory($id, $year, $month){
        $salesRow = SalesHistory::find($id);
        if($salesRow){
            $salesRow->$month = null;
            $salesRow->save();
            if($salesRow->january==null && $salesRow->february==null && $salesRow->march==null && $salesRow->april==null && $salesRow->may==null && $salesRow->june==null && $salesRow->july==null && $salesRow->august==null && $salesRow->september==null && $salesRow->october==null && $salesRow->november==null && $salesRow->december==null ){
                SalesHistory::where('id',$id)->delete();
            }
        }
        return redirect('admin/sale-history-by-month'.'/'.$year);

    }


}
