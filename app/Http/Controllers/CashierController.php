<?php

namespace App\Http\Controllers;

use App\Models\Order;

class CashierController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu')
            ->latest()
            ->get();

        return view(
            'cashier.index',
            compact('orders')
        );
    }

    public function paid($id)
    {
        $order = Order::findOrFail($id);

        $order->update([

            'status' => 'Sedang Dimasak'

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Pembayaran berhasil ✅'
            );
    }
}