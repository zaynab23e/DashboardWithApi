<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Offer;
use App\Models\Reservation;
use App\Http\Requests\StorReservation;
use App\Http\Requests\updeteReservation;

    
    class ReservationController extends Controller
    {
//_______________________________________________________________________________________________
                    public function index()
            {
                
                $reservations = Reservation::with(['Doctor','Offer'])->get();
                return response()->json(['reservations' => $reservations],);
            }
//__________________________________________________________________________________________________
public function store(StorReservation $request)
{
    // Validate the input data
    $validatedData = $request->validated();

    // Initialize variables
    $doctor_id = $validatedData['doctor_id'] ?? null;
    $offer_id = $validatedData['offer_id'] ?? null;

    // Check that only one of the doctor_id or offer_id is provided
    if (($doctor_id && $offer_id) || (!$doctor_id && !$offer_id)) {
        return response()->json(['message' => 'You must choose either a doctor or an offer, but not both.'], 400);
    }

    // If doctor_id is provided, check if the doctor exists
    if ($doctor_id) {
        $doctor = Doctor::find($doctor_id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
    }

    // If offer_id is provided, check if the offer exists
    if ($offer_id) {
        $offer = Offer::find($offer_id);
        if (!$offer) {
            return response()->json(['message' => 'Offer not found'], 404);
        }
    }

    // Create the reservation
    $reservation = Reservation::create([
        'name' => $validatedData['name'],
        'phone' => $validatedData['phone'],
        'date' => $validatedData['date'],
        'time' => $validatedData['time'],
        'doctor_id' => $doctor_id, // Only one will be set
        'offer_id' => $offer_id,   // Only one will be set
    ]);

    return response()->json([
        'message' => 'Reservation created successfully',
        'reservation' => $reservation
    ]);
}

//___________________________________________________________________________________________________________
            public function show(string $id)
            {
                $reservation = Reservation::with('doctor', 'offer')->find($id);
                if (!$reservation) {
                    return response()->json(['message' => 'Reservation not found']);
                }
                return response()->json($reservation);
            }
//_____________________________________________________________________________________________________________
            public function update(updeteReservation $request, string $id)
            {
                $validatedData = $request->validated();
                $reservation = Reservation::find($id);
                if (!$reservation) {
                    return response()->json(['message' => 'Reservation not found']);
                }
                $reservation->update([
                    'name' => $validatedData['name'],
                    'phone' => $validatedData['phone'],
                    'date' => $validatedData['date'],
                    'time' => $validatedData['time'],
                    'doctor_id' => $validatedData['doctor_id'],
                    'offer_id' => $validatedData['offer_id'],
                ]);
                return response()->json([
                    'message' => 'Reservation updated successfully',
                    'reservation' => $reservation
                ]);
            }
//_________________________________________________________________________________________________________________
            public function destroy(string $id)
            {
                $reservation = Reservation::find($id);
                if (!$reservation) {
                    return response()->json(['message' => 'Reservation not found']);
                }
                $reservation->delete();
                return response()->json(['message' => 'Reservation deleted successfully']);
            }
        }
//___________________________________________________________________________________________________________________


