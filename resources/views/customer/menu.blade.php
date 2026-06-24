@extends('layouts.customer')

@section('content')

@php
    $cart = session('cart', []);
    $activeKategori = $activeKategori ?? 'semua';
    $hasMeja = session()->has('id_meja');
@endphp

<section class="mx-auto max-w-7xl py-4">
    <div class="mb-6 text-center">
        <p class="text-sm font-semibold uppercase tracking-wide text-orange-500">
            Pesan Favoritmu
        </p>

        <h1 class="mt-2 text-3xl font-extrabold text-gray-900 md:text-4xl">
            Menu RamenGo
        </h1>
    </div>

    @if($hasMeja)
        <div class="mb-6 rounded-2xl border border-orange-200 bg-orange-50 px-5 py-4 text-center shadow-sm">
            <p class="text-lg font-extrabold text-orange-700">
                Nomor Meja Anda: {{ session('nomor_meja') }}
            </p>
        </div>
    @endif

    <div class="mb-8 rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
        <div class="flex flex-wrap justify-center gap-3">
            @foreach($kategoriTabs as $key => $tab)
                @php
                    $isActive = $activeKategori === $key;
                @endphp

                <a
                    href="{{ route('customer.menu', ['kategori' => $key]) }}"
                    class="{{ $isActive ? 'bg-orange-500 text-white shadow-md shadow-orange-200' : 'bg-gray-100 text-gray-700 hover:bg-orange-50 hover:text-orange-600' }} inline-flex min-w-32 items-center justify-center gap-2 rounded-full px-5 py-2.5 text-sm font-bold transition">
                    <span>{{ $tab['label'] }}</span>
                    <span class="{{ $isActive ? 'bg-white/20 text-white' : 'bg-white text-gray-500' }} rounded-full px-2 py-0.5 text-xs">
                        {{ $tab['count'] }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    @if($menus->count() > 0)
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            @foreach($menus as $menu)
                <article class="group overflow-hidden rounded-xl border border-gray-100 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative aspect-[4/3] overflow-hidden bg-orange-50">
                        @if($menu->gambar)
                            <img
                                src="{{ asset('storage/'.$menu->gambar) }}"
                                alt="{{ $menu->nama }}"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-orange-100 via-amber-50 to-white text-4xl">
                                Ramen
                            </div>
                        @endif

                        <span class="absolute left-3 top-3 rounded-full bg-orange-500 px-3 py-1 text-xs font-bold text-white shadow">
                            {{ $menu->kategori }}
                        </span>
                    </div>

                    <div class="p-4">
                        <h2 class="truncate text-base font-extrabold text-gray-900">
                            {{ $menu->nama }}
                        </h2>

                        <p class="mt-1 h-10 overflow-hidden text-sm leading-5 text-gray-500">
                            {{ $menu->deskripsi ?? 'Menu pilihan RamenGo yang siap dipesan.' }}
                        </p>

                        <div class="mt-4 flex items-center justify-between gap-3">
                            <p class="text-base font-extrabold text-orange-600">
                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                            </p>

                            @if($hasMeja)
                                <div class="flex shrink-0 items-center overflow-hidden rounded-full border border-gray-200 bg-gray-50">
                                    <a
                                        href="{{ route('cart.decrease', $menu->id) }}"
                                        class="flex h-8 w-8 items-center justify-center text-lg font-bold text-gray-600 transition hover:bg-gray-200"
                                        aria-label="Kurangi {{ $menu->nama }}">
                                        -
                                    </a>

                                    <span class="min-w-8 text-center text-sm font-bold text-gray-900">
                                        {{ $cart[$menu->id]['quantity'] ?? 0 }}
                                    </span>

                                    <a
                                        href="{{ route('cart.add', $menu->id) }}"
                                        class="flex h-8 w-8 items-center justify-center bg-orange-500 text-lg font-bold text-white transition hover:bg-orange-600"
                                        aria-label="Tambah {{ $menu->nama }}">
                                        +
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="rounded-2xl border border-dashed border-orange-200 bg-orange-50/60 px-6 py-12 text-center">
            <h2 class="text-xl font-bold text-gray-900">
                Menu belum tersedia
            </h2>

            <p class="mt-2 text-gray-600">
                Belum ada item untuk kategori {{ $kategoriTabs[$activeKategori]['label'] ?? 'ini' }}.
            </p>
        </div>
    @endif
</section>

@endsection
