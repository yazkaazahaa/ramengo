@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-lg">

    <h1 class="text-3xl font-bold text-orange-500 mb-6">

        Status Pesanan 🍜

    </h1>

    <div class="bg-orange-100 p-5 rounded-xl mb-6">

        <p class="text-lg">

            Nomor Order:
            <span class="font-bold">

                #{{ $order->id }}

            </span>

        </p>

        <p class="text-lg">

            Nomor Meja:
            <span class="font-bold">

                {{ $order->nomor_meja }}

            </span>

        </p>

    </div>

    <div class="bg-yellow-100 p-4 rounded-xl">

        ⏳ Status:

        <span class="font-bold">

            {{ ucfirst($order->status) }}

        </span>

    </div>

</div>

@endsection