<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'address',
        'title',
        'newPrice',
        'oldPrice',
        'city_id',
        'specialization_id', // Corrected typo
    ];
public function Specialization(){
    return $this->belongsTo(Specialization::class);
}

public function City(){
    return $this->belongsTo(City::class);
}

public function reservation(){
return $this->hasMany(Reservation::class);
}

}
