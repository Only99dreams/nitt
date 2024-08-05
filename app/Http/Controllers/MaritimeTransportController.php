<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritimeTransport;

class MaritimeTransportController extends Controller
{
    public function marineTransport()
    {
        return view('marineTransport');
    }
}
