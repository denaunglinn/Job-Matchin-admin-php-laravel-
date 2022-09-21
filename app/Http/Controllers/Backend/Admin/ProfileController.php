<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAdminProfileRequest;
use App\Http\Requests\UpdateAdminPasswordRequest;

class ProfileController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $user = User::select('id','name','email','phone','address','gender')->where('id',$id)->first();
        return view('admin.profile.index',compact('user'));
    }

    public function updateProfile(UpdateAdminProfileRequest $request){

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->update();

        return redirect()->back()->with(['success'=> "Successfully Update !"]);
    }

    public function changePassword(){
        $user = auth()->user();
        return view('admin.profile.change_password');
    }

    public function updatePassword(UpdateAdminPasswordRequest $request){
        $user = auth()->user();
        $new_password = Hash::make($request->new_password);
        if(Hash::check($request->old_password,$user->password)){
            $user->password = $new_password ;
            $user->update();
            return redirect()->back()->with(['success'=> "Successfully Changed !"]);
        }
    }
}
