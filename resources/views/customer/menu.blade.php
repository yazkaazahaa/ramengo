@extends('layouts.app')

@section('content')

@php
    $cart = session('cart', []);
@endphp

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-orange-600">
            Ramengo 🍜
        </h1>

        <p class="text-gray-500">
            Pesan ramen favoritmu sekarang
        </p>

    </div>

    <a href="{{ route('cart.index') }}"
       class="bg-orange-500 text-white px-5 py-3 rounded-xl shadow-lg hover:bg-orange-600 transition">

        🛒 {{ count($cart) }} item

    </a>

</div>

<div class="grid grid-cols-3 gap-6">

    @forelse($menus as $menu)

        <x-card>

            <div class="h-40 bg-orange-100 rounded-xl mb-4"></div>

            <h2 class="text-2xl font-bold mb-2">
                {{ $menu->nama }}
            </h2>

            <p class="text-gray-600 text-sm">
                {{ $menu->deskripsi }}
            </p>

            <div class="mt-4 flex justify-between items-center">

                <p class="text-orange-500 font-bold text-xl">
                    Rp {{ number_format($menu->harga) }}
                </p>

                @if(isset($cart[$menu->id]))

                    <div class="flex items-center gap-3">

                        <a href="{{ route('cart.decrease',$menu->id) }}"
                           class="bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center text-xl transition">

                            -

                        </a>

                        <span class="font-bold text-lg">

                            {{ $cart[$menu->id]['quantity'] }}

                        </span>

                        <a href="{{ route('cart.add',$menu->id) }}">

                            <x-button>

                                +

                            </x-button>

                        </a>

                    </div>

                @else

                    <a href="{{ route('cart.add',$menu->id) }}">

                        <x-button>

                            +

                        </x-button>

                    </a>

                @endif

            </div>

        </x-card>

    @empty

        <div class="col-span-3">

            <x-card>

                <p class="text-center text-gray-500">

                    Belum ada menu 🍜

                </p>

            </x-card>

        </div>

    @endforelse

</div>

@endsection