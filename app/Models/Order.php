<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'shipping',
        'payment_method',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()  
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusHistories()
    {
        return $this->hasMany(StatusHistory::class);
    }

    public function latestStatus()
    {
        return $this->hasOne(StatusHistory::class)->latestOfMany('changed_at');
    }

}
