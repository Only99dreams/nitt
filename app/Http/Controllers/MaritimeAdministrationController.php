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

    public function store(Request $request)
    {
        MaritimeAdministration::create($request->all());
        return redirect()->route('madmins');
    }
    
    public function update(Request $request, $id)
    {
        $madmin = MaritimeAdministration::findOrFail($id);
        $madmin->update($request->all());
        return redirect()->route('madmins');
    }
    
    public function destroy($id)
    {
        MaritimeAdministration::destroy($id);
        return redirect()->route('madmins');
    }
    
    function madmins(){
    
        $madmins = MaritimeAdministration::all();
    
        return view ('marineAdmin', compact('madmins'));
        
    
        }







}
