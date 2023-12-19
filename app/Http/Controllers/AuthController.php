<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $attr = $request->validate([
            // 'image',  =>  "mimes:jpeg,png,jpg,gif,svg|max:4096",
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);

        //   if($attr['CustomerStoreName'] == ''){
        //     $attr['CustomerStoreName'] ==  'Null';
        // }

        $user = User::create([
            'name' => $attr['name'],
            'email' => $attr['email'],
            'password' => Hash::make($attr['password']),
         ]);


        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);

    }



    // To login User.......................................
    public function login(Request $request){
        $attr = $request->validate([
            'email'  => 'required', 
            'password'  => 'required', 

        ]);



        if(!Auth::attempt($attr))
        {
            return response([
                'message' => 'Invalid User Name or password'
            ] , 403);
        }

        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);

    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout Success'
        ] , 200);
    }
    public function user(){
        return response([
            'user' => auth()->user()
        ], 200);
    }

}
