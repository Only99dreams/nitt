<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipContainerTraffic;

class ShipContainerTrafficController extends Controller
{
    public function shipContainer()
    {
        return view('shipContainer');
    }
}
