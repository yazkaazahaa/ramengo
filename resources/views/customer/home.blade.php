@extends('layouts.app')

@section('content')

<!-- HERO -->

<div class="bg-gradient-to-r from-orange-500 to-orange-400 rounded-3xl p-10 shadow-lg mb-12">

    <div class="grid md:grid-cols-2 items-center gap-10">

        <div>

            <div class="bg-white inline-block px-5 py-2 rounded-full mb-6">

                <span class="text-orange-500 font-bold">

                    Selamat Datang 👋

                </span>

            </div>

            <h1 class="text-6xl font-bold text-white leading-tight mb-6">

                Selamat Datang di
                <br>
                RamenGo 🍜

            </h1>

            <p class="text-orange-100 text-xl mb-8">

                Nikmati ramen hangat dengan pengalaman
                pemesanan digital yang cepat dan nyaman.

            </p>

            <a href="{{ route('customer.menu') }}"
                class="bg-white text-orange-500 px-8 py-4 rounded-2xl font-bold shadow-md hover:scale-105 transition inline-flex items-center gap-3">

                🍜 Pesan Sekarang →

            </a>

        </div>


        <div class="flex justify-center">

            <img src="{{ asset('images/ramen_home.jpg') }}"
     class="w-[450px] mx-auto drop-shadow-2xl">

        </div>

    </div>

</div>


<!-- JUDUL -->

<div class="text-center mb-10">

    <h2 class="text-4xl font-bold">

        Kenapa Harus RamenGo?

    </h2>

    <div class="w-28 h-1 bg-orange-500 mx-auto mt-4 rounded-full"></div>

</div>


<!-- FITUR -->

<div class="grid md:grid-cols-3 gap-8">

    <div class="bg-white p-8 rounded-3xl shadow-md">

        <div class="bg-orange-100 w-24 h-24 rounded-full flex items-center justify-center text-5xl mb-6">

            🍜

        </div>

        <h2 class="font-bold text-3xl mb-4">

            Ramen Premium

        </h2>

        <p class="text-gray-500 text-lg">

            Dibuat dari bahan berkualitas
            dan kuah khas Jepang yang lezat.

        </p>

    </div>



    <div class="bg-white p-8 rounded-3xl shadow-md">

        <div class="bg-orange-100 w-24 h-24 rounded-full flex items-center justify-center text-5xl mb-6">

            ⚡

        </div>

        <h2 class="font-bold text-3xl mb-4">

            Cepat & Praktis

        </h2>

        <p class="text-gray-500 text-lg">

            Scan QR di meja lalu pesan
            langsung dari HP.

        </p>

    </div>




    <div class="bg-white p-8 rounded-3xl shadow-md">

        <div class="bg-orange-100 w-24 h-24 rounded-full flex items-center justify-center text-5xl mb-6">

            🎉

        </div>

        <h2 class="font-bold text-3xl mb-4">

            Promo Menarik

        </h2>

        <p class="text-gray-500 text-lg">

            Dapatkan promo terbaru
            setiap minggu.

        </p>

    </div>

</div>

@endsection