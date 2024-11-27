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
        'amount', // Add this
    ];



    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function ClintTask()
    {
        return $this->hasMany(ClientTask::class);
    }
    public function expenses()
    {
        return $this->hasOne(Expense::class);
    }
}
