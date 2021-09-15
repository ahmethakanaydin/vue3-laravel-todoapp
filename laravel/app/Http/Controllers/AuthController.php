<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserTable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => $fields['password']
        ]);

         $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
       $name = $request->input("name");
       $email = $request->input("email");
       $password = $request->input("password");

       $sorgu = UserTable::where('email',"=", $email)->where('password','=',$password)->first();

        if(isset($sorgu)==true) {
            return response()->json([
                'status'=> 'Giriş Başarılı!'
            ]);
        } else {
            return response()->json([
                'status'=> 'Giriş Başarısız!'
            ],500);
        }
    }
}

