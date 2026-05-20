<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($id)
    {
        $menu = Menu::findOrFail($id);

        return view('orders.create', compact('menu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required',
            'nomor_meja' => 'required',
            'quantity' => 'required|numeric|min:1'
        ]);

        Order::create([
            'menu_id' => $validated['menu_id'],
            'nomor_meja' => $validated['nomor_meja'],
            'quantity' => $validated['quantity'],
            'status' => 'pending'
        ]);

        return redirect()
            ->route('menu.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}