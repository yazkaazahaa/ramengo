<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'nomor_meja',
        'meja_id',
        'total_harga',
        'status',
        'status_pesanan',
        'status_pembayaran'

    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
