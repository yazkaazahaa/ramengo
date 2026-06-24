<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Meja;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.home');
    }

    public function menu(Request $request)
    {
        $activeKategori = $request->query('kategori', 'semua');
        $allowedKategori = ['semua', 'makanan', 'minuman', 'topping'];

        if (! in_array($activeKategori, $allowedKategori, true)) {
            $activeKategori = 'semua';
        }

        $menusQuery = Menu::query()->latest();

        if ($activeKategori === 'makanan') {
            $menusQuery->whereNotIn('kategori', ['Minuman', 'Topping']);
        }

        if ($activeKategori === 'minuman') {
            $menusQuery->where('kategori', 'Minuman');
        }

        if ($activeKategori === 'topping') {
            $menusQuery->where('kategori', 'Topping');
        }

        $menus = $menusQuery->get();
        $allMenus = Menu::all();

        // Semua selain minuman dianggap makanan
        $makanan = $allMenus->whereNotIn('kategori', ['Minuman', 'Topping']);

        // Minuman
        $minuman = $allMenus->where('kategori', 'Minuman');
        $topping = $allMenus->where('kategori', 'Topping');

        $kategoriTabs = [
            'semua' => [
                'label' => 'Semua',
                'count' => $allMenus->count(),
            ],
            'makanan' => [
                'label' => 'Makanan',
                'count' => $makanan->count(),
            ],
            'minuman' => [
                'label' => 'Minuman',
                'count' => $minuman->count(),
            ],
            'topping' => [
                'label' => 'Topping',
                'count' => $topping->count(),
            ],
        ];

        return view(
            'customer.menu',
            compact(
                'menus',
                'makanan',
                'minuman',
                'topping',
                'activeKategori',
                'kategoriTabs'
            )
        );
    }

    public function scanMeja($id)
    {
        $meja = Meja::findOrFail($id);

        session([
            'id_meja' => $meja->id,
            'nomor_meja' => $meja->nomor_meja,
        ]);

        return redirect()
            ->route('customer.menu')
            ->with('success', 'Anda sedang memesan dari '.$meja->nomor_meja);
    }

    public function about()
    {
        $content = WebsiteContent::where(
            'halaman',
            'about'
        )->first();

        return view(
            'customer.about',
            compact('content')
        );
    }

    public function berita()
    {
        $contents = WebsiteContent::query()
            ->whereIn('halaman', ['event', 'promo'])
            ->where('is_active', true)
            ->latest()
            ->get();

        return view(
            'customer.promo',
            compact('contents')
        );
    }

    public function contact()
    {
        $content = WebsiteContent::where(
            'halaman',
            'contact'
        )->first();

        return view(
            'customer.contact',
            compact('content')
        );
    }
}
