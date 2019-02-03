<?php

namespace App\Http\Controllers;

use App\Developer;

class DeveloperController extends Controller
{
    public function index()
    {
        return response()->json(Developer::all());
    }
}
