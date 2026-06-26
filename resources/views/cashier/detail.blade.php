@extends('layouts.cashier')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white shadow-xl rounded-2xl p-8">

        <div class="text-center border-b pb-4 mb-6">
            <h1 class="text-3xl font-bold text-orange-500">
                RAMENGO
            </h1>

            <p class="text-gray-500">
                Detail Pembayaran
            </p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-bold">
                {{ $order->nomor_meja }}
            </h2>

            <p class="text-gray-600">
                Order #{{ $order->id }}
            </p>

            <p class="text-gray-600">
                {{ $order->created_at->format('d M Y H:i') }}
            </p>
        </div>

        <div class="border-y py-4 space-y-4">

            @foreach($order->items as $item)

            <div class="flex justify-between">

                <div>
                    <p class="font-semibold">
                        {{ $item->menu->nama ?? '-' }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $item->quantity }} x Rp {{ number_format($item->harga) }}
                    </p>
                </div>

                <div class="font-bold">
                    Rp {{ number_format($item->quantity * $item->harga) }}
                </div>

            </div>

            @endforeach

        </div>
<div class="mt-6 space-y-3">

    <div class="flex justify-between">
        <span>Subtotal</span>
        <span>Rp {{ number_format($summary['subtotal']) }}</span>
    </div>

    <div class="border-t pt-3 flex justify-between text-xl font-bold">
        <span>Total</span>
        <span>Rp {{ number_format($summary['subtotal']) }}</span>
    </div>

</div>
        </div>
<div class="mt-8 flex gap-3 no-print">

    <button
        onclick="window.print()"
        class="flex-1 rounded-xl bg-blue-500 py-3 font-bold text-white hover:bg-blue-600"
    >
        CETAK STRUK
    </button>

    <form
        action="{{ route('cashier.paid', $order->id) }}"
        method="POST"
        class="flex-1"
    >
        @csrf

        <button
            onclick="return confirm('Pembayaran sudah diterima?')"
            type="submit"
            class="w-full rounded-xl bg-green-500 py-3 font-bold text-white hover:bg-green-600"
        >
            LUNAS
        </button>

    </form>

</div>

    </div>

</div>

<style>
@media print {

    nav,
    .no-print {
        display: none !important;
    }

    body {
        background: white;
    }

}
</style>

@endsection