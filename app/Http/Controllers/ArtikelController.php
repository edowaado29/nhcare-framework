<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;
use Symfony\Contracts\Service\Attribute\Required;

class ArtikelController extends Controller
{
    public function artikel(): View
    {
        $artikels = Artikel::paginate(5);
        return view('layanan.artikel', compact('artikels'));
    }

    public function detail_artikel(string $id): View
    {
        $artikels = Artikel::findOrFail($id);
        return View('detail_artikel', compact('artikels'));
    }

    public function tambah_artikel(): View
    {
        return View('layanan.tambah_artikel');
    }

    public function tambah_artkl(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'judul_artikel' => 'required',
            'deskripsi_artikel' => 'required',
            'gambar_artikel' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ], 
        [
            'judul_artikel.required' => 'Nama program tidak boleh kosong!',
            'deskripsi_artikel.required' => 'Deskripsi program tidak boleh kosong!',
            'gambar_artikel.required' => 'Gambar program tidak boleh kosong!'
        ]);

        $gambarArtikel = $request->file('gambar_artikel');
        $gambarArtikel->storeAs('public/Artikels', $gambarArtikel->hashName());

        Artikel::create([
            'judul_artikel' => $request->judul_artikel,
            'deskripsi_artikel' => $request->deskripsi_artikel,
            'gambar_artikel' => $gambarArtikel->hashName(),
        ]); 
        return redirect()->route('program')->with(['message' => 'Program berhasil ditambahkan']);
    }

    public function edit_artikel(string $id): View
    {
        $artikels = Artikel::findOrFail($id);
        return view('layanan.edit_artikel', compact('artikels'));
    }

    public function update_artikel(Request $request, $id): RedirectResponse
    {
        $this->validate(
            $request,
            [
                'judul_artikel' => 'required',
                'deskripsi_artikel' => 'required',
                'gambar_artikel' => 'image|mimes:jpeg,jpg,png|max:2048'
            ],
            [
                'judul_artikel.required' => 'Judul artikel tidak boleh kosong!',
                'deskripsi_artikel.required' => 'Deskripsi artikel tidak boleh kosong!',
                'gambar_artikel.required' => 'Gambar artikel tidak boleh kosong!'
            ]
        );

        $artikels = Artikel::findOrFail($id);

        if ($request->hasFile('gambar_artikel')) {
            $gambarArtikel = $request->file('gambar_artikel');
            $gambarArtikel->storeAs('public/artikels', $gambarArtikel->hashName());

            Storage::delete('public/artikels/' . $artikels->gambarArtikel);

            $artikels->update([
                'judul_artikel' => $request->judul_artikel,
                'deskripsi_artikel' => $request->deskripsi_artikel,
                'gambar_artikel' => $gambarArtikel->hashName()
            ]);
        } else {
            $artikels->update([
                'judul_artikel' => $request->judul_artikel,
                'deskripsi_artikel' => $request->deskripsi_artikel
            ]);
        }
        return redirect()->route('artikel')->with((['message' => 'Artikel Berhasil Diupdate']));
    }
    public function hapus_artikel($id): RedirectResponse
    {
        $artikels = Artikel::findOrFail($id);

        storage::delete('public/artikels/' . $artikels->gambarArtikel);

        $artikels->delete();
        return redirect()->route('artikel')->with(['message' => 'Artikel berhasil dihapus']);
    }
}
