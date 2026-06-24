@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-orange-50 py-6">
    <div class="mx-auto max-w-4xl">
        <div class="mb-6 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-orange-500">
                    Admin RamenGo
                </p>

                <h1 class="mt-2 text-4xl font-extrabold text-gray-900">
                    Edit Menu RamenGo 🍜
                </h1>

                <p class="mt-2 text-gray-600">
                    Perbarui informasi menu agar data yang tampil untuk pelanggan tetap akurat.
                </p>
            </div>

            <a
                href="{{ url('/admin/menu') }}"
                class="inline-flex items-center justify-center rounded-xl bg-gray-200 px-5 py-3 font-bold text-gray-800 transition hover:bg-gray-300">
                Batal
            </a>
        </div>

        <div class="rounded-2xl bg-white p-8 shadow-xl ring-1 ring-orange-100">
            <form
                action="{{ route('admin.menu.update', $menu->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama" class="mb-2 block font-bold text-gray-800">
                        Nama Menu
                    </label>

                    <input
                        id="nama"
                        type="text"
                        name="nama"
                        value="{{ old('nama', $menu->nama) }}"
                        class="w-full rounded-xl border border-orange-200 px-4 py-3 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required>

                    @error('nama')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="harga" class="mb-2 block font-bold text-gray-800">
                        Harga
                    </label>

                    <input
                        id="harga"
                        type="number"
                        name="harga"
                        value="{{ old('harga', $menu->harga) }}"
                        class="w-full rounded-xl border border-orange-200 px-4 py-3 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required>

                    @error('harga')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="kategori" class="mb-2 block font-bold text-gray-800">
                        Kategori
                    </label>

                    <select
                        id="kategori"
                        name="kategori"
                        class="w-full rounded-xl border border-orange-200 px-4 py-3 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required>
                        <option value="Makanan" {{ old('kategori', $menu->kategori) == 'Makanan' ? 'selected' : '' }}>
                            Makanan
                        </option>
                        <option value="Minuman" {{ old('kategori', $menu->kategori) == 'Minuman' ? 'selected' : '' }}>
                            Minuman
                        </option>
                        <option value="Topping" {{ old('kategori', $menu->kategori) == 'Topping' ? 'selected' : '' }}>
                            Topping
                        </option>
                    </select>

                    @error('kategori')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="mb-2 block font-bold text-gray-800">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        class="w-full rounded-xl border border-orange-200 px-4 py-3 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200">{{ old('deskripsi', $menu->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="gambar" class="mb-2 block font-bold text-gray-800">
                        Upload Gambar Baru
                    </label>

                    <input
                        id="gambar"
                        type="file"
                        name="gambar"
                        class="w-full rounded-xl border border-orange-200 bg-white px-4 py-3 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200">

                    @error('gambar')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                @if($menu->gambar)
                    <div class="rounded-xl bg-orange-50 p-4">
                        <p class="mb-3 font-bold text-gray-800">
                            Gambar Saat Ini
                        </p>

                        <img
                            src="{{ asset('storage/' . $menu->gambar) }}"
                            alt="{{ $menu->nama }}"
                            class="h-40 w-40 rounded-xl object-cover shadow-md">
                    </div>
                @endif

                <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-orange-500 px-6 py-3 font-extrabold text-white shadow-lg shadow-orange-200 transition hover:bg-orange-600">
                        Simpan Perubahan
                    </button>

                    <a
                        href="{{ url('/admin/menu') }}"
                        class="inline-flex items-center justify-center rounded-xl bg-gray-200 px-6 py-3 font-bold text-gray-800 transition hover:bg-gray-300">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
