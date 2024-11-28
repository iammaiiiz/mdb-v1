<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;

class CompanyController extends Controller
{

    public function index(){
        $activateCompanies = Company::where('company_status',0)->get();
        $deactivateCompanies = Company::where('company_status',1)->get();
        return view('companies.companies' , compact('activateCompanies','deactivateCompanies'));
    }
    
    public function show($id){
        $company = Company::where('id',$id)->first();
        $products = Product::where('company_id',$id)->get();
        return view('companies.company' , compact('company','products'));
    }
    
    public function new_company(){
        return view('companies.company_new');
    }
    
    public function store(Request $request){
        try{
            $company = Company::create([
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'company_telephone' => $request->company_telephone,
                'company_email' => $request->company_email,
                'owner_name' => $request->owner_name,
                'owner_number' => $request->owner_mobile_number,
                'owner_email' => $request->owner_email,
                'contact_name' => $request->contact_name,
                'contact_number' => $request->contact_mobile_number,
                'contact_email' => $request->contact_email,
            ]);
            return redirect('/company/new')->with('message','insert company success');
        }catch(Exception $e){
            return redirect('/company/new')->with('message','insert company Error');
        }
    }


    public function edit($id){
        $company = Company::where('id',$id)->first();
        return view('companies.company_edit', compact('company'));
    }


    public function update(Request $request , $id){
        try{
            $company = Company::where('id',$id)->first();
            $company->update([
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'company_telephone' => $request->company_telephone,
                'company_email' => $request->company_email,
                'contact_name' => $request->contact_name,
                'contact_number' => $request->contact_mobile_number,
                'contact_email' => $request->contact_email,
                'owner_name' => $request->owner_name,
                'owner_number' => $request->owner_mobile_number,
                'owner_email' => $request->owner_email,
            ]);
            return redirect("/company/$id/edit")->with('message','edit success');
        }catch(Exception $e){
            return redirect("/company/$id/edit")->with('message','edit error');
        }
    }
    
    public function toggleActivate($id){
        $company = Company::find($id);
        $company->company_status = $company->company_status == 1 ? 0 : 1;
        $company->save();
        return redirect("/companies")->with('message','Toggle activate status success');
    }
}
