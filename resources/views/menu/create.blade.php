@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-orange-600 mb-6">
    Tambah Menu Ramen 🍜
</h1>

<form action="{{ route('menu.store') }}"
      method="POST"
      class="bg-white p-6 rounded-2xl shadow-md">

    @csrf

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Nama Menu
        </label>

        <input type="text"
               name="nama"
               value="{{ old('nama') }}"
               class="w-full border rounded-lg px-4 py-2">

        @error('nama')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Harga
        </label>

        <input type="number"
               name="harga"
               value="{{ old('harga') }}"
               class="w-full border rounded-lg px-4 py-2">

        @error('harga')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Deskripsi
        </label>

        <textarea name="deskripsi"
                  class="w-full border rounded-lg px-4 py-2"></textarea>
    </div>

    <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
        Simpan Menu
    </button>

</form>

@endsection