<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CashierController extends Controller
{
    public function index(): View
    {
        $orders = Order::with(['items.menu', 'meja'])
            ->where('status_pembayaran', 'belum_lunas')
            ->latest()
            ->get();

        return view('cashier.index', compact('orders'));
    }

    public function detail($id): View
    {
        $order = Order::with(['items.menu', 'meja'])->findOrFail($id);
        $summary = $this->hitungRingkasanPembayaran($order);

        return view('cashier.detail', compact('order', 'summary'));
    }

    public function prosesBayar(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'jumlah_dibayar' => ['required', 'numeric', 'min:0'],
        ], [
            'jumlah_dibayar.required' => 'Jumlah dibayar wajib diisi.',
            'jumlah_dibayar.numeric' => 'Jumlah dibayar harus berupa angka.',
            'jumlah_dibayar.min' => 'Jumlah dibayar tidak boleh negatif.',
        ]);

        return DB::transaction(function () use ($id, $validated) {
            // Lock baris order saat pembayaran diproses agar kasir ganda tidak menulis status bersamaan.
            $order = Order::with(['items.menu', 'meja'])
                ->whereKey($id)
                ->lockForUpdate()
                ->firstOrFail();

            $summary = $this->hitungRingkasanPembayaran($order);
            $jumlahDibayar = (float) $validated['jumlah_dibayar'];

            if ($jumlahDibayar < $summary['total_akhir']) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Jumlah dibayar kurang dari total akhir.');
            }

            $order->update([
                'status_pembayaran' => 'lunas',
                'status_pesanan' => 'selesai',
                'status' => 'Selesai',
            ]);

            return redirect()
                ->route('cashier.history')
                ->with('success', 'Pembayaran Order #'.$order->id.' berhasil diproses.');
        });
    }

    public function paid($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status_pembayaran' => 'lunas',
            'status_pesanan' => 'selesai',
            'status' => 'Selesai',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pembayaran berhasil ditandai lunas.');
    }

    public function history(): View
    {
        $orders = Order::with(['items.menu', 'meja'])
            ->where('status_pembayaran', 'lunas')
            ->latest()
            ->get();

        return view('cashier.history', compact('orders'));
    }

    private function hitungRingkasanPembayaran(Order $order): array
    {
        // Subtotal memakai item detail agar kasir tetap akurat walau total_harga lama tidak sinkron.
        $subtotal = $order->items->sum(function ($item) {
            return $item->harga * $item->quantity;
        });

        if ($subtotal <= 0) {
            $subtotal = $order->total_harga;
        }

        $serviceCharge = $subtotal * 0.05;
        $pajakPb1 = $subtotal * 0.10;

        return [
            'subtotal' => $subtotal,
            'service_charge' => $serviceCharge,
            'pajak_pb1' => $pajakPb1,
            'total_akhir' => $subtotal + $serviceCharge + $pajakPb1,
        ];
    }
}
