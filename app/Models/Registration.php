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
        'amount',
        'fingerprint_date',
        'medical_date',
        'visa_date',
        'total_Cost',
    ];


    public function expenses()
    {
        return $this->hasOne(Expense::class);
    }
}
