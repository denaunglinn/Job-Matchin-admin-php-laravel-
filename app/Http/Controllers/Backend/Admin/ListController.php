<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index(){
        $admin_list = User::select('id','name','email','phone','address','gender')->get();
        return view('admin.lists.index',compact('admin_list'));
    }

    public function destroy($id){
        $admin_list = User::where('id',$id)->first();
        $admin_list->delete();

        return redirect()->back();
    }

    public function searchList(Request $request){
        $admin_list = User::where('name', 'LIKE', "%{$request->list_search}%")
        ->orWhere('email', 'LIKE', "%{$request->list_search}%")
        ->orWhere('phone', 'LIKE', "%{$request->list_search}%")->get();
        return view('admin.lists.index',compact('admin_list'));
    }
}
