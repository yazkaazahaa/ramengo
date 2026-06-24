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
        if (! session()->has('id_meja')) {
            return redirect()
                ->back()
                ->with('error', 'Akses ditolak! Anda harus memindai QR Code meja terlebih dahulu untuk memesan.');
        }

        $validated = $request->validate([
            'menu_id' => 'required',
            'nomor_meja' => 'required',
            'quantity' => 'required|numeric|min:1',
        ]);

        Order::create([
            'menu_id' => $validated['menu_id'],
            'nomor_meja' => $validated['nomor_meja'],
            'quantity' => $validated['quantity'],
            'status' => 'Menunggu Dimasak',
        ]);

        return redirect('/order-status')
            ->with('success', 'Pesanan berhasil dibuat');
    }

    public function status()
    {
        // Kunci keamanan: status pesanan hanya boleh dibuka setelah scan QR meja.
        if (! session()->has('id_meja')) {
            return redirect('/customer/menu')
                ->with('error', 'Akses ditolak! Silakan scan QR Code di meja Anda terlebih dahulu untuk melihat status pesanan.');
        }

        // Ambil satu order aktif terakhir milik meja yang sedang tersimpan di session.
        $order = Order::with(['items.menu', 'meja'])
            ->where('meja_id', session('id_meja'))
            ->whereIn('status_pesanan', ['pending', 'dimasak', 'siap_dihidangkan'])
            ->latest()
            ->first();

        return view('customer.order-status', compact('order'));
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);

        return view('customer.order-detail', compact('order'));
    }
}
