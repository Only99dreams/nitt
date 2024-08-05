<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainPunctuality;

class TrainPunctualityController extends Controller
{
    public function trainPunctuality()
    {
        return view('trainPunctuality');
    }
}
