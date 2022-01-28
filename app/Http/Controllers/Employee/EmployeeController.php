<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Employee\AddEmployeeRequest;
use App\Http\Requests\Employee\AddPayrollRequest;
use App\Models\Employee;

use App\Models\Payroll;
class EmployeeController extends Controller
{
    public function addemployee(AddEmployeeRequest $request)   
    {
         $employee = Employee::create(
            $request->validated());

        $status = $employee ? true : false;
        if($status)
        {
               
            return redirect('admin/all-employees');
        }
    }

     public function employee()   
    {
         return view('Admin.pages.Employee.AddEmployee');
    }
    
    public function allemployees()
    {
        $employees = Employee::all();
            return view('Admin.pages.Employee.AllEmployees',['employees'=>$employees]);
    }   
    
    
     public function update($id)
    {
        $employee=Employee::find($id);
       return view('Admin.pages.Employee.UpdateEmployee',['editemployee'=>$employee]);
    }
     
    public function updateemployee(Request $request,$id)
    {
        $obj=Employee::find($id);
        $obj->name=$request->name;
        $obj->designation=$request->designation;
           if($obj->save())
        {
           
            return redirect()->to('admin/all-employees');
         }
    }


    public function delete($id)
    {
      $obj=Employee::find($id);
      if($obj->delete()){
        return redirect()->to('admin/all-employees');
      }
    }

   
}
