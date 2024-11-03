<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['registration_id', 'paid_amount', 'invoice_downloaded'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
