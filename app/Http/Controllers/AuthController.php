<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //

    public function register(RegisterRequest $request) {

       $user = User::create($request->only('nom','prenom','email')+[
            "password" => Hash::make($request->password)
       ]);
       return response($user , Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request) {
        if (Auth::attempt($request->only('email','password'))) {
           $user = Auth::user();
           $token = $user->createToken('admin')->accessToken;
           return [
                'token' => $token,
           ];
        }

        return response([
            'error' => "Token invalide",
        ],Response::HTTP_UNAUTHORIZED);

    }

    public function getCurrentUser() {
        // if(Auth::hasUser()){
        //     return response(Auth::user());
        // }
        return response(['error' => "User not connected"],Response::HTTP_OK);
    }
}
