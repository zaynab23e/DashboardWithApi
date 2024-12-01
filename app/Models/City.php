<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function doctor(){
        return $this->hasMany(Doctor::class);

    }

public function Offer(){
    return $this->hasMany(Offer::class);
}


}
