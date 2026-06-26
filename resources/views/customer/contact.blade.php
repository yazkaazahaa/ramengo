@extends('layouts.customer')

@section('content')

<div class="max-w-2xl mx-auto px-6 py-12 space-y-10">

    <!-- KOTAK KONTAK TEMA JEPANG (HITAM ARANG + GLOWING LANTERN + EMAS) -->
    <div class="theme-panel rounded-3xl p-8 border backdrop-blur-md" 
         style="background: linear-gradient(180deg, rgba(27, 13, 11, 0.85) 0%, rgba(12, 9, 8, 0.9) 100%) !important; 
                border-color: rgba(213, 24, 18, 0.4) !important; 
                box-shadow: 0 0 35px rgba(211, 24, 18, 0.25), inset 0 0 15px rgba(212, 175, 55, 0.1) !important;">

        <!-- JUDUL TEMA EMAS LANTERN -->
        <h1 class="text-4xl font-extrabold text-[#d4af37] text-center mb-2" style="text-shadow: 0 0 15px rgba(212,175,55,0.4);">
            Kontak Kami 📞
        </h1>
        
        <p class="text-center mb-8 opacity-80" style="color: #f4efea !important;">
            Hubungi kami melalui informasi di bawah ini untuk pemesanan atau kemitraan.
        </p>

        <div class="space-y-5">

            <!-- TOMBOL EMAIL TEMA MERAH LANTERN -->
            <div class="flex items-center gap-4 p-4 rounded-2xl border transition hover:scale-[1.02]" 
                 style="background: rgba(213, 24, 18, 0.15) !important; border-color: rgba(213, 24, 18, 0.3) !important;">
                <span class="text-3xl filter drop-shadow-[0_0_8px_rgba(255,59,31,0.6)]">📧</span>
                <div>
                    <p class="font-bold text-[#d4af37]">Email</p>
                    <p style="color: #f4efea !important;" class="opacity-90">ramengo@gmail.com</p>
                </div>
            </div>

            <!-- TOMBOL INSTAGRAM TEMA MERAH LANTERN -->
            <div class="flex items-center gap-4 p-4 rounded-2xl border transition hover:scale-[1.02]" 
                 style="background: rgba(213, 24, 18, 0.15) !important; border-color: rgba(213, 24, 18, 0.3) !important;">
                <span class="text-3xl filter drop-shadow-[0_0_8px_rgba(255,59,31,0.6)]">📷</span>
                <div>
                    <p class="font-bold text-[#d4af37]">Instagram</p>
                    <p style="color: #f4efea !important;" class="opacity-90">@ramengo</p>
                </div>
            </div>

            <!-- TOMBOL WHATSAPP TEMA MERAH LANTERN -->
            <div class="flex items-center gap-4 p-4 rounded-2xl border transition hover:scale-[1.02]" 
                 style="background: rgba(213, 24, 18, 0.15) !important; border-color: rgba(213, 24, 18, 0.3) !important;">
                <span class="text-3xl filter drop-shadow-[0_0_8px_rgba(255,59,31,0.6)]">💬</span>
                <div>
                    <p class="font-bold text-[#d4af37]">WhatsApp</p>
                    <p style="color: #f4efea !important;" class="opacity-90">08123456789</p>
                </div>
            </div>

        </div>

    </div>

    <!-- KOTAK TAMBAHAN BAWAH DARI DATABASE (TEMA MENYATU) -->
    <div class="theme-card p-8 rounded-3xl border backdrop-blur-md" 
         style="background: linear-gradient(180deg, rgba(20, 8, 5, 0.85), rgba(12, 9, 8, 0.9)) !important; 
                border-color: rgba(255, 89, 39, 0.25) !important;">

        @if($content)
            <h2 class="text-3xl font-bold text-[#d4af37] mb-4">
                {{ $content->judul }}
            </h2>
            <p class="text-lg opacity-90" style="color: #f4efea !important;">
                {{ $content->isi }}
            </p>
        @else
            <h2 class="text-3xl font-bold text-[#d4af37] mb-4">
                Tentang Kami
            </h2>
            <p class="text-lg opacity-70" style="color: #f4efea !important;">
                Informasi detail kontak dari admin belum tersedia saat ini.
            </p>
        @endif

    </div>

</div>

@endsection
