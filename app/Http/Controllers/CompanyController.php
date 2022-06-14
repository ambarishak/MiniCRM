<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $companies = Company::latest()->paginate(3);
        return view('company.companylist',compact('companies'));
    }
    
    public function create(Request $request){
        return  view('company.createcompany');
    }

    public function store(Request $request)
    {
       
        $companydata= request()->except('logo');
        $image = request()->logo;
       
        if($image)
        {
        
          $companydata['logo']=Storage::disk('local')->put('public', $image);
        }
        $company = new Company;
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website = $request->website;
            $company->save();
        return redirect()->route('companies');
    }

    public function edit($id){
        $company = Company::find($id);
        
        return view('company.editcompany',compact('company'));
    }

    public function distroy($id){
        $company = Company::find($id);
        if(isset($company->logo)){
        Storage::delete($company->logo);
        }
        $company->delete();
        return redirect()->route('companies');
    }

    public function update(Request $request,$id){
        $companydata = Company::find($id);

        $image=$request->logo;
        if($image){
        Storage::delete($companydata->logo);
        $companydata->logo = Storage::disk('local')->put('public', $image);        
        } 
        $companydata->name = $request->name;
        $companydata->email = $request->email;
        $companydata->website = $request->website;
        $companydata->save();
        return redirect()->route('companies');
    }
}
