<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $employees = Employee::join('companies', 'companies.id', '=', 'employees.company_id')
            ->get(['employees.*', 'companies.name as company']); 
        return view('employee.employeelist',compact('employees'));
    }

    public function create(Request $request){
        $companies = Company::all(); 
        return  view('employee.createemployee',compact('companies'));
    }

    public function store(Request $request)
    {
       
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->company_id = $request->company_id;
        $employee->save();
        return redirect()->route('employees');
    }

    public function edit($id){
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('employee.editemployee',compact('employee','companies'));
    }

    public function distroy($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees');
    }

    public function update(Request $request,$id){
        $employeedata = Employee::find($id);

        $employeedata->first_name = $request->first_name;
        $employeedata->last_name = $request->last_name;
        $employeedata->email = $request->email;
        $employeedata->phone_number = $request->phone_number;
        $employeedata->company_id = $request->company_id;
        $employeedata->save();
        return redirect()->route('employees');
    }
}
