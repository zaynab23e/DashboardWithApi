<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacie;
use App\Models\User;

class PharmacyController extends  Controller
{

    public function index()
    {
        $Pharmacy= Pharmacie::all();
        return response()->json($Pharmacy);
    }

    public function show(string $id)
    {   
        $Pharmacy=Pharmacie::find($id);
        return response()->json($Pharmacy);
    }




}
