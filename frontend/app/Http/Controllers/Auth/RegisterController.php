<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use App\Helpers\GuzzleHelper;
use App\Http\Requests\Auth\RegisterRequest;

use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $client = GuzzleHelper::get();
        $response = $client->request('POST', env('API_URL') . '/register',
            [
                'json' => [
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'name' => $request->input('name'),
                    'password_confirmation' => $request->input('password_confirmation'),
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type'=> 'application/json'
                ]
            ]
        );

        $response_body = json_decode($response->getBody());
        if($response->getStatusCode() == 200) {
            if($response_body->status == true) {
                Session::flash('message', "Registrasi berhasil! silahkan login.");
                Session::flash('alert-class', "info");
                return redirect()->route('auth.login');
            }
        } else {
            Session::flash('notif-message', $response_body->message);
            Session::flash('notif-type', "infoToast");
            return redirect()->back()->withInput()->withErrors($response_body->errors);
        }

        Session::flash('message', "Username atau Password salah!");
        Session::flash('alert-class', "warning");
        return redirect()->back()->withInput();
    }
}
