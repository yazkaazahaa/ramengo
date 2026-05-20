<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'nomor_meja',
        'total_harga',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}