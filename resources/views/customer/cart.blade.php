@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-4xl font-bold text-orange-600">
        Keranjang 🛒
    </h1>

    <p class="text-gray-500">
        Periksa pesananmu sebelum checkout
    </p>

</div>

@if(count($cart) > 0)

    <div class="space-y-4">

        @php
            $total = 0;
        @endphp

        @foreach($cart as $id => $item)

            @php
                $subtotal = $item['harga'] * $item['quantity'];
                $total += $subtotal;
            @endphp

            <div class="bg-white rounded-2xl shadow-md p-5 flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold">
                        {{ $item['nama'] }}
                    </h2>

                    <p class="text-gray-500">
                        Qty: {{ $item['quantity'] }}
                    </p>

                </div>

                <div class="text-right">

                    <p class="text-orange-500 font-bold text-xl">
                        Rp {{ number_format($subtotal) }}
                    </p>

                </div>

            </div>

        @endforeach

    </div>

    <div class="mt-8 bg-orange-500 text-white p-6 rounded-2xl flex justify-between items-center">

        <div>

            <p class="text-lg">
                Total Harga
            </p>

            <h2 class="text-3xl font-bold">
                Rp {{ number_format($total) }}
            </h2>

        </div>

        <form action="{{ route('checkout') }}" method="POST">

            @csrf

            <button
                type="submit"
                class="bg-white text-orange-500 px-6 py-3 rounded-xl font-bold hover:bg-gray-100 transition">

                Checkout

            </button>

        </form>

    </div>

@else

    <div class="bg-white rounded-2xl shadow-md p-10 text-center">

        <p class="text-gray-500 text-xl">
            Keranjang masih kosong 🍜
        </p>

    </div>

@endif

@endsection