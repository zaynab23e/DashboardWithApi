<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacie;
use App\Http\Requests\setstore;
use App\Http\Requests\setupdate;


class PharmaciesController extends Controller 
{
    public function index(){
        $Pharmacies= Pharmacie::all();
        return view("Pharmacies.index",compact("Pharmacies"));
    }


    public function create(){
        return view("Pharmacies.create");
    }


    public function store(setstore $request)
    {
        $validatedData = $request->validated();
        $pharmacie = Pharmacie::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
        ]);
    
        return redirect()->route("Pharmacies");
    }
    
    public function show(string $id){
        $pharmacies=Pharmacie::findOrFail($id);
        return view("Pharmacies.show",compact("pharmacies"));
    }

    public function edit(string $id){
        $pharmacies=Pharmacie::findOrFail($id);
        return view("Pharmacies.edit",compact("pharmacies"));
    }

    public function update(setupdate $request, $id){
        $validatedData= $request->validated();
        $pharmacie=Pharmacie::findOrFail($id);
        $pharmacie->update($request->all());
        return redirect()->route("Pharmacies");
    }

    public function destroy(string $id){
        $pharmacie=Pharmacie::findOrFail($id);
        $pharmacie->delete();
        return redirect()->route("Pharmacies");
    }


}
