<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'urban_village',
        'subdistrict',
        'postal_code',
        'label',
        'is_default',
        'rajaOngkirId'
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    /**
     * Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class, 'address_id');
    }
}