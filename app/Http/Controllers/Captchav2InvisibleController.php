<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Captchav2InvisibleController extends Controller
{
    public function index()
    {
        $site_key = \config('captcha.v2-invisible-site-key');

        return view('captchav2-invisible')
            ->with('site_key', $site_key);
    }

    public function store(Request $request)
    {
        $secret = \config('captcha.v2-invisible');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $request['g-recaptcha-response'],
        ]);

        session()->put([
            'payload' => $response->body(),
        ]);

        return redirect()->route('captchav2-invisible');
    }
}
