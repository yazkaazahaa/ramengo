<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RamenGo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="japan-theme customer-theme">

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
    <nav class="theme-nav sticky top-0 z-40">
        <div class="container mx-auto px-6">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <a href="/customer"
                    class="text-2xl font-extrabold text-[#D4AF37]">
                    RamenGo
                </a>

                <!-- Menu -->
                <div class="flex items-center gap-6">
                    <a href="/customer"
                        class="font-bold text-[#F4EFEA]/85 transition hover:text-[#D4AF37]">
                        Home
                    </a>

                    <a href="/customer/menu"
                        class="font-bold text-[#F4EFEA]/85 transition hover:text-[#D4AF37]">
                        Menu
                    </a>

                    <a href="{{ route('berita') }}"
                        class="font-bold text-[#F4EFEA]/85 transition hover:text-[#D4AF37]">
                        Berita 
                    </a>

                    <a href="/about"
                        class="font-bold text-[#F4EFEA]/85 transition hover:text-[#D4AF37]">
                        About
                    </a>

                    <a href="/contact"
                        class="font-bold text-[#F4EFEA]/85 transition hover:text-[#D4AF37]">
                        Contact
                    </a>

                    @if(session()->has('id_meja'))
                        <!-- Status Pesanan -->
                        <a href="/order-status"
                            class="relative font-bold text-[#F4EFEA]/85 transition hover:text-[#D4AF37]">
                            Status Pesanan

                            @if($activeOrderCount > 0)
                                <span class="absolute -top-2 -right-3 rounded-full bg-red-500 px-2 text-xs text-white">
                                    {{ $activeOrderCount }}
                                </span>
                            @endif
                        </a>

                        <!-- Cart -->
                        <a href="/cart"
                            class="customer-action-btn rounded-lg px-4 py-2 font-extrabold">
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
            <div class="mb-4 rounded-xl border border-emerald-400/30 bg-emerald-500/10 px-4 py-3 font-semibold text-emerald-100 backdrop-blur">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Floating Cart -->
    @if(session()->has('id_meja') && $totalItem > 0 && request()->is('customer/menu'))
        <a href="/cart"
            class="customer-floating-cart fixed bottom-6 right-6 z-50 rounded-3xl p-7">
            <div class="text-5xl">
                Cart
            </div>

            <div>
                <div class="text-2xl font-bold">
                    {{ $totalItem }} Item
                </div>

                <div class="text-lg text-[#D4AF37]">
                    Rp {{ number_format($totalHarga) }}
                </div>

                <div class="mt-1 text-sm opacity-90">
                    Lihat Keranjang
                </div>
            </div>
        </a>
    @endif

</body>
</html>
