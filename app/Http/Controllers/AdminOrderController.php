<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class AdminOrderController extends Controller
{
    public function masak($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status_pesanan' => 'dimasak',
            'status' => 'Sedang Dimasak',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pesanan mulai dimasak.');
    }

    public function hidangkan($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status_pesanan' => 'siap_dihidangkan',
            'status' => 'Siap Diambil',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pesanan siap dihidangkan.');
    }

    public function lunas($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status_pembayaran' => 'lunas',
            'status' => 'Sudah Dibayar',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pembayaran berhasil ditandai lunas.');
    }
}
