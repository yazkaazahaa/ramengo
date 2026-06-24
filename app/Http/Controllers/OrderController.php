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

        $order = Order::create([
            'menu_id' => $validated['menu_id'],
            'nomor_meja' => $validated['nomor_meja'],
            'quantity' => $validated['quantity'],
            'status' => 'Menunggu Dimasak'
        ]);

        return redirect('/order-status')
            ->with('success', 'Pesanan berhasil dibuat 🍜');
    }

    // 🔥 INI YANG DIPAKAI NAVBAR (LIST SEMUA ORDER)
    public function status()
    {
        // Status pesanan hanya boleh dibuka setelah pelanggan scan QR meja.
        if (! session()->has('id_meja')) {
            return redirect('/')
                ->with('error', 'Silakan scan QR meja terlebih dahulu.');
        }

        // Ambil satu order terakhir dari meja aktif agar status tidak tercampur dengan meja lain.
        $order = Order::with(['items.menu', 'meja'])
            ->where('meja_id', session('id_meja'))
            ->latest()
            ->first();

        return view('order-status', compact('order'));
    }

    // (OPSIONAL) detail order kalau nanti dibutuhkan
    public function detail($id)
    {
        $order = Order::findOrFail($id);

        return view('customer.order-detail', compact('order'));
    }
}
