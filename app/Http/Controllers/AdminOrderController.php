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
        'status_pesanan' => 'siap_diambil',
        'status' => 'Siap Diambil',
    ]);

    return redirect()
        ->route('kitchen.cooking')
        ->with('success', 'Pesanan siap diambil.');
}

   public function selesai($id): RedirectResponse
{
    $order = Order::findOrFail($id);

    $order->update([
        'status_pesanan' => 'selesai',
        'status' => 'Selesai',
    ]);

    return redirect()
        ->route('kitchen.history')
        ->with(
            'success',
            'Pesanan selesai dan meja siap dipakai.'
        );
}

   public function lunas($id): RedirectResponse
{
    $order = Order::findOrFail($id);

    $order->update([
        'status_pembayaran' => 'lunas',
        'status_pesanan' => 'pending',
        'status' => 'Menunggu Dimasak',
    ]);

    return redirect()
        ->route('cashier.index')
        ->with('success', 'Pembayaran berhasil. Pesanan dikirim ke dapur.');
}
}