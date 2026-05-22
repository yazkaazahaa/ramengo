<?php

namespace App\Http\Controllers;

use App\Models\Order;

class KitchenController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view(
            'kitchen.index',
            compact('orders')
        );
    }

    public function cook($id)
    {
        $order = Order::findOrFail($id);

        $order->update([

            'status' => 'Sedang Dimasak'

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Pesanan mulai dimasak'
            );
    }

    public function ready($id)
    {
        $order = Order::findOrFail($id);

        $order->update([

            'status' => 'Siap Diambil'

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Pesanan siap'
            );
    }
}