<?php

namespace App\Http\Controllers;

use App\Models\Order;

class CashierController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu')
            ->where('status_pembayaran', 'belum_lunas')
            ->latest()
            ->get();

        return view('cashier.index', compact('orders'));
    }

    public function paid($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'Menunggu Dimasak'
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pembayaran berhasil ✅');
    }

    // ✅ INI YANG KAMU KURANG (RIWAYAT)
    public function history()
    {
        $orders = Order::with('menu')
            ->where('status_pembayaran', 'lunas')
            ->latest()
            ->get();

        return view('cashier.history', compact('orders'));
    }
}
