<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $name   = $request->input('name');
        $email      = $request->input('email');
        $password   = Hash::make($request->input('password'));

        $register = User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => $password,
            'api_token' => base64_encode(str_random(40))
        ]);

        if ($register) {
            return response()->json([
                'success'   => true,
                'message'   => "Register Success !",
                'data'      => $register,
            ],201);
        }else{
            return response()->json([
                'success'   => false,
                'message'   => "Register Fail !",
                'data'      => '',
            ],400);
        }

    }

    public function login(Request $request)
    {
        $email     = $request->input('email');
        $password  = $request->input('password');

        $user = User::where('email',$email)->first();

        if (Hash::check($password, $user->password)) {
            
            return response()->json([
                'success'   => true,
                'message'   => "Login Success !",
                'data'      => [
                    'user' => $user,
                    'api_token' => $user->api_token,
                ]
            ],201);

        }else{

            return response()->json([
                'success'   => false,
                'message'   => "Login Fail !",
                'data'      => ''
            ],401);
        }
    }
}
