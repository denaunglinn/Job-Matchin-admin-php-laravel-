<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{

    public $photo_saved_path = 'admin/customer/';

    public function index(Request $request){
        $customers = Customer::all();
        return view('admin.customers.index',compact('customers'));
    }
    public function create(Request $request){
        return view('admin.customers.create');
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

        
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->password = Hash::make($request->password);
        $customer->save();

        $photonames[] = ['customer_id' => $customer->id];

        if (count($photonames)) {
            $customer->photos()->createMany($photonames);
        }

        return redirect()->route('admin.customers.index');
    }

    public function edit(Customer $customer){
        return view('admin.customers.edit',compact('customer'));
    }

    public function show(){
            
    }

    public function update(Customer $customer,Request $request){
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

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->update();

        if (count($photonames)) {
            foreach ($customer->photos as $photo) {
                Storage::delete($this->photo_saved_path . $customer->name);
                $photo->delete();
            }

            $customer->photos()->createMany($photonames);
        }

        return redirect()->route('admin.customers.index');

    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('admin.customers.index');
    }
}
