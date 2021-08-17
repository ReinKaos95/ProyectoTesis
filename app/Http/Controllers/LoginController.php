<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Str;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:8',
        ]);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($request, 200);
            }else {
                $response = ['message' => "Password Mismatch"];
                return response()->json(['message' => $response], 201);
            }
        } else {
            $response = ['message' => "User doesn't exist"];
            return response($response, 422);
        }
    }
}
