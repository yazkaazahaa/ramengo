@extends('layouts.customer')

@section('content')

<div class="mx-auto max-w-3xl">
    <h1 class="mb-6 text-3xl font-bold text-orange-500">
        Status Pesanan
    </h1>

    @if (! session('id_meja'))
        <div class="rounded-xl bg-white p-6 shadow">
            <div class="text-lg font-bold text-gray-900">
                Meja belum terdeteksi.
            </div>
            <p class="mt-2 text-gray-600">
                Silakan scan QR code meja terlebih dahulu untuk melihat status pesanan.
            </p>
        </div>
    @elseif (! $order)
        <div class="rounded-xl bg-white p-6 shadow">
            <div class="text-lg font-bold text-gray-900">
                Belum ada pesanan aktif.
            </div>
            <p class="mt-2 text-gray-600">
                Pesanan dari {{ session('nomor_meja') }} akan muncul di sini setelah checkout.
            </p>
        </div>
    @else
        <div class="rounded-2xl bg-white p-6 shadow">
            <div class="flex flex-col gap-4 border-b border-gray-100 pb-5 md:flex-row md:items-start md:justify-between">
                <div>
                    <div class="text-sm font-semibold uppercase tracking-wide text-gray-400">
                        Order #{{ $order->id }}
                    </div>

                    <h2 class="mt-1 text-2xl font-bold text-gray-900">
                        {{ $order->nomor_meja }}
                    </h2>

                    <p class="mt-2 text-gray-600">
                        Total: Rp {{ number_format($order->total_harga) }}
                    </p>
                </div>

                <div class="text-left md:text-right">
                    <div class="text-sm font-semibold text-gray-500">
                        Status Pembayaran
                    </div>

                    @if ($order->status_pembayaran === 'lunas')
                        <span class="mt-2 inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700">
                            Pembayaran Selesai, Terima Kasih! 💳
                        </span>
                    @else
                     
    <span class="bg-gradient-to-r from-red-600 to-red-500 text-white px-5 py-2 rounded-xl text-[11px] font-extrabold tracking-wider border border-red-400/30 inline-block uppercase whitespace-nowrap" 
          style="box-shadow: 0 0 15px rgba(239, 68, 68, 0.7), 0 0 5px rgba(239, 68, 68, 0.5);">
        Menunggu Pembayaran
    </span>
                    </div>
                    @endif
                    </div>
                    </div>

            <div class="mt-6">
                <div class="mb-3 text-sm font-semibold text-gray-500">
                    Status Pesanan
                </div>

                @if ($order->status_pesanan === 'pending')
                    <span class="inline-flex rounded-full bg-yellow-100 px-5 py-3 text-base font-bold text-yellow-700">
                        Menunggu Antrean Dapur ⏳
                    </span>
                @elseif ($order->status_pesanan === 'dimasak')
                    <span class="inline-flex rounded-full bg-orange-100 px-5 py-3 text-base font-bold text-orange-700">
                        Ramen Sedang Dimasak Chef 🍳
                    </span>
                @elseif ($order->status_pesanan === 'siap_diambil')
                    <span class="inline-flex rounded-full bg-emerald-100 px-5 py-3 text-base font-bold text-emerald-700">
                        Pesanan Siap Diambil! 🍜
                    </span>
                @else
                    <span class="inline-flex rounded-full bg-gray-100 px-5 py-3 text-base font-bold text-gray-700">
                        {{ $order->status_pesanan }}
                    </span>
                @endif
            </div>

            <div class="mt-6 rounded-xl bg-orange-50 p-4 text-sm text-orange-800">
                Refresh halaman ini untuk melihat perubahan terbaru dari dapur atau kasir.
            </div>
        </div>
    @endif
</div>

@endsection
