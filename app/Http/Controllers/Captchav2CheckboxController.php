<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Captchav2CheckboxController extends Controller
{
    public function index()
    {
        $site_key = \config('captcha.v2-checkbox-site-key');

        return view('captchav2-checkbox')
            ->with('site_key', $site_key);
    }

    public function store(Request $request)
    {
        $secret = \config('captcha.v2-checkbox');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $request['g-recaptcha-response'],
        ]);

        session()->put([
            'payload' => $response->body(),
        ]);

        return redirect()->route('captchav2-checkbox');
    }
}
