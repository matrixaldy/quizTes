<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;

use Auth;
use Session;
use App\User;

class AuthController extends Controller
{
    public function loginPage(Request $request)
    {
        if(Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function doLogin(LoginRequest $request)
    {
        $users = User::where('email', $request->input('email'))->get();
        foreach($users as $user) {
            if(Hash::check($request->input('password'), $user->password)){
                if($user->role_id != 1) {
                    Session::flash('message', "Anda tidak punya izin!");
                    Session::flash('alert-class', "warning");
                    return redirect()->back()->withInput();
                } else {
                    Auth::login($user);
                }
                break;
            }
        }

        if (Auth::check()) {
            Session::flash('notif-message', "Hi! Selamat Datang ".Auth::user()->name);
            Session::flash('notif-type', "infoToast");

            return redirect()->route('quiz.index');
        }

        Session::flash('message', "Username atau Password salah!");
        Session::flash('alert-class', "warning");
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        if(Auth::check()) {
            Auth::logout();
            Session::flush();
        }

        Session::flash('message', "Anda berhasil logout!");
        Session::flash('alert-class', "info");
        // return session()->all();
        return redirect()->intended(route('login'));
    }
}
