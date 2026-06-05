@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-12">

    <div class="text-center mb-12">
        <p class="text-orange-500 font-semibold">
            Favorit Kami
        </p>

        <h1 class="text-5xl font-bold mt-3">
            Temukan Menu Kami
        </h1>
    </div>

    <div class="flex justify-center gap-8 mb-10">
        <button class="border-b-2 border-orange-500 text-orange-500 font-semibold pb-2">
            Makanan
        </button>

        <button class="font-semibold text-gray-700">
            Minuman
        </button>
    </div>

    {{-- Daftar Menu Disini --}}

</div>

@endsection