@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold text-orange-600 mb-6">
    Order Ramen 🍜
</h1>

<div class="bg-white rounded-2xl shadow-md p-6">

    <h2 class="text-3xl font-bold mb-2">
        {{ $menu->nama }}
    </h2>

    <p class="text-gray-600 mb-4">
        {{ $menu->deskripsi }}
    </p>

    <p class="text-orange-500 text-2xl font-bold mb-6">
        Rp {{ number_format($menu->harga) }}
    </p>

    <form action="{{ route('order.store') }}" method="POST">

        @csrf

        <input type="hidden"
               name="menu_id"
               value="{{ $menu->id }}">

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Nomor Meja
            </label>

            <input type="text"
                   name="nomor_meja"
                   class="w-full border rounded-lg px-4 py-2"
                   placeholder="Contoh: Meja 7">

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Quantity
            </label>

            <input type="number"
                   name="quantity"
                   class="w-full border rounded-lg px-4 py-2"
                   value="1">

        </div>

        <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">

            Pesan Sekarang

        </button>

    </form>

</div>

@endsection