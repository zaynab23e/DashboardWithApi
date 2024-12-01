<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'time',
        'doctor_id',
        'offer_id',
        'day',
    ];

public function doctor(){
    return $this->belongsTo(Doctor::class);
}

public function offer(){
    return $this->belongsTo(Offer::class);
}

}
