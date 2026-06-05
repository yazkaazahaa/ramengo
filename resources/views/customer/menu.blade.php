<div class="container mx-auto py-12">

    <h2 class="text-4xl font-bold text-center mb-10">
        Menu Ramen
    </h2>

    <div class="grid md:grid-cols-3 gap-8">

        @foreach($menus as $menu)

            <div class="text-center">

                <img
                    src="{{ asset('storage/'.$menu->gambar) }}"
                    alt="{{ $menu->nama }}"
                    class="w-full h-64 object-cover rounded-full shadow-lg">

                <h3 class="mt-4 text-2xl font-bold">
                    {{ $menu->nama }}
                </h3>

            </div>

        @endforeach

    </div>

</div>