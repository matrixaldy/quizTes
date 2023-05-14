<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;

use App\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $token =  $user->createToken('Personal Access Token')->accessToken;
            return response()->json(['status' => true, 'data' => $user, 'token' => $token], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function profile()
    {
        $profile = User::with('role')->find(Auth::user()->id);
        return response()->json(['status'=> true, 'data' => $profile]);
    }

    public function register(RegisterRequest $request)
    {
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 2
        ];

        User::create($data);
        return response()->json(['status'=> true, 'message' => "Registrasi Berhasil!"]);
    }
}
