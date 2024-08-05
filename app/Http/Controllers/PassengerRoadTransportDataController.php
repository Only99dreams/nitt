<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PassengerRoadTransportData;

class PassengerRoadTransportDataController extends Controller
{
    public function passengerRoad()
    {
        return view('passengerRoad');
    }
}
