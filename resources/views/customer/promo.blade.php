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

<section class="relative -mx-4 -my-6 min-h-[calc(100vh-4rem)] overflow-hidden bg-[#0F0C08] bg-[url('/images/tokyo-night.jpg')] bg-cover bg-center text-white">
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-[#15100b]/85 to-[#0F0C08]"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <p class="text-sm font-bold uppercase tracking-[0.28em] text-amber-200">
                RamenGo News Room
            </p>

            <h1 class="mt-4 bg-gradient-to-r from-amber-200 via-yellow-400 to-amber-600 bg-clip-text text-4xl font-extrabold leading-tight text-transparent drop-shadow md:text-6xl">
                📰 Berita & Informasi Restoran
            </h1>

            <div class="mx-auto mt-6 h-1 w-32 rounded-full bg-gradient-to-r from-amber-300 via-yellow-500 to-amber-700"></div>
        </div>

        <div class="space-y-12">
            <section class="rounded-[2rem] border border-white/15 bg-white/10 p-5 shadow-2xl shadow-black/40 backdrop-blur-xl sm:p-7">
                <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-amber-200">
                            Event
                        </p>

                        <h2 class="mt-2 text-2xl font-extrabold text-white md:text-3xl">
                            🎪 Event & Acara
                        </h2>
                    </div>

                    <span class="w-fit rounded-full border border-amber-300/40 bg-amber-400/10 px-4 py-2 text-sm font-bold text-amber-100">
                        {{ $eventContents->count() }} informasi
                    </span>
                </div>

                @if($eventContents->count())
                    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                        @foreach($eventContents as $content)
                            <article class="group overflow-hidden rounded-2xl border border-white/15 bg-white/10 shadow-xl shadow-black/30 backdrop-blur-xl transition hover:-translate-y-1 hover:border-amber-300/50 hover:bg-white/15">
                                <div class="relative h-64 bg-black/30">
                                    @if($content->poster_path)
                                        <img
                                            src="{{ asset('storage/' . $content->poster_path) }}"
                                            alt="{{ $content->judul }}"
                                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        >
                                    @else
                                        <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-amber-700 via-red-900 to-black p-8 text-center">
                                            <h3 class="text-3xl font-extrabold leading-tight text-amber-100">
                                                {{ $content->judul }}
                                            </h3>
                                        </div>
                                    @endif

                                    <span class="absolute left-4 top-4 rounded-full bg-amber-400 px-4 py-2 text-xs font-extrabold uppercase tracking-wide text-black shadow-lg">
                                        Event 🎪
                                    </span>
                                </div>

                                <div class="flex min-h-56 flex-col p-6">
                                    <h3 class="text-2xl font-extrabold text-amber-100">
                                        {{ $content->judul }}
                                    </h3>

                                    <p class="mt-3 flex-1 leading-7 text-white/75">
                                        {{ $content->isi }}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-2xl border border-dashed border-amber-300/30 bg-black/20 px-6 py-10 text-center text-white/70">
                        Belum ada event restoran yang aktif hari ini.
                    </div>
                @endif
            </section>

            <section class="rounded-[2rem] border border-white/15 bg-white/10 p-5 shadow-2xl shadow-black/40 backdrop-blur-xl sm:p-7">
                <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-amber-200">
                            Promo
                        </p>

                        <h2 class="mt-2 text-2xl font-extrabold text-white md:text-3xl">
                            🎯 Promo & Diskon Spesial
                        </h2>
                    </div>

                    <span class="w-fit rounded-full border border-amber-300/40 bg-amber-400/10 px-4 py-2 text-sm font-bold text-amber-100">
                        {{ $promoContents->count() }} informasi
                    </span>
                </div>

                @if($promoContents->count())
                    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                        @foreach($promoContents as $content)
                            <article class="group overflow-hidden rounded-2xl border border-white/15 bg-white/10 shadow-xl shadow-black/30 backdrop-blur-xl transition hover:-translate-y-1 hover:border-amber-300/50 hover:bg-white/15">
                                <div class="relative h-64 bg-black/30">
                                    @if($content->poster_path)
                                        <img
                                            src="{{ asset('storage/' . $content->poster_path) }}"
                                            alt="{{ $content->judul }}"
                                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        >
                                    @else
                                        <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-yellow-500 via-orange-700 to-black p-8 text-center">
                                            <h3 class="text-3xl font-extrabold leading-tight text-white">
                                                {{ $content->judul }}
                                            </h3>
                                        </div>
                                    @endif

                                    <span class="absolute left-4 top-4 rounded-full bg-yellow-300 px-4 py-2 text-xs font-extrabold uppercase tracking-wide text-black shadow-lg">
                                        Promo 🎯
                                    </span>
                                </div>

                                <div class="flex min-h-56 flex-col p-6">
                                    <h3 class="text-2xl font-extrabold text-amber-100">
                                        {{ $content->judul }}
                                    </h3>

                                    <p class="mt-3 flex-1 leading-7 text-white/75">
                                        {{ $content->isi }}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-2xl border border-dashed border-amber-300/30 bg-black/20 px-6 py-10 text-center text-white/70">
                        Belum ada diskon spesial yang aktif saat ini.
                    </div>
                @endif
            </section>
        </div>
    </div>
</section>
@endsection
