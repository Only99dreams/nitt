<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritimeAdministration;

class MaritimeAdministrationController extends Controller
{
    public function marineAdmin()
    {
        return view('marineAdmin');
    }
}
