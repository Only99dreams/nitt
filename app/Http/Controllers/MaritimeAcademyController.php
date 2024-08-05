<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritimeAcademy;

class MaritimeAcademyController extends Controller
{
    public function marineAcad()
    {
        return view('marineAcad');
    }
}
