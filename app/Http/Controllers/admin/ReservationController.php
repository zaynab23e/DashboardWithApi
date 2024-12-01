<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Offer;
use App\Models\Doctor;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations= Reservation::with(['Offer','Doctor'])->get();
        return view('reservation.index',compact('reservations'));
    }


//______________________________________________________________________________________________________________________

public function show($id)
{
    $reservation = Reservation::with(['Doctor:id,name', 'Offer:id,name'])->findOrFail($id);
    return view('reservation.show', compact('reservation'));
}

//______________________________________________________________________________________________________________________

    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservation.index');
    }
}
//______________________________________________________________________________________________________________________

