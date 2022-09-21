<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\CompanyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreCompanyTypeRequest;

class CompanyTypeController extends Controller
{
    public function index(){
        $company_types = CompanyType::all();
        return view('admin.company-types.index',compact('company_types'));
    }

    public function create(){
        return view('admin.company-types.create');
    }

    public function store(StoreCompanyTypeRequest $request){
        $company_type = new CompanyType();
        $company_type->name = $request->name;
        $company_type->save();
        
        return redirect()->route('admin.company-types.index');
    }

    public function edit($id){
        $company_type = CompanyType::findOrFail($id);
        return view('admin.company-types.edit',compact('company_type'));
    }

    public function update(StoreCompanyTypeRequest $request,$id){
        $company_type = CompanyType::findOrFail($id);
        $company_type->name = $request->name;
        $company_type->update();
        return redirect()->route('admin.company-types.index');
    }

    public function show(){

    }

    public function destroy(CompanyType $type){

        $company_type = CompanyType::find($type->id);
        $company_type->delete();

        return redirect()->back();
    }
}
