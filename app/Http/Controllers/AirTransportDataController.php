<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AirTransportData;

class AirTransportDataController extends Controller
{
    public function airTransport()
    {
        return view('airTransport');
    }
}
