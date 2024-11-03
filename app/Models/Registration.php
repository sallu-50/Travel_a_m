<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $fillable = [
        'full_name',
        'fathers_name',
        'mothers_name',
        'phone',
        'passport',
        'type',
        'status',
    ];


    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
