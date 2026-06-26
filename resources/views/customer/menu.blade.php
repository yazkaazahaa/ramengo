@extends('layouts.customer')

@section('content')

@php
    $cart = session('cart', []);
    $activeKategori = $activeKategori ?? 'semua';
    $hasMeja = session()->has('id_meja');
@endphp
    <section class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <p class="text-sm font-extrabold uppercase tracking-[0.28em] text-[#D4AF37]">
                Pesan Favoritmu
            </p>

            <h1 class="mt-3 text-4xl font-extrabold leading-tight text-[#F4EFEA] drop-shadow-2xl md:text-6xl">
                Menu RamenGo
            </h1>

            <div class="mx-auto mt-5 h-1 w-32 rounded-full bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent"></div>
        </div>

        @if($hasMeja)
            <div class="customer-glass-panel mb-6 rounded-2xl px-5 py-4 text-center">
                <p class="text-lg font-extrabold text-[#D4AF37]">
                    Nomor Meja Anda: {{ session('nomor_meja') }}
                </p>
            </div>
        @endif

        <div class="customer-glass-panel mb-8 rounded-2xl p-4">
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($kategoriTabs as $key => $tab)
                    @php
                        $isActive = $activeKategori === $key;
                    @endphp

                    <a
                        href="{{ route('customer.menu', ['kategori' => $key]) }}"
                        class="{{ $isActive ? 'customer-action-btn' : 'customer-filter-btn' }} inline-flex min-w-32 items-center justify-center gap-2 rounded-full px-5 py-2.5 text-sm font-extrabold transition">
                        <span>{{ $tab['label'] }}</span>
                        <span class="{{ $isActive ? 'bg-black/15 text-black' : 'bg-white/10 text-[#F4EFEA]/75' }} rounded-full px-2 py-0.5 text-xs">
                            {{ $tab['count'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        @if($menus->count() > 0)
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
                @foreach($menus as $menu)
                    <article class="customer-menu-card group overflow-hidden rounded-2xl transition duration-300 hover:-translate-y-1">
                        <div class="relative aspect-[4/3] overflow-hidden bg-black/50">
                            @if($menu->gambar)
                                <img
                                    src="{{ asset('storage/'.$menu->gambar) }}"
                                    alt="{{ $menu->nama }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-[#2A1208] via-[#7C2D12] to-[#0F0C08] p-6 text-center text-3xl font-extrabold text-[#D4AF37]">
                                    RamenGo
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/10"></div>

                            <span class="absolute left-3 top-3 rounded-full border border-[#D4AF37]/50 bg-black/55 px-3 py-1 text-xs font-extrabold uppercase tracking-wide text-[#D4AF37] shadow-lg backdrop-blur">
                                {{ $menu->kategori }}
                            </span>
                        </div>

                        <div class="flex min-h-56 flex-col p-4">
                            <h2 class="truncate text-lg font-extrabold text-[#F4EFEA]">
                                {{ $menu->nama }}
                            </h2>

                            <p class="mt-2 h-12 overflow-hidden text-sm leading-6 text-[#F4EFEA]/70">
                                {{ $menu->deskripsi ?? 'Menu pilihan RamenGo yang siap dipesan.' }}
                            </p>

                            <div class="mt-auto flex items-center justify-between gap-3 pt-5">
                                <p class="text-base font-extrabold text-[#D4AF37]">
                                    Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                </p>

                                @if($hasMeja)
                                    <div class="customer-qty-control flex shrink-0 items-center overflow-hidden rounded-full">
                                        <a
                                            href="{{ route('cart.decrease', $menu->id) }}"
                                            class="flex h-9 w-9 items-center justify-center text-lg font-extrabold text-[#F4EFEA] transition hover:bg-white/10"
                                            aria-label="Kurangi {{ $menu->nama }}">
                                            -
                                        </a>

                                        <span class="min-w-9 text-center text-sm font-extrabold text-[#F4EFEA]">
                                            {{ $cart[$menu->id]['quantity'] ?? 0 }}
                                        </span>

                                        <a
                                            href="{{ route('cart.add', $menu->id) }}"
                                            class="customer-add-btn flex h-9 w-9 items-center justify-center text-lg font-extrabold transition"
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
            <div class="customer-glass-panel rounded-2xl px-6 py-12 text-center">
                <h2 class="text-2xl font-extrabold text-[#F4EFEA]">
                    Menu belum tersedia
                </h2>

                <p class="mt-2 text-[#F4EFEA]/70">
                    Belum ada item untuk kategori {{ $kategoriTabs[$activeKategori]['label'] ?? 'ini' }}.
                </p>
            </div>
        @endif
    </section>
</div>

@endsection
