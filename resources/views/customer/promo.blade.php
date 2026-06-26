@extends('layouts.customer')

@section('content')

@php
$contents = collect($contents ?? []);

$eventContents = $contents->filter(function ($content) {
    return strtolower($content->tipe ?? $content->halaman ?? '') === 'event';
});

$promoContents = $contents->filter(function ($content) {
    return strtolower($content->tipe ?? $content->halaman ?? '') === 'promo';
});
@endphp



    <div class="relative mx-auto max-w-7xl px-6 py-8">
        <div class="text-center mb-8">
            <p class="uppercase tracking-[0.25em] text-amber-200 font-bold">RamenGo News Room</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-black bg-gradient-to-r from-amber-200 via-yellow-400 to-amber-600 bg-clip-text text-transparent">📰 Berita & Informasi</h1>
        </div>

        <div class="grid gap-8 xl:grid-cols-2">
            <section class="space-y-6">
                <div class="rounded-[28px] border border-amber-300/20 bg-black/30 p-6 shadow-xl shadow-amber-500/10">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl bg-white/10 flex items-center justify-center text-2xl">🏮</div>
                            <div>
                                <p class="uppercase tracking-[0.3em] text-xs text-amber-100">Event</p>
                                <h2 class="text-3xl font-black">Event Terbaru</h2>
                            </div>
                        </div>
                        <div class="rounded-xl bg-black/25 px-5 py-3 text-center text-sm uppercase text-amber-100">
                            <div class="text-2xl font-black text-yellow-300">{{ $eventContents->count() }}</div>
                            Informasi
                        </div>
                    </div>
                </div>

                <div class="grid gap-5 sm:grid-cols-1">
                    @foreach($eventContents as $content)
                        <article class="group overflow-hidden rounded-3xl shadow-2xl hover:-translate-y-1 transition duration-300">
                            <div class="relative">
                                @if($content->poster_path)
                                    <img src="{{ asset('storage/'.$content->poster_path) }}" class="w-full h-[240px] object-cover duration-500 group-hover:scale-105" alt="{{ $content->judul }}">
                                @else
                                    <div class="w-full h-[240px] bg-[#1e1310]"></div>
                                @endif
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/60 to-transparent p-4">
                                    <h3 class="text-lg font-black text-white">{{ $content->judul }}</h3>
                                    <button onclick="openNewsModal('{{ $content->id }}')" class="mt-3 bg-[#D4AF37] text-black font-bold px-4 py-2 rounded-xl">Detail</button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <aside class="space-y-6">
                <div class="rounded-[28px] border border-yellow-300/20 bg-black/30 p-6 shadow-xl shadow-yellow-500/10">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl bg-white/10 flex items-center justify-center text-2xl">🎯</div>
                            <div>
                                <p class="uppercase tracking-[0.3em] text-xs text-yellow-100">Promo</p>
                                <h2 class="text-3xl font-black">Promo Terpilih</h2>
                            </div>
                        </div>
                        <div class="rounded-xl bg-black/25 px-5 py-3 text-center text-sm uppercase text-yellow-100">
                            <div class="text-2xl font-black text-yellow-300">{{ $promoContents->count() }}</div>
                            Informasi
                        </div>
                    </div>
                </div>

                <div class="grid gap-5 sm:grid-cols-1">
                    @foreach($promoContents as $content)
                        <article class="group overflow-hidden rounded-3xl shadow-2xl hover:-translate-y-1 transition duration-300">
                            <div class="relative">
                                @if($content->poster_path)
                                    <img src="{{ asset('storage/'.$content->poster_path) }}" class="w-full h-[240px] object-cover duration-500 group-hover:scale-105" alt="{{ $content->judul }}">
                                @else
                                    <div class="w-full h-[240px] bg-[#1e1310]"></div>
                                @endif
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/60 to-transparent p-4">
                                    <h3 class="text-lg font-black text-white">{{ $content->judul }}</h3>
                                    <button onclick="openNewsModal('{{ $content->id }}')" class="mt-3 bg-[#D4AF37] text-black font-bold px-4 py-2 rounded-xl">Detail</button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>
</section>

@foreach($contents as $content)
    <div id="modal-data-{{ $content->id }}" class="hidden" data-judul="{{ $content->judul }}" data-gambar="{{ $content->poster_path ? asset('storage/'.$content->poster_path) : '' }}" data-isi="{{ $content->isi }}"></div>
@endforeach

<div id="newsModal" class="hidden fixed inset-0 z-50 bg-black/90 items-center justify-center p-5">
    <div class="bg-[#140908] rounded-3xl overflow-hidden max-w-5xl w-full grid md:grid-cols-2">
        <img id="modalImage" class="w-full h-full object-cover" alt="Detail Poster">
        <div class="p-8">
            <h2 id="modalTitle" class="text-3xl font-black text-amber-300"></h2>
            <div id="modalContent" class="mt-6 leading-8"></div>
            <button onclick="closeNewsModal()" class="mt-6 bg-[#D4AF37] text-black font-bold px-6 py-3 rounded-xl">Tutup</button>
        </div>
    </div>
</div>

<script>
    function openNewsModal(id) {
        const data = document.getElementById('modal-data-' + id);
        document.getElementById('modalTitle').innerText = data.dataset.judul;
        document.getElementById('modalContent').innerText = data.dataset.isi;
        document.getElementById('modalImage').src = data.dataset.gambar;
        const newsModal = document.getElementById('newsModal');
        newsModal.classList.remove('hidden');
        newsModal.classList.add('flex');
    }

    function closeNewsModal() {
        const newsModal = document.getElementById('newsModal');
        newsModal.classList.remove('flex');
        newsModal.classList.add('hidden');
    }
</script>

@endsection
