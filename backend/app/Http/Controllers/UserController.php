<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Session;
use Auth;

use App\Role;
use App\User;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '!=', Auth::user()->id)->orderBy('id', 'desc');
        if($request->input('search')) {
            $users->where('email', $request->input('search'))
            ->where('name', 'LIKE', '%'.$request->input('search').'%');
        }

        $data = [
            'users' => $users->paginate()
        ];

        return view('pages.user.index', $data);
    }

    public function create(Request $request)
    {
        $data = [
            'roles' => Role::orderBy('name', 'asc')->get(),
        ];
        return view('pages.user.create', $data);
    }

    public function store(CreateRequest $request)
    {
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id')
        ];

        User::create($data);
        Session::flash('notif-message', "User berhasil dibuat!");
        Session::flash('notif-type', "infoToast");

        return redirect()->route('user.index');
    }

    public function edit($id, Request $request)
    {
        $user = User::find($id);
        if(!$user) {
            Session::flash('notif-message', "User tidak ditemukan!");
            Session::flash('notif-type', "infoToast");

            return redirect()->route('user.index');
        }

        $data = [
            'roles' => Role::orderBy('name', 'asc')->get(),
            'user' => User::find($id),
        ];
        return view('pages.user.edit', $data);
    }

    public function update($id, UpdateRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'role_id' => $request->input('role_id')
        ];

        if($request->input('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user = User::find($id);
        $user->update($data);

        Session::flash('notif-message', "User berhasil di update!");
        Session::flash('notif-type', "infoToast");

        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if($user) {
            $user->delete();
            Session::flash('notif-message', "User berhasil dihapus!");
            Session::flash('notif-type', "infoToast");
        } else {
            Session::flash('notif-message', "User tidak ditemukan!");
            Session::flash('notif-type', "infoToast");
        }

        return redirect()->back();
    }
}
