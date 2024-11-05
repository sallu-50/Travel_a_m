<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientTask extends Model
{
    protected $fillable = [
        'registration_id',
        'fingerprint_date',
        'medical_date',
        'message',
        'is_done',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
