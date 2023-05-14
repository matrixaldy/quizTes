<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;

use Session;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $data = [
            'setting' => Setting::find(1)
        ];
        return view('pages.setting', $data);
    }

    public function update(SettingRequest $request)
    {
        $data = [
            'max_score' => $request->input('max_score'),
            'quiz_time' => $request->input('quiz_time'),
        ];

        $setting = Setting::find(1);
        $setting->update($data);

        Session::flash('notif-message', "Setting berhasil diupdate!");
        Session::flash('notif-type', "infoToast");

        return redirect()->route('setting');
    }
}
