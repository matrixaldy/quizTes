<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('role')->orderBy('id', 'desc');
        return response()->json(['status' => true, 'users' => $users->paginate()]);
    }
}
