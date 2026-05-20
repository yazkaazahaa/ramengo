@extends('layouts.app')

@section('content')

@php
    $cart = session('cart', []);
    $totalQuantity = array_sum(array_column($cart, 'quantity'));
@endphp

<div class="flex justify-between items-center mb-8">

    <h1 class="text-4xl font-bold text-orange-600">
        Menu Ramen 🍜
    </h1>

    <a href="{{ route('menu.create') }}"
       class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">

        + Tambah Menu

    </a>

</div>

@if(session('success'))

    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>

@endif

<div class="mb-6 flex justify-end">

    <div class="bg-orange-500 text-white px-5 py-3 rounded-xl shadow-lg">

        🛒 {{ $totalQuantity }} item

    </div>

</div>

<div class="grid grid-cols-3 gap-6">

    @forelse($menus as $menu)

        <div class="bg-white rounded-2xl shadow-md p-5">

            <h2 class="text-2xl font-bold mb-2">
                {{ $menu->nama }}
            </h2>

            <p class="text-gray-600">
                {{ $menu->deskripsi }}
            </p>

            <p class="mt-4 text-orange-500 font-bold text-xl">
                Rp {{ number_format($menu->harga) }}
            </p>

            <div class="mt-4 flex justify-end">

                <a href="{{ route('cart.add', $menu->id) }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white w-10 h-10 rounded-full flex items-center justify-center text-2xl">

                    +

                </a>

            </div>

        </div>

    @empty

        <p>Belum ada menu.</p>

    @endforelse

</div>

@endsection