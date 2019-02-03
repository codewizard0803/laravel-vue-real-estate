<?php

namespace App\Http\Controllers;

use App\City;

class CityController extends Controller
{
    public function index()
    {
        return response()->json(City::all());
    }
}
