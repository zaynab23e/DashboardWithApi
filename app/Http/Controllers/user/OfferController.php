<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offer= Offer::all();
        return response()->json($offer);
    }

    //____________________________________________________________________________
        public function show(string $id)
    {
        $offer= Offer::find($id);
        return response()->json($offer);
    }

//_____________________________________________________________________-

}
