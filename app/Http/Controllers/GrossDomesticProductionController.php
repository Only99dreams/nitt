<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrossDomesticProduct;

class GrossDomesticProductionController extends Controller
{
    public function grossDomestic()
    {
        return view('grossDomestic');
    }
}
