<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Helpers\GuzzleHelper;
use Exception;


class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $client = GuzzleHelper::get();
        $response = $client->request('GET', env('API_URL') . '/question', [
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
            'questions' => $this->paginate($response_body->questions->data, $response_body->questions->per_page),
        ];

        return view('admin.question', $data);
    }

    public function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
