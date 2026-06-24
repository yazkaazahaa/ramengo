<nav class="bg-white rounded-3xl shadow-md p-6 mb-8">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-orange-500">

                RamenGo 🍜

            </h1>

        </div>

        <div class="flex gap-10 text-lg">

            <a href="/customer"
               class="hover:text-orange-500 transition">

                Home

            </a>

            <a href="{{ route('customer.menu') }}"
               class="hover:text-orange-500 transition">

                Menu

            </a>

            <a href="{{ route('about') }}"
               class="hover:text-orange-500 transition">

                Tentang

            </a>

            <a href="{{ route('berita') }}"
               class="hover:text-orange-500 transition">

                Berita 📰

            </a>

            <a href="{{ route('contact') }}"
               class="hover:text-orange-500 transition">

                Kontak

            </a>

        </div>

    </div>

</nav>
