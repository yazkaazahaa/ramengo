<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // 15 MENU MAKANAN (RAMEN & SIDE DISH)
        // ==========================================
        
        Menu::create([
            'nama' => 'Tori Paitan Ramen',
            'harga' => 38000,
            'deskripsi' => 'Ramen dengan kuah kaldu ayam kental gurih, ayam chashu, dan telur ajitama.',
            'gambar' => 'tori_paitan.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Shoyu Ramen',
            'harga' => 35000,
            'deskripsi' => 'Ramen klasik khas Tokyo dengan kuah kecap asin Jepang yang ringan.',
            'gambar' => 'shoyu.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Miso Ramen',
            'harga' => 37000,
            'deskripsi' => 'Ramen kuah tauco Jepang (miso) yang pekat, gurih, dan sedikit manis.',
            'gambar' => 'miso.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Spicy Jigoku Ramen',
            'harga' => 40000,
            'deskripsi' => 'Ramen kuah pedas berlevel dengan bumbu cabai spesial khas RamenGo.',
            'gambar' => 'jigoku.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Karari Ramen',
            'harga' => 39000,
            'deskripsi' => 'Ramen kari Jepang yang kaya akan rempah-rempah beraroma kuat.',
            'gambar' => 'karari.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Tantanmen Ramen',
            'harga' => 42000,
            'deskripsi' => 'Ramen kuah wijen pedas gurih dengan topping daging ayam cincang.',
            'gambar' => 'tantanmen.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Dry Tsukemen',
            'harga' => 36000,
            'deskripsi' => 'Ramen kering tanpa kuah, disajikan dengan saus celup pekat terpisah.',
            'gambar' => 'tsukemen.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Abura Soba',
            'harga' => 35000,
            'deskripsi' => 'Soba kering yang diaduk dengan minyak aromatik, kecap asin, dan rebung.',
            'gambar' => 'aburasoba.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Gyoza Panggang (5 pcs)',
            'harga' => 20000,
            'deskripsi' => 'Pangsit Jepang isi daging ayam dan sayuran, dimasak pan-seared.',
            'gambar' => 'gyoza.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Chicken Karaage (4 pcs)',
            'harga' => 22000,
            'deskripsi' => 'Ayam goreng tepung khas Jepang yang renyah di luar dan juicy di dalam.',
            'gambar' => 'karaage.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Ebi Furai (3 pcs)',
            'harga' => 25000,
            'deskripsi' => 'Udang goreng tepung roti bertekstur sangat renyah.',
            'gambar' => 'ebifurai.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Chicken Katsu',
            'harga' => 24000,
            'deskripsi' => 'Fillet dada ayam goreng tepung roti, disajikan dengan saus katsu.',
            'gambar' => 'katsu.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Takoyaki (6 pcs)',
            'harga' => 18000,
            'deskripsi' => 'Bola-bola camilan khas Osaka dengan isian gurita segar di dalamnya.',
            'gambar' => 'takoyaki.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Chahan (Nasi Goreng Jepang)',
            'harga' => 23000,
            'deskripsi' => 'Nasi goreng oriental khas Jepang dengan potongan daging ayam dan telur.',
            'gambar' => 'chahan.jpg',
            'kategori' => 'Makanan',
        ]);

        Menu::create([
            'nama' => 'Beef Yakiniku Don',
            'harga' => 32000,
            'deskripsi' => 'Mangkuk nasi dengan irisan daging sapi tipis saus yakiniku manis gurih.',
            'gambar' => 'yakinikudon.jpg',
            'kategori' => 'Makanan',
        ]);


        // ==========================================
        // 5 MENU MINUMAN
        // ==========================================
        
        Menu::create([
            'nama' => 'Ocha Cold (Free Refill)',
            'harga' => 8000,
            'deskripsi' => 'Teh hijau Jepang dingin otentik, bisa isi ulang sepuasnya.',
            'gambar' => 'ocha_cold.jpg',
            'kategori' => 'Minuman',
        ]);

        Menu::create([
            'nama' => 'Ocha Hot (Free Refill)',
            'harga' => 8000,
            'deskripsi' => 'Teh hijau Jepang hangat otentik, pas untuk pendamping kuah ramen.',
            'gambar' => 'ocha_hot.jpg',
            'kategori' => 'Minuman',
        ]);

        Menu::create([
            'nama' => 'Ice Lemon Tea',
            'harga' => 12000,
            'deskripsi' => 'Teh manis segar berpadu dengan perasan jeruk lemon asli.',
            'gambar' => 'lemon_tea.jpg',
            'kategori' => 'Minuman',
        ]);

        Menu::create([
            'nama' => 'Matcha Latte',
            'harga' => 18000,
            'deskripsi' => 'Minuman susu creamy dengan bubuk matcha premium khas Jepang.',
            'gambar' => 'matcha_latte.jpg',
            'kategori' => 'Minuman',
        ]);

        Menu::create([
            'nama' => 'Mizu (Air Mineral)',
            'harga' => 5000,
            'deskripsi' => 'Air minum mineral kemasan botol dingin.',
            'gambar' => 'mizu.jpg',
            'kategori' => 'Minuman',
        ]);


        // ==========================================
        // 5 MENU TOPPING KHAS RAMEN
        // ==========================================
        
        Menu::create([
            'nama' => 'Ajitama Egg (1 pcs)',
            'harga' => 6000,
            'deskripsi' => 'Telur rebus setengah matang khas Jepang yang dimarinasi bumbu kecap manis gurih.',
            'gambar' => 'ajitama_egg.jpg',
            'kategori' => 'Topping',
        ]);

        Menu::create([
            'nama' => 'Extra Chicken Chashu (3 pcs)',
            'harga' => 12000,
            'deskripsi' => 'Tambahan irisan daging ayam gulung gurih yang dimasak perlahan.',
            'gambar' => 'chicken_chashu.jpg',
            'kategori' => 'Topping',
        ]);

        Menu::create([
            'nama' => 'Nori Seaweed (4 sheets)',
            'harga' => 4000,
            'deskripsi' => 'Lembaran rumput laut kering renyah penambah aroma gurih alami.',
            'gambar' => 'nori.jpg',
            'kategori' => 'Topping',
        ]);

        Menu::create([
            'nama' => 'Menma (Seasoned Bamboo Shoots)',
            'harga' => 5000,
            'deskripsi' => 'Rebung Jepang fermentasi bertekstur renyah dengan rasa gurih yang khas.',
            'gambar' => 'menma.jpg',
            'kategori' => 'Topping',
        ]);

        Menu::create([
            'nama' => 'Narutomaki (Fish Cake - 4 pcs)',
            'harga' => 5000,
            'deskripsi' => 'Olahan kue ikan khas Jepang berbentuk bundar dengan corak pusaran merah muda ikonik.',
            'gambar' => 'narutomaki.jpg',
            'kategori' => 'Topping',
        ]);
    }
}
