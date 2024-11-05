<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'registration_id',
        'visa_cost',
        'ticket_cost',
        'medical_cost',
        'other_costs',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
