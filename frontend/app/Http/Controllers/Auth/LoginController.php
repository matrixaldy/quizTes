<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use App\Helpers\GuzzleHelper;

use Session;

use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(LoginRequest $request)
    {
        $client = GuzzleHelper::get();
        $response = $client->request('POST', env('API_URL') . '/login',
            [
                'json' => [
                    'email' => $request->input('email'),
                    'password' => $request->input('password')
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
                Session::flash('notif-message', "Hi! Selamat Datang ".$response_body->data->name);
                Session::flash('notif-type', "infoToast");
                Session::put(['user' => $response_body->data, 'auth' => $response_body->token]);
                if($response_body->data->role_id == 2) {
                    return redirect()->route('quiz.index');
                }

                return redirect()->route('question.index');
            }
        }

        Session::flash('message', "Username atau Password salah!");
        Session::flash('alert-class', "warning");
        return redirect()->back()->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('auth.login')->withErrors('Logout successful');
    }

    public function session(Request $request)
    {
        $data = $request->session()->all();
        return $data;
    }
}
