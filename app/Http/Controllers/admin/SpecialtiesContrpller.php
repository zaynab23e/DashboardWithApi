<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecialtiesContrpller extends Controller
{
    public function index()
    {
        $Specializations= Specialization::all();
        return view("specialization.index", compact("Specializations"));
    }

//_______________________________________________________________________________________________________________________________________
    public function create()
    {
        return view('specialization.create');
    }

 //_________________________________________________________________________________________________________________________________________
    public function store(request $request)
    {
        $valedatedData= $request->validate([
'name'=>'required|string',
        ]);
        Specialization::create([
        'name'=> $valedatedData['name'],
        ]);
        return redirect()->route('Specialties.index');
    }
//____________________________________________________________________________________________________________________________________________
    public function show(string $id)
    {
        $Specialization= Specialization::find($id);
        return view('specialization.show', compact('Specialization'));
    }
//__________________________________________________________________________________________________________________________________________
    public function edit(string $id)
    {
        $Specialization= Specialization::find($id);
        return view('specialization.edit', compact('Specialization'));
    }
//_______________________________________________________________________________________________________________________________________
public function update(Request $request, string $id)
{
        $request->validate([
        'name' => 'required|string',
    ]);
    $reservation = Specialization::findOrFail($id);
    $reservation->update($request->all());
    return redirect()->route('Specialties.index');
}
//_______________________________________________________________________________________________________________________________________
    public function destroy(string $id)
    {
        $Specialties=Specialization::findOrFail($id);
        $Specialties->delete();
        return redirect()->route('Specialties.index');
    }

//_____________________________________________________________________________________________________________________________

}
