<?php

namespace App\Http\Controllers;

class SpaController extends Controller
{
    public function index()
    {
        return view('spa', [
            'userApiToken' => \Auth::user()->api_token,
        ]);
    }
}
