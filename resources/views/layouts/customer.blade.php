<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RamenGo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    @php
        $cart = session('cart', []);

        $totalItem = 0;
        $totalHarga = 0;

        foreach($cart as $item)
        {
            $totalItem += $item['quantity'];
            $totalHarga += $item['harga'] * $item['quantity'];
        }

        $activeOrderCount = session('active_order_count', 0);
    @endphp

    <!-- Navbar Customer -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/customer"
                    class="text-2xl font-bold text-orange-500">
                    RamenGo
                </a>

                <!-- Menu -->
                <div class="flex items-center gap-6">
                    <a href="/customer"
                        class="hover:text-orange-500 font-medium">
                        Home
                    </a>

                    <a href="/customer/menu"
                        class="hover:text-orange-500 font-medium">
                        Menu
                    </a>

                    <a href="/promo"
                        class="hover:text-orange-500 font-medium">
                        Promo
                    </a>

                    <a href="/about"
                        class="hover:text-orange-500 font-medium">
                        About
                    </a>

                    <a href="/contact"
                        class="hover:text-orange-500 font-medium">
                        Contact
                    </a>

                    @if(session()->has('id_meja'))
                        <!-- Status Pesanan -->
                        <a href="/order-status"
                            class="relative hover:text-orange-500 font-medium">
                            Status Pesanan

                            @if($activeOrderCount > 0)
                                <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs px-2 rounded-full">
                                    {{ $activeOrderCount }}
                                </span>
                            @endif
                        </a>

                        <!-- Cart -->
                        <a href="/cart"
                            class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                            Cart ({{ $totalItem }})
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container mx-auto px-4 py-6">
        @if(session('success'))
            <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Floating Cart -->
    @if(session()->has('id_meja') && $totalItem > 0 && request()->is('customer/menu'))
        <a href="/cart"
            class="fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white p-7 rounded-3xl shadow-2xl z-50 transition">
            <div class="text-5xl">
                Cart
            </div>

            <div>
                <div class="font-bold text-2xl">
                    {{ $totalItem }} Item
                </div>

                <div class="text-lg">
                    Rp {{ number_format($totalHarga) }}
                </div>

                <div class="text-sm mt-1 opacity-90">
                    Lihat Keranjang
                </div>
            </div>
        </a>
    @endif

</body>
</html>
