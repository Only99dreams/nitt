<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreightRoadTransportData;

class FreightRoadTransportDataController extends Controller
{
    public function freightRoad()
    {
        return view('freightRoad');
    }
}
