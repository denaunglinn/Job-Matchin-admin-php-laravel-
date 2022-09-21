<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerRegisterRequest;

class AuthController extends Controller
{
    public function login (CustomerLoginRequest $request){
        $customer = Customer::where('email',$request->email)->first();
        
        if(isset($customer)){
            if(Hash::check($request->password,$customer->password)){
                    return response()->json([
                        'status' => 1,
                        'customer' => $customer,
                        'token' => $customer->createToken(time())->plainTextToken
                    ]);
            }
        }else{
            return response()->json([
                'status' => 0,
                'customer' => null,
                'token' => null,
            ]);
        }
    }

    public function register(CustomerRegisterRequest $request){

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 1,
            'customer' => $customer,
            'token' => $customer->createToken(time())->plainTextToken
        ]);
    }
}
