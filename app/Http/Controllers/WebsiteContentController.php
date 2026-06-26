<?php

namespace App\Http\Controllers;

use App\Models\WebsiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteContentController extends Controller
{
    public function index()
    {
        $contents = WebsiteContent::all();

        return view(
            'admin.content',
            compact('contents')
        );
    }


    public function edit($id)
    {
        $content = WebsiteContent::findOrFail($id);

        return view(
            'admin.content.edit',
            compact('content')
        );
    }


    public function update(
        Request $request,
        $id
    )
    {
        $content =
            WebsiteContent::findOrFail($id);

        $validated = $request->validate([
            'halaman' => ['nullable', 'in:promo,event,about,contact'],
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'poster' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data = [

            'halaman' => $validated['halaman'] ?? $content->halaman,
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'is_active' => $request->boolean('is_active', true)

        ];

        if ($request->hasFile('poster')) {
            if ($content->poster_path) {
                Storage::disk('public')->delete($content->poster_path);
            }

            $data['poster_path'] = $request
                ->file('poster')
                ->store('promo-event', 'public');
        }

        $content->update($data);

        return redirect()
            ->route('content.index')
            ->with(
                'success',
                'Konten berhasil disimpan ✅'
            );
    }


    public function store(Request $request)
    {
        $posterPath = null;

        if ($request->hasFile('poster')) {
            $posterPath = $request
                ->file('poster')
                ->store('promo-event', 'public');
        }

        WebsiteContent::create([

            'halaman' => $request->halaman,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'poster_path' => $posterPath,
            'is_active' => true

        ]);

        return redirect()
            ->route('content.index')
            ->with(
                'success',
                'Konten berhasil ditambahkan ✅'
            );
    }


    public function delete($id)
    {
        $content =
            WebsiteContent::findOrFail($id);

        if ($content->poster_path) {
            Storage::disk('public')->delete($content->poster_path);
        }

        $content->delete();

        return redirect()
            ->route('content.index')
            ->with(
                'success',
                'Konten berhasil dihapus 🗑️'
            );
    }
}
