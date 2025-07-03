<?php

// app/Models/Address.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipient_name',
        'phone_number',
        'street_address',
        'city',
        'province',
        'postal_code',
        'other_details',
        'label',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
