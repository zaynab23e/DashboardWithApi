<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view("cities.index", compact("cities"));
    }

//_______________________________________________________________________________________________________________________________________
    public function create()
    {
        return view('cities.create');
    }

 //_________________________________________________________________________________________________________________________________________
    public function store(request $request)
    {
        $valedatedData= $request->validate([
'name'=>'required|string',
        ]);
        City::create([
        'name'=> $valedatedData['name'],
        ]);
        return redirect()->route('city.index');
    }
//____________________________________________________________________________________________________________________________________________
    public function show(string $id)
    {
        $city = City::find($id);
        return view('cities.show', compact('city'));
    }
//__________________________________________________________________________________________________________________________________________
    public function edit(string $id)
    {
        $city = City::find($id);
        return view('cities.edit', compact('city'));
    }
//_______________________________________________________________________________________________________________________________________
public function update(Request $request, string $id)
{
        $request->validate([
        'name' => 'required|string',
    ]);
    $reservation = City::findOrFail($id);
    $reservation->update($request->all());
    return redirect()->route('city.index');
}
//_______________________________________________________________________________________________________________________________________
    public function destroy(string $id)
    {
        $city=City::find($id);
        $city->delete();
        return redirect()->route('city.index');
    }

//_____________________________________________________________________________________________________________________________

}
