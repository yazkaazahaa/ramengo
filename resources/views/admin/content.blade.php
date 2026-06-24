@extends('layouts.admin')

@section('content')
<div class="space-y-10">
    <section class="overflow-hidden rounded-2xl bg-white shadow-xl ring-1 ring-orange-100">
        <div class="relative bg-orange-500 px-8 py-10 text-white">
            <div class="absolute inset-0 opacity-15">
                <div class="h-full w-full bg-[radial-gradient(circle_at_20%_20%,#ffffff_0_2px,transparent_3px),radial-gradient(circle_at_80%_30%,#ffffff_0_2px,transparent_3px),radial-gradient(circle_at_40%_80%,#ffffff_0_2px,transparent_3px)] bg-[length:42px_42px]"></div>
            </div>

            <div class="relative">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-orange-100">RamenGo Admin Studio</p>
                <h1 class="mt-3 text-4xl font-extrabold leading-tight md:text-5xl">
                    🍜 Pengelola Promo & Event RamenGo
                </h1>
                <p class="mt-3 max-w-2xl text-lg font-medium text-orange-50">
                    Atur strategi diskon dan acara festival ramen harian di sini.
                </p>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="rounded-2xl border border-green-200 bg-green-50 px-6 py-4 font-bold text-green-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <section class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-2xl border-2 border-orange-200 bg-white p-6 shadow-xl shadow-orange-100/70">
            <div class="mb-6">
                <p class="text-sm font-bold uppercase tracking-widest text-orange-500">Form Kampanye Baru</p>
                <h2 class="mt-2 text-2xl font-extrabold text-gray-900">Buat Promo atau Event</h2>
                <p class="mt-2 text-gray-600">Lengkapi poster, judul, dan deskripsi agar pelanggan langsung tertarik.</p>
            </div>

            <form
                action="{{ route('content.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5"
            >
                @csrf

                <div>
                    <label for="halaman" class="mb-2 block font-bold text-gray-800">Pilihan Tipe</label>
                    <select
                        id="halaman"
                        name="halaman"
                        class="w-full rounded-xl border border-orange-200 bg-orange-50/40 px-4 py-3 font-semibold text-gray-800 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required
                    >
                        <option value="promo">Potongan Harga (Promo)</option>
                        <option value="event">Acara SpesialRestoran (Event)</option>
                    </select>
                </div>

                <div>
                    <label for="judul" class="mb-2 block font-bold text-gray-800">Judul</label>
                    <input
                        id="judul"
                        type="text"
                        name="judul"
                        value="{{ old('judul') }}"
                        placeholder="Festival Ramen Pedas Level 10"
                        class="w-full rounded-xl border border-orange-200 px-4 py-3 text-gray-900 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required
                    >
                </div>

                <div>
                    <label for="poster" class="mb-2 block font-bold text-gray-800">Upload Gambar Poster</label>
                    <label
                        id="posterDropzone"
                        for="poster"
                        class="group flex min-h-64 cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-orange-300 bg-orange-50 px-6 py-8 text-center transition hover:border-orange-500 hover:bg-orange-100"
                    >
                        <img
                            id="posterPreview"
                            src=""
                            alt="Preview poster promo"
                            class="mb-5 hidden max-h-72 w-full rounded-xl object-cover shadow-lg"
                        >

                        <div id="posterPlaceholder">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-orange-500 text-3xl text-white shadow-lg shadow-orange-200">
                                +
                            </div>
                            <p class="mt-4 text-lg font-extrabold text-gray-900">Tarik poster ke sini atau klik untuk upload</p>
                            <p class="mt-1 text-sm font-medium text-gray-600">Gunakan JPG, PNG, atau WEBP agar tampilan kartu terlihat tajam.</p>
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
                        rows="6"
                        placeholder="Tulis detail syarat dan ketentuan promo, jadwal event, menu unggulan, atau kuota harian."
                        class="w-full rounded-xl border border-orange-200 px-4 py-3 text-gray-900 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200"
                        required
                    >{{ old('isi') }}</textarea>
                </div>

                <button
                    type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-orange-500 px-6 py-4 text-base font-extrabold uppercase tracking-wide text-white shadow-lg shadow-orange-200 transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto"
                >
                    Simpan Promo & Event
                </button>
            </form>
        </div>

        <aside class="rounded-2xl bg-gray-950 p-6 text-white shadow-xl">
            <p class="text-sm font-bold uppercase tracking-widest text-orange-300">Mood Board</p>
            <h2 class="mt-3 text-3xl font-extrabold">Festival rasa, diskon hangat, poster yang menggoda.</h2>
            <p class="mt-4 leading-7 text-gray-300">
                Buat kampanye singkat, jelas, dan visual. Promo gajian cocok memakai judul angka diskon, sedangkan event restoran cocok memakai kata festival, challenge, atau limited bowl.
            </p>

            <div class="mt-8 grid grid-cols-2 gap-3">
                <div class="rounded-2xl bg-orange-500 p-4">
                    <p class="text-3xl font-extrabold">{{ $contents->where('halaman', 'promo')->count() }}</p>
                    <p class="mt-1 text-sm font-bold text-orange-50">Promo Dibuat</p>
                </div>

                <div class="rounded-2xl bg-red-500 p-4">
                    <p class="text-3xl font-extrabold">{{ $contents->where('halaman', 'event')->count() }}</p>
                    <p class="mt-1 text-sm font-bold text-red-50">Event Dibuat</p>
                </div>
            </div>
        </aside>
    </section>

    <section>
        <div class="mb-6 flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-orange-500">Poster Aktif</p>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">🔥 Daftar Promo & Event yang Sedang Berjalan</h2>
            </div>
        </div>

        @php
            $activeContents = $contents->filter(function ($content) {
                return in_array(strtolower($content->halaman), ['promo', 'event'])
                    && ($content->is_active ?? true);
            });
        @endphp

        @if($activeContents->count())
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($activeContents as $content)
                    @php
                        $isEvent = strtolower($content->halaman) === 'event';
                        $badgeClass = $isEvent
                            ? 'bg-red-500 text-white shadow-red-200'
                            : 'bg-green-500 text-white shadow-green-200';
                        $badgeText = $isEvent ? 'EVENT 🎪' : 'PROMO 🎯';
                    @endphp

                    <article class="group overflow-hidden rounded-2xl bg-white shadow-lg ring-1 ring-orange-100 transition hover:-translate-y-1 hover:shadow-2xl">
                        <div class="relative h-72 bg-orange-100">
                            @if($content->poster_path)
                                <img
                                    src="{{ asset('storage/' . $content->poster_path) }}"
                                    alt="{{ $content->judul }}"
                                    class="h-full w-full object-cover"
                                >
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-orange-500 via-red-500 to-yellow-400 p-8 text-center text-white">
                                    <div>
                                        <p class="text-sm font-bold uppercase tracking-[0.3em] text-orange-100">RamenGo</p>
                                        <h3 class="mt-4 text-3xl font-extrabold leading-tight">{{ $content->judul }}</h3>
                                    </div>
                                </div>
                            @endif

                            <span class="absolute left-4 top-4 rounded-full px-4 py-2 text-xs font-extrabold uppercase tracking-wide shadow-lg {{ $badgeClass }}">
                                {{ $badgeText }}
                            </span>
                        </div>

                        <div class="flex min-h-64 flex-col p-6">
                            <h3 class="text-2xl font-extrabold text-gray-900">{{ $content->judul }}</h3>
                            <p class="mt-3 line-clamp-4 flex-1 leading-7 text-gray-600">{{ $content->isi }}</p>

                            <div class="mt-6 grid gap-3 sm:grid-cols-3">
                                <a
                                    href="{{ route('admin.content.edit', $content->id) }}"
                                    class="inline-flex w-full items-center justify-center rounded-xl bg-sky-100 px-4 py-3 text-center text-sm font-bold text-sky-700 transition hover:bg-sky-200"
                                >
                                    Edit Konten
                                </a>

                                <form action="{{ route('content.update', $content->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="halaman" value="{{ $content->halaman }}">
                                    <input type="hidden" name="judul" value="{{ $content->judul }}">
                                    <input type="hidden" name="isi" value="{{ $content->isi }}">
                                    <input type="hidden" name="is_active" value="0">

                                    <button
                                        type="submit"
                                        class="w-full rounded-xl bg-gray-200 px-4 py-3 text-sm font-bold text-gray-800 transition hover:bg-gray-300"
                                    >
                                        Matikan Sementara
                                    </button>
                                </form>

                                <form
                                    action="{{ route('content.delete', $content->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus permanen promo/event ini?')"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full rounded-xl bg-red-500 px-4 py-3 text-sm font-bold text-white transition hover:bg-red-600"
                                    >
                                        Hapus Permanen
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border-2 border-dashed border-orange-200 bg-white px-6 py-14 text-center shadow-sm">
                <h3 class="text-2xl font-extrabold text-gray-900">Belum ada promo atau event aktif</h3>
                <p class="mt-2 text-gray-600">Tambahkan poster pertama untuk mulai menghidupkan kalender promosi RamenGo.</p>
            </div>
        @endif
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('poster');
        const dropzone = document.getElementById('posterDropzone');
        const preview = document.getElementById('posterPreview');
        const placeholder = document.getElementById('posterPlaceholder');

        function showPreview(file) {
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
        }

        input.addEventListener('change', function () {
            showPreview(input.files[0]);
        });

        ['dragenter', 'dragover'].forEach(function (eventName) {
            dropzone.addEventListener(eventName, function (event) {
                event.preventDefault();
                dropzone.classList.add('border-orange-500', 'bg-orange-100');
            });
        });

        ['dragleave', 'drop'].forEach(function (eventName) {
            dropzone.addEventListener(eventName, function (event) {
                event.preventDefault();
                dropzone.classList.remove('border-orange-500', 'bg-orange-100');
            });
        });

        dropzone.addEventListener('drop', function (event) {
            const file = event.dataTransfer.files[0];

            if (!file) {
                return;
            }

            input.files = event.dataTransfer.files;
            showPreview(file);
        });
    });
</script>
@endsection
