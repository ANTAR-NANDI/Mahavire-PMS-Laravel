<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\AddPayrollRequest;
use App\Models\Employee;

use App\Models\Payroll;
class PayrollController extends Controller
{
    public function addPayroll(AddPayrollRequest $request)
    {
        $payroll = Payroll::create($request->validated());
        return redirect('admin-employee-payroll');
    }  

    public function payroll()
    {
        $employees = Employee::all();
        return view('Admin.pages.Employee.Payroll',['employees'=>$employees]);
    }   

    public function allpayrolls()
    {
        $payrolls = Payroll::all();
        return view('Admin.pages.Employee.AllPayrolls',['payrolls'=>$payrolls]);
    }

}
