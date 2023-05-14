<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use App\Helpers\GuzzleHelper;

use Session;

class QuizController extends Controller
{
    public function dashboard(Request $request)
    {
        $client = GuzzleHelper::get();
        $response = $client->request('GET', env('API_URL') . '/quiz/info', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type'=> 'application/json',
                'Authorization' => 'Bearer '.$request->session()->get('auth')
            ]
        ]);
        $response_body = json_decode($response->getBody());

        if($response->getStatusCode() == 401) {
            $request->session()->flush();
            return redirect()->route('auth.login')->withErrors($response_body->message);
        }

        $data = [
            'response' => $response_body->data
        ];

        return view('user.pages.dashboard', $data);
    }

    public function start(Request $request)
    {
        $client = GuzzleHelper::get();
        $response = $client->request('POST', env('API_URL') . '/quiz/start', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type'=> 'application/json',
                'Authorization' => 'Bearer '.$request->session()->get('auth')
            ]
        ]);

        $response_body = json_decode($response->getBody());
        if($response->getStatusCode() == 401) {
            $request->session()->flush();
            return redirect()->route('auth.login')->withErrors($response_body->message);
        }

        Session::put('quiz', $response_body->data);
        Session::flash('notif-message', $response_body->message);
        Session::flash('notif-type', "infoToast");
        return redirect()->route('quiz.question');
    }

    public function reloadTime(Request $request)
    {
        $client = GuzzleHelper::get();
        $response = $client->request('GET', env('API_URL') . '/quiz/time', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type'=> 'application/json',
                'Authorization' => 'Bearer '.$request->session()->get('auth')
            ]
        ]);

        $response_body = json_decode($response->getBody());
        return response()->json($response_body);
    }

    public function finish(Request $request)
    {
        $client = GuzzleHelper::get();
        $response = $client->request('POST', env('API_URL') . '/quiz/finish', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type'=> 'application/json',
                'Authorization' => 'Bearer '.$request->session()->get('auth')
            ]
        ]);

        $response_body = json_decode($response->getBody());
        Session::flash('notif-message', "Quiz telah selesai!");
        Session::flash('notif-type', "infoToast");
        return redirect()->route('quiz.index');
    }
}
