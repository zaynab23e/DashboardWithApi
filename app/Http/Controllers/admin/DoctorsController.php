<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Doctor;

use App\Models\City;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeAll;
use App\Http\Requests\updateAll;
use Auth;
class DoctorsController extends Controller
{


//______________________________________________________________________________________________
    public function index()
    {
        $doctors = Doctor::with(['city', 'specialization'])->get();
        return view('in.index',compact('doctors'));
    }

  //___________________________________________________________________________________________
public function create()
{
      $cities = City::all(); // Get all cities
      $specializations = Specialization::all(); // Get all specializations
    return view('in.create', compact('cities', 'specializations'));
}

  // Store a new doctor
public function store(storeAll $request)
{
    $validated = $request->validated();

      // Check if an image is uploaded
    $image = $request->hasFile('image') 
          ? $request->file('image')->store('images', 'public') // Save the image and store its path
          : null; // No image provided

        Doctor::create([
        'name'             => $validated['name'],
        'price'            => $validated['price'],
        'details'          => $validated['details'],
        'address'          => $validated['address'],
        'Waitingtime'      => $validated['Waitingtime'],
          'image'            => $image, // Save the image path or null
          'city_id'          => $validated['city'], // Save city ID
          'specialization_id' => $validated['specialization'], // Save specialization ID
]);

return redirect()->route('admin.doctors.index')->with('success', 'Doctor created successfully!');
}

   //_____________________________________________________________________________________
    public function show(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('in.show',compact('doctor'));
    }

    //______________________________________________________________________________________
    public function edit(string $id)
    {
        $cities= City::all();
        $specializations= Specialization::all();
        $doctor= Doctor::with(['city', 'specialization'])->findOrFail($id);
        return view('in.edit',compact('doctor','cities','specializations'));
    }
//________________________________________________________________________________________
public function update(Request $request, string $id)
{
    $doctor = Doctor::findOrFail($id);

    // Validate the request
    $validated = $request->validate([ 
        'name' => 'required|string|max:255',
        'price' => 'nullable|numeric',
        'details' => 'nullable|string',
        'address' => 'nullable|string',
        'Waitingtime' => 'nullable|string',
        'city' => 'required|exists:cities,id', // Ensure city ID exists
        'specialization' => 'required|exists:specializations,id', // Ensure specialization ID exists
        'image' => 'nullable|image|max:2048',
    ]);

    // Handle file upload if a new image is provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validated['image'] = $imagePath;
    }

    // Update the doctor with the validated data
    $doctor->update([
        'name' => $validated['name'],
        'price' => $validated['price'],
        'details' => $validated['details'],
        'address' => $validated['address'],
        'Waitingtime' => $validated['Waitingtime'],
        'city_id' => $validated['city'], // Update city ID
        'specialization_id' => $validated['specialization'], // Update specialization ID
        'image' => $validated['image'] ?? $doctor->image, // Keep old image if not replaced
    ]);

    return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
}


   //___________________________________________________________________________________
    public function destroy(string $id)
    {
        $doctor= Doctor::with(['city', 'specialization'])->findOrFail($id);  
        $doctor->delete();  
        return redirect()->route('admin.doctors.index');
    }
//__________________________________________________________________________________

}
