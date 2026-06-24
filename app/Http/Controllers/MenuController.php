<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $view = request()->routeIs('admin.menu.index')
            ? 'admin.menu.index'
            : 'menu.index';

        return view(
            $view,
            compact('menus')
        );
    }


    public function create()
    {
        return view('menu.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama' => 'required|min:3',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);


        $gambar = null;

        if($request->hasFile('gambar'))
        {
            $gambar = $request
                ->file('gambar')
                ->store(
                    'menu',
                    'public'
                );
        }


        Menu::create([

            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'kategori' => $validated['kategori'],
            'gambar' => $gambar

        ]);


        $redirectRoute = $request->routeIs('admin.menu.store')
            ? 'admin.menu.index'
            : 'menu.index';

        return redirect()
            ->route($redirectRoute)
            ->with(
                'success',
                'Menu berhasil ditambahkan 🍜'
            );
    }


    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $view = request()->routeIs('admin.menu.edit')
            ? 'admin.menu.edit'
            : 'menu.edit';

        return view(
            $view,
            compact('menu')
        );
    }


    public function update(
        Request $request,
        $id
    )
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([

            'nama'=>'required|min:3',
            'harga'=>'required|numeric',
            'deskripsi'=>'nullable',
            'kategori'=>'required',
            'gambar'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);


        if($request->hasFile('gambar'))
        {
            $validated['gambar'] = $request
                ->file('gambar')
                ->store(
                    'menu',
                    'public'
                );
        }


        $menu->update($validated);


        return redirect()
            ->route('admin.menu.index')
            ->with(
                'success',
                'Menu berhasil diupdate'
            );
    }


    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->delete();

        $redirectRoute = request()->routeIs('admin.menu.destroy')
            ? 'admin.menu.index'
            : 'menu.index';

        return redirect()
            ->route($redirectRoute)
            ->with(
                'success',
                'Menu berhasil dihapus 🗑️'
            );
    }
}
