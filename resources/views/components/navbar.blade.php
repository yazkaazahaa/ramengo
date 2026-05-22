<nav class="bg-white shadow-md rounded-2xl p-4 mb-8">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="font-bold text-2xl text-orange-500">
                RamenGo 🍜
            </h1>

        </div>

        <div class="flex gap-6">

            <a href="/customer"
               class="hover:text-orange-500">

                Home

            </a>

            <a href="{{ route('customer.menu') }}"
               class="hover:text-orange-500">

                Menu

            </a>

            <a href="{{ route('about') }}"
               class="hover:text-orange-500">

                Tentang

            </a>

            <a href="{{ route('promo') }}"
               class="hover:text-orange-500">

                Promo

            </a>

            <a href="{{ route('contact') }}"
               class="hover:text-orange-500">

                Kontak

            </a>

        </div>

    </div>

</nav>