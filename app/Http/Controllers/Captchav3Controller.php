<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Captchav3Controller extends Controller
{

    public function index()
    {
        return view('captchav3');
    }

    public function store(Request $request)
    {
        $secret = \config('captcha.v3');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $request['g-recaptcha-response'],
        ]);

        session()->put([
            'payload' => $response->body(),
        ]);

        return redirect()->route('captchav3');
    }
}
