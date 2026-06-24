@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-orange-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 mb-8 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-orange-500">
                    Admin RamenGo
                </p>

                <h1 class="text-3xl font-bold text-gray-900 mt-1">
                    Manajemen Menu
                </h1>

                <p class="text-gray-600 mt-2">
                    Kelola daftar menu, harga, kategori, gambar, dan deskripsi.
                </p>
            </div>

            <a
                href="{{ url('/admin/menu/create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-orange-500 px-5 py-3 font-bold text-white shadow-md transition hover:bg-orange-600">
                + Tambah Menu Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($menus->count() > 0)
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($menus as $item)
                    <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-orange-100 transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative h-52 bg-gray-100">
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama }}"
                                class="h-full w-full object-cover">

                            <span class="absolute right-4 top-4 rounded-full bg-yellow-400 px-3 py-1 text-xs font-bold uppercase tracking-wide text-gray-900 shadow">
                                {{ $item->kategori }}
                            </span>
                        </div>

                        <div class="flex min-h-72 flex-col p-5">
                            <div class="mb-4">
                                <h2 class="text-xl font-bold text-gray-900">
                                    {{ $item->nama }}
                                </h2>

                                <p class="mt-2 text-lg font-bold text-orange-600">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </p>
                            </div>

                            <p class="line-clamp-4 flex-1 text-sm leading-6 text-gray-600">
                                {{ $item->deskripsi }}
                            </p>

                            <div class="mt-5 grid grid-cols-2 gap-3">
                                <a
                                    href="{{ url('/admin/menu/' . $item->id . '/edit') }}"
                                    class="inline-flex items-center justify-center rounded-lg bg-blue-500 px-4 py-2 font-semibold text-white transition hover:bg-blue-600">
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
                                        class="w-full rounded-lg bg-red-500 px-4 py-2 font-semibold text-white transition hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-lg border-2 border-dashed border-orange-200 bg-white px-6 py-12 text-center">
                <h2 class="text-xl font-bold text-gray-900">
                    Belum ada menu
                </h2>

                <p class="mt-2 text-gray-600">
                    Tambahkan menu pertama agar bisa tampil di halaman pelanggan.
                </p>
            </div>
        @endif
    </div>
</div>

@endsection
