<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\City;
use App\Models\Specialization;
use App\Http\Requests\storeOffer;
use App\Http\Requests\updeatedAllOffers;
class OffersController extends  Controller
{
    //_____________________________________________________________________________________________________________________________________________________________________
    public function index()
    {
    
        $offers=Offer::with(['City','Specialization'])->get();
        $Specialization=Specialization::all();
        $City=City::all();
        return view('offers.index', compact('offers','Specialization','City'));
    }
    //_____________________________________________________________________________________________________________________________________________________________________
    public function create()
    {
        $cities = City::all();
        $specializations = Specialization::all();
        return view('offers.create', compact('cities','specializations'));
    }
    //_____________________________________________________________________________________________________________________________________________________________________
    public function store(storeOffer $request)
    {
        
$validatedData = $request->validated();
     // Check if an image is uploaded
     $image = $request->hasFile('image') 
     ? $request->file('image')->store('images', 'public') // Save the image and store its path
     : null; // No image provided

Offer::create([
    'name'=> $validatedData['name'],
    'image' => $image, 
    'title'=> $validatedData['title'],
    'address'=> $validatedData['address'],
    'newPrice'=> $validatedData['newPrice'],
    'oldPrice'=> $validatedData['oldPrice'],
    'city_id'          => $validatedData['city'], 
    'specialization_id' => $validatedData['specialization'], 
]);

return redirect()->route('offers.index')->with('success','SUCCESS');


    }
    // $validatedData = $request->validated();
        // $city = City::where('name', $validatedData['city'])->first();
        // $specialization = Specialization::where('name', $validatedData['specialization'])->first();
        
        // $offer = Offer::create([
        //     'name' => $validatedData['name'],
        //     'image' => $validatedData['image'], 
        //     'title' => $validatedData['title'],
        //     'address' => $validatedData['address'],
        //     'newPrice' => $validatedData['newPrice'],
        //     'oldPrice' => $validatedData['oldPrice'],
        //     'specialization_id' => $specialization->id,
        //     'city_id' => $city->id,
        // ]);
        
        // return redirect()->route('offers');
    //_____________________________________________________________________________________________________________________________________________________________________
    public function show(string $id)
    {
            $offers= Offer::findOrFail($id);
            return view('offers.show', compact('offers'));
    }
    //_____________________________________________________________________________________________________________________________________________________________________
    public function edit(string $id)
    {
        $Specializations=Specialization::all();
        $Cities=City::all();
        $offers= Offer::findOrFail($id);
        return view('offers.edit', compact('offers','Specializations', 'Cities'));
    }
    //_____________________________________________________________________________________________________________________________________________________________________
    public function update(updeatedAllOffers $request, string $id)
    {
        $validatedData = $request->validated();
    
        $offer = Offer::findOrFail($id);
    
        $image = $request->hasFile('image') 
            ? $request->file('image')->store('images', 'public') 
            : $offer->image;
    
        $offer->update([
            'name'             => $validatedData['name'],
            'image'            => $image,
            'title'            => $validatedData['title'],
            'address'          => $validatedData['address'],
            'newPrice'         => $validatedData['newPrice'],
            'oldPrice'         => $validatedData['oldPrice'],
            'city_id'          => $validatedData['city'],
            'specialization_id'=> $validatedData['specialization'],
        ]);
    
        return redirect()->route('offers.index');
    }
    
    //_____________________________________________________________________________________________________________________________________________________________________
    public function destroy(string $id)
    {
        $offers= Offer::with(['city', 'specialization'])->findOrFail($id);  
        $offers->delete();  
        return redirect()->route('offers.index');
    }

}
