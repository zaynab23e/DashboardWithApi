<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'price',
    'image',
    'details',
    'address',
    'city_id',
    'Waitingtime',
    'specialization_id',
];
public function city()
{
    return $this->belongsTo(City::class);
}

public function specialization()
{
    return $this->belongsTo(Specialization::class); 
}

public function reservation(){
    return $this->hasMany(Reservation::class);
}

}
