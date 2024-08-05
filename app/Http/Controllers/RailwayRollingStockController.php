<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RailwayRollingStock;

class RailwayRollingStockController extends Controller
{
    public function rollingStock()
    {
        return view('rollingStock');
    }
}
