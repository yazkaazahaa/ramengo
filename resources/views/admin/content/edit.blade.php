@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-5xl space-y-8">
    <section class="overflow-hidden rounded-2xl bg-white shadow-xl ring-1 ring-orange-100">
        <div class="bg-orange-500 px-8 py-8 text-white">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-orange-100">RamenGo Admin Studio</p>
            <h1 class="mt-3 text-4xl font-extrabold leading-tight">
                Edit Konten Promo & Event
            </h1>
            <p class="mt-3 max-w-2xl text-lg font-medium text-orange-50">
                Perbarui judul, tipe, deskripsi, status, dan poster yang tampil untuk pelanggan.
            </p>
        </div>
    </section>

    @if($errors->any())
        <div class="rounded-2xl border border-red-200 bg-red-50 px-6 py-4 text-red-700 shadow-sm">
            <p class="font-extrabold">Ada data yang perlu diperbaiki:</p>
            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm font-semibold">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="rounded-2xl border-2 border-orange-200 bg-white p-6 shadow-xl shadow-orange-100/70">
        <form
            action="{{ route('admin.content.update', $content->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="halaman" class="mb-2 block font-bold text-gray-800">Pilihan Tipe</label>
                    <select
                        id="halaman"
                        name="halaman"
                        class="w-full rounded-xl border border-orange-200 bg-orange-50/40 px-4 py-3 font-semibold text-gray-800 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required
                    >
                        <option value="promo" @selected(old('halaman', $content->halaman) === 'promo')>
                            Potongan Harga (Promo)
                        </option>
                        <option value="event" @selected(old('halaman', $content->halaman) === 'event')>
                            Acara Spesial Restoran (Event)
                        </option>
                    </select>
                </div>

                <div>
                    <label for="is_active" class="mb-2 block font-bold text-gray-800">Status Tampil</label>
                    <select
                        id="is_active"
                        name="is_active"
                        class="w-full rounded-xl border border-orange-200 bg-orange-50/40 px-4 py-3 font-semibold text-gray-800 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required
                    >
                        <option value="1" @selected(old('is_active', $content->is_active) == 1)>Aktif</option>
                        <option value="0" @selected(old('is_active', $content->is_active) == 0)>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="judul" class="mb-2 block font-bold text-gray-800">Judul</label>
                <input
                    id="judul"
                    type="text"
                    name="judul"
                    value="{{ old('judul', $content->judul) }}"
                    class="w-full rounded-xl border border-orange-200 px-4 py-3 text-gray-900 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                    required
                >
            </div>

            <div>
                <label for="poster" class="mb-2 block font-bold text-gray-800">Poster Konten</label>
                <label
                    id="posterDropzone"
                    for="poster"
                    class="group flex min-h-72 cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-orange-300 bg-orange-50 px-6 py-8 text-center transition hover:border-orange-500 hover:bg-orange-100"
                >
                    <img
                        id="posterPreview"
                        src="{{ $content->poster_path ? asset('storage/' . $content->poster_path) : '' }}"
                        alt="Preview poster lama"
                        class="{{ $content->poster_path ? '' : 'hidden' }} mb-5 max-h-96 w-full rounded-xl object-contain shadow-lg"
                    >

                    <div id="posterPlaceholder" class="{{ $content->poster_path ? 'hidden' : '' }}">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-orange-500 text-3xl text-white shadow-lg shadow-orange-200">
                            +
                        </div>
                        <p class="mt-4 text-lg font-extrabold text-gray-900">Klik untuk mengganti poster</p>
                        <p class="mt-1 text-sm font-medium text-gray-600">Kosongkan jika ingin tetap memakai poster lama.</p>
                    </div>
                </label>
                <input
                    id="poster"
                    type="file"
                    name="poster"
                    accept="image/*"
                    class="hidden"
                >
            </div>

            <div>
                <label for="isi" class="mb-2 block font-bold text-gray-800">Deskripsi / Isi Konten</label>
                <textarea
                    id="isi"
                    name="isi"
                    rows="7"
                    class="w-full rounded-xl border border-orange-200 px-4 py-3 text-gray-900 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                    required
                >{{ old('isi', $content->isi) }}</textarea>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row">
                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-orange-500 px-6 py-4 text-base font-extrabold uppercase tracking-wide text-white shadow-lg shadow-orange-200 transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('content.index') }}"
                    class="inline-flex items-center justify-center rounded-xl bg-gray-200 px-6 py-4 text-base font-extrabold text-gray-800 transition hover:bg-gray-300"
                >
                    Kembali
                </a>
            </div>
        </form>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('poster');
        const preview = document.getElementById('posterPreview');
        const placeholder = document.getElementById('posterPlaceholder');

        input.addEventListener('change', function () {
            const file = input.files[0];

            if (!file || !file.type.startsWith('image/')) {
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                preview.src = event.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };

            reader.readAsDataURL(file);
        });
    });
</script>
@endsection
