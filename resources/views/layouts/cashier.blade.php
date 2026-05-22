<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])

    <title>Kasir - RamenGo</title>

</head>

<body class="bg-orange-50">

<!-- NAVBAR -->

<nav class="bg-orange-500 shadow-lg">

    <div class="container mx-auto px-8 py-5 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-white">

            Kasir 💳

        </h1>


        <div class="flex items-center gap-8">

            <a
                href="{{ route('cashier.index') }}"
                class="text-white font-semibold hover:text-orange-100 transition">

                Pembayaran 💳

            </a>


            <a
                href="#"
                class="text-white font-semibold hover:text-orange-100 transition">

                Riwayat 📋

            </a>


            <a
                href="#"
                class="bg-white text-orange-500 px-4 py-2 rounded-xl font-bold hover:bg-orange-100 transition">

                Logout 🚪

            </a>

        </div>

    </div>

</nav>


<!-- CONTENT -->

<div class="container mx-auto p-8">

    @yield('content')

</div>

</body>
</html>