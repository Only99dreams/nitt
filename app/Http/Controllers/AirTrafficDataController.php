<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AirTrafficDataController extends Controller
{
    public function airTraffic()
    {
        return view('airTraffic');
    }
}
