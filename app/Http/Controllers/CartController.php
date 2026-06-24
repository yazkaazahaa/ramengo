<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function index()
    {
        if (! session()->has('id_meja')) {
            return redirect('/customer/menu')
                ->with('error', 'Akses ditolak! Anda harus memindai QR Code meja terlebih dahulu untuk memesan.');
        }

        $cart = session()->get('cart', []);

        return view('customer.cart', compact('cart'));
    }

    public function add($id)
    {
        if (! session()->has('id_meja')) {
            return redirect('/customer/menu')
                ->with('error', 'Akses ditolak! Anda harus memindai QR Code meja terlebih dahulu untuk memesan.');
        }

        $menu = Menu::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'nama' => $menu->nama,
                'harga' => $menu->harga,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function decrease($id)
    {
        if (! session()->has('id_meja')) {
            return redirect('/customer/menu')
                ->with('error', 'Akses ditolak! Anda harus memindai QR Code meja terlebih dahulu untuk memesan.');
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']--;

            if($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function checkout()
    {
        // Checkout dikunci ke session meja hasil scan QR agar order tidak yatim tanpa meja.
        if (! session()->has('id_meja')) {
            return redirect('/')
                ->with('error', 'Silakan scan QR meja terlebih dahulu sebelum memesan.');
        }

        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect()
                ->back()
                ->with('error', 'Keranjang masih kosong');
        }

        $total = 0;

        foreach($cart as $item) {
            $total += $item['harga'] * $item['quantity'];
        }

        $order = Order::create([
            'nomor_meja' => session('nomor_meja', 'Take Away'),
            'meja_id' => session('id_meja'),
            'total_harga' => $total,
            'status' => 'Menunggu Dimasak',
            'status_pesanan' => 'pending',
            'status_pembayaran' => 'belum_lunas'
        ]);

        session()->put('last_order_id', $order->id);

        foreach($cart as $menuId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menuId,
                'quantity' => $item['quantity'],
                'harga' => $item['harga']
            ]);
        }

        session()->forget('cart');

        return redirect('/order-status')
            ->with('success', 'Pesanan berhasil dibuat');
    }
}
