@extends('layouts.kitchen')

@section('content')

<h1 class="mb-8 text-4xl font-bold text-orange-500">
    Kitchen
</h1>

@if(session('success'))
    <div class="mb-6 rounded-xl bg-green-100 p-4 font-semibold text-green-700">
        {{ session('success') }}
    </div>
@endif

<div class="space-y-5">
    @forelse($orders as $order)
        <div class="rounded-2xl bg-white p-6 shadow-md">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-xl font-bold">
                        Order #{{ $order->id }}
                    </h2>

                    <p class="mt-1 text-gray-600">
                        Meja: {{ $order->nomor_meja }}
                    </p>

                    <p class="mt-1 text-gray-600">
                        Total: Rp {{ number_format($order->total_harga) }}
                    </p>

                    <div class="mt-3">
                        @if($order->status_pesanan === 'pending')
                            <span class="rounded-full bg-yellow-100 px-4 py-2 text-sm font-bold text-yellow-700">
                                Menunggu Antrean Dapur
                            </span>
                        @elseif($order->status_pesanan === 'dimasak')
                            <span class="rounded-full bg-orange-100 px-4 py-2 text-sm font-bold text-orange-700">
                                Sedang Dimasak
                            </span>
                        @endif
                    </div>
                </div>

                <div>
                    @if($order->status_pesanan === 'pending')
                        <form action="{{ route('kitchen.cook', $order->id) }}" method="POST">
                            @csrf

                            <button class="rounded-xl bg-orange-500 px-5 py-2 font-bold text-white hover:bg-orange-600">
                                Masak
                            </button>
                        </form>
                    @elseif($order->status_pesanan === 'dimasak')
                        <form action="{{ route('kitchen.ready', $order->id) }}" method="POST">
                            @csrf

                            <button class="rounded-xl bg-green-500 px-5 py-2 font-bold text-white hover:bg-green-600">
                                Hidangkan
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="rounded-xl bg-white p-6 text-center text-gray-600">
            Belum ada pesanan untuk dapur.
        </div>
    @endforelse
</div>

@endsection
