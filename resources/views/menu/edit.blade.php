<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Menu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-orange-600 mb-6">
                    Edit Menu
                </h1>

                <form
                    action="{{ route('admin.menu.update', $menu->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nama" class="block mb-2 font-semibold">
                            Nama Menu
                        </label>

                        <input
                            id="nama"
                            type="text"
                            name="nama"
                            value="{{ old('nama', $menu->nama) }}"
                            class="w-full border rounded-lg px-4 py-2">

                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="harga" class="block mb-2 font-semibold">
                            Harga
                        </label>

                        <input
                            id="harga"
                            type="number"
                            name="harga"
                            value="{{ old('harga', $menu->harga) }}"
                            class="w-full border rounded-lg px-4 py-2">

                        @error('harga')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block mb-2 font-semibold">
                            Deskripsi
                        </label>

                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            rows="4"
                            class="w-full border rounded-lg px-4 py-2">{{ old('deskripsi', $menu->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="kategori" class="block mb-2 font-semibold">
                            Kategori Menu
                        </label>

                        <select
                            id="kategori"
                            name="kategori"
                            class="w-full border rounded-lg px-4 py-2">
                            <option value="Original" {{ old('kategori', $menu->kategori) == 'Original' ? 'selected' : '' }}>
                                Original
                            </option>
                            <option value="Kari" {{ old('kategori', $menu->kategori) == 'Kari' ? 'selected' : '' }}>
                                Kari
                            </option>
                            <option value="Pedas" {{ old('kategori', $menu->kategori) == 'Pedas' ? 'selected' : '' }}>
                                Pedas
                            </option>
                            <option value="Dry Ramen" {{ old('kategori', $menu->kategori) == 'Dry Ramen' ? 'selected' : '' }}>
                                Dry Ramen
                            </option>
                            <option value="Rice Bowl" {{ old('kategori', $menu->kategori) == 'Rice Bowl' ? 'selected' : '' }}>
                                Rice Bowl
                            </option>
                            <option value="Minuman" {{ old('kategori', $menu->kategori) == 'Minuman' ? 'selected' : '' }}>
                                Minuman
                            </option>
                        </select>

                        @error('kategori')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="gambar" class="block mb-2 font-semibold">
                            Gambar Menu
                        </label>

                        <input
                            id="gambar"
                            type="file"
                            name="gambar"
                            class="w-full border rounded-lg px-4 py-2">

                        @error('gambar')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    @if($menu->gambar)
                        <div>
                            <p class="block mb-2 font-semibold">
                                Gambar Saat Ini
                            </p>

                            <img
                                src="{{ asset('storage/' . $menu->gambar) }}"
                                alt="{{ $menu->nama }}"
                                class="w-40 rounded-lg shadow">
                        </div>
                    @endif

                    <div class="flex items-center gap-3 pt-2">
                        <button
                            type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                            Update Menu
                        </button>

                        <a
                            href="{{ route('admin.menu.index') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
