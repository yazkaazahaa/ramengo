@extends('layouts.admin')

@section('content')

<div class="space-y-8">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-bold uppercase tracking-widest text-orange-500">
                Admin RamenGo
            </p>

            <h1 class="mt-2 text-4xl font-extrabold text-gray-900">
                Manajemen Menu
            </h1>

            <p class="mt-2 max-w-2xl text-gray-600">
                Kelola menu ramen, minuman, topping, harga, gambar, dan deskripsi untuk pelanggan.
            </p>
        </div>

        <a
            href="{{ url('/admin/menu/create') }}"
            class="inline-flex items-center justify-center rounded-xl bg-orange-500 px-6 py-3 text-base font-bold text-white shadow-lg shadow-orange-200 transition hover:bg-orange-600">
            + Tambah Menu Baru
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-2xl bg-white p-3 shadow-md">
        <div class="flex flex-wrap gap-3" id="kategoriFilter">
            <button
                type="button"
                data-filter="semua"
                class="filter-btn rounded-xl bg-orange-500 px-5 py-2.5 font-bold text-white shadow transition">
                Semua
            </button>

            <button
                type="button"
                data-filter="makanan"
                class="filter-btn rounded-xl bg-orange-100 px-5 py-2.5 font-bold text-orange-700 transition hover:bg-orange-200">
                Makanan
            </button>

            <button
                type="button"
                data-filter="minuman"
                class="filter-btn rounded-xl bg-orange-100 px-5 py-2.5 font-bold text-orange-700 transition hover:bg-orange-200">
                Minuman
            </button>

            <button
                type="button"
                data-filter="topping"
                class="filter-btn rounded-xl bg-orange-100 px-5 py-2.5 font-bold text-orange-700 transition hover:bg-orange-200">
                Topping
            </button>
        </div>
    </div>

    @if($menus->count() > 0)
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3" id="menuGrid">
            @foreach ($menus as $item)
                @php
                    $kategoriAsli = strtolower($item->kategori);
                    $kategoriFilter = $kategoriAsli;

                    if (in_array($kategoriAsli, ['original', 'kari', 'pedas', 'dry ramen', 'rice bowl'])) {
                        $kategoriFilter = 'makanan';
                    }
                @endphp

                <div
                    class="menu-card overflow-hidden rounded-2xl bg-white shadow-md ring-1 ring-orange-100 transition hover:-translate-y-1 hover:shadow-xl"
                    data-kategori="{{ $kategoriFilter }}">
                    <div class="relative h-52 bg-orange-100">
                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->nama }}"
                            class="h-full w-full object-cover">

                        <span class="absolute right-4 top-4 rounded-full bg-orange-500 px-4 py-1.5 text-xs font-extrabold uppercase tracking-wide text-white shadow-md">
                            {{ $item->kategori }}
                        </span>
                    </div>

                    <div class="flex min-h-80 flex-col p-6">
                        <div class="mb-4">
                            <h2 class="text-2xl font-extrabold text-gray-900">
                                {{ $item->nama }}
                            </h2>

                            <p class="mt-2 text-xl font-extrabold text-orange-600">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </p>
                        </div>

                        <p class="line-clamp-4 flex-1 text-sm leading-6 text-gray-600">
                            {{ $item->deskripsi }}
                        </p>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <a
                                href="{{ url('/admin/menu/' . $item->id . '/edit') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-blue-500 px-4 py-2.5 font-bold text-blue-600 transition hover:bg-blue-500 hover:text-white">
                                Edit
                            </a>

                            <form
                                action="{{ url('/admin/menu/' . $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full rounded-xl bg-red-500 px-4 py-2.5 font-bold text-white transition hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div
            id="emptyFilterMessage"
            class="hidden rounded-2xl border-2 border-dashed border-orange-200 bg-white px-6 py-12 text-center shadow-sm">
            <h2 class="text-2xl font-extrabold text-gray-900">
                Menu kategori ini belum tersedia
            </h2>

            <p class="mt-2 text-gray-600">
                Silakan pilih kategori lain atau tambahkan menu baru.
            </p>
        </div>
    @else
        <div class="rounded-2xl border-2 border-dashed border-orange-200 bg-white px-6 py-12 text-center shadow-sm">
            <h2 class="text-2xl font-extrabold text-gray-900">
                Belum ada menu
            </h2>

            <p class="mt-2 text-gray-600">
                Klik tombol tambah menu untuk mengisi daftar menu RamenGo.
            </p>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.menu-card');
        const emptyMessage = document.getElementById('emptyFilterMessage');

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                const filter = button.dataset.filter;
                let visibleCount = 0;

                buttons.forEach(function (item) {
                    item.classList.remove('bg-orange-500', 'text-white', 'shadow');
                    item.classList.add('bg-orange-100', 'text-orange-700');
                });

                button.classList.remove('bg-orange-100', 'text-orange-700');
                button.classList.add('bg-orange-500', 'text-white', 'shadow');

                cards.forEach(function (card) {
                    const kategori = card.dataset.kategori;
                    const isVisible = filter === 'semua' || kategori === filter;

                    card.classList.toggle('hidden', !isVisible);

                    if (isVisible) {
                        visibleCount++;
                    }
                });

                if (emptyMessage) {
                    emptyMessage.classList.toggle('hidden', visibleCount > 0);
                }
            });
        });
    });
</script>

@endsection
