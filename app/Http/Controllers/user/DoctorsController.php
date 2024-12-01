<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Admin;
use App\Models\Specialization;
use App\Http\Requests\CityName;
use App\Http\Requests\pecializationName;
use Auth;

class DoctorsController extends  Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        if($user){
$doctor=Doctor::all();
return response()->json($doctor);
        }
        return response()->json(['msg'=>'you can not access']);
    }


    public function show(string $id)
    {
        $user=Auth::user();
        if($user){
            $doctor=Doctor::findOrFail($id);
            return response()->json($doctor);
        }
        return response()->json(['msg'=>'you can not access']);
    }


public function gitCity(CityName $request){
        $validatedData = $request->validated();
        $city = City::where('name', $validatedData['name'])->first();
        $doctors = Doctor::with(['city:id,name'])->where('city_id', $city->id)->get();
            return response()->json($doctors);
    }
    
public function gitspecialization(pecializationName $request){
        $request->validated();
    $Specialization=Specialization::where('name',$request->name)->first();
$doctor =Doctor::with(['Specialization:id,name'])->where('Specialization_id', $Specialization->id)->get();;
return response()->json($doctor);
    }
}

    

































//         $city=City::all();
// $doctor=Doctor::where('city_id',$city->id)->all();
//         if(isset($doctor)){
//         return response()->json(['msg'=>$doctor]);
//         }