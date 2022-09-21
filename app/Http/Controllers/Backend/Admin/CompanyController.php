<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Company;
use App\Models\CompanyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public $photo_saved_path = 'admin/company/';

    public function index(){
        $companies = Company::all();
        return view('admin.companies.index',compact('companies'));
    }

    public function create(){
        $company_types = CompanyType::all();
        return view('admin.companies.create',compact('company_types'));

    }

    public function store(Request $request){
       
        $photonames = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $each_photo) {
                $photoname = uniqid() . '_' . date('Y-m-d-H-i-s') . '.' . $each_photo->getClientOriginalExtension();
                Storage::put(
                    $this->photo_saved_path . $photoname,
                    file_get_contents($each_photo->getRealPath())
                );
                $photonames[] = ['file_name' => $photoname];
            }
        }

        $company = Company::create([
            'company_type_id' => $request->company_type_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $photonames[] = ['company_id' => $company->id];

        if (count($photonames)) {
            $company->photos()->createMany($photonames);
        }

        return redirect()->route('admin.companies.index');
    }

    public function edit(Company $company,Request $request){
        $company = Company::find($company->id);
        $company_types = CompanyType::all();

        return view('admin.companies.edit',compact('company','company_types'));

    }

    public function update(Company $company, Request $request){
        $photonames = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $each_photo) {
                $photoname = uniqid() . '_' . date('Y-m-d-H-i-s') . '.' . $each_photo->getClientOriginalExtension();
                Storage::put(
                    $this->photo_saved_path . $photoname,
                    file_get_contents($each_photo->getRealPath())
                );
                $photonames[] = [
                    'file_name' => $photoname];
            }
        }

        $company->update([
            'company_type_id' => $request->company_type_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if (count($photonames)) {
            foreach ($company->photos as $photo) {
                Storage::delete($this->photo_saved_path . $photo->name);
                $photo->delete();
            }

            $company->photos()->createMany($photonames);
        }

        return redirect()->route('admin.companies.index');

    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->back();

    }
}
