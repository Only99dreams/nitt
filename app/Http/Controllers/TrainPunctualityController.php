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


    public function store(Request $request)
    {
        TrainPunctuality::create($request->all());
        return redirect()->route('trains');
    }
    
    public function update(Request $request, $id)
    {
        $train = TrainPunctuality::findOrFail($id);
        $train->update($request->all());
        return redirect()->route('trains');
    }
    
    public function destroy($id)
    {
        TrainPunctuality::destroy($id);
        return redirect()->route('trains');
    }
    
    function trains(){
    
        $trains = TrainPunctuality::all();
    
        return view ('trainPunctuality', compact('trains'));
        
    
        }




}
