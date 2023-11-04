<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PassportAuthController extends Controller
{
    public function register() {
        $this -> validate ($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
        ]);

        $token = $user -> createToken ('MuhammedLaravel') -> accessToken;
        return response() -> json(['token' => $token], 200);
    }


    public function login() {
        $date = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];

        if (auth() -> attempt($date)) {
            $token = auth() -> user() -> createToken(['MuhammedLaravel']) -> accessToken;
            return response() -> json (['token' => $token], 200);
        }else{
            return response() -> json (['error' => 'unauthorized'], 401);
        }
    }


    public function userInfo() {
        $user = auth() -> user();
        return response() -> json(['user' => $user], 200);
    }
}
