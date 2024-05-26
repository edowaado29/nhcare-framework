<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AcaraController extends Controller
{
    public function acara(): View
    {
        $acra = Acara::latest()->paginate(5);
        return view('layanan.acara', compact('acra'));
    }

    public function detail_acara(string $id): view
    {
        $acra = Acara::findOrFail($id);

        return view('detail_acara', compact('acra'));
    }

    public function tambah_acara(): View
    {
        return view('layanan.tambah_acara');
    }

    public function tambah(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'namaAcara' => 'required',
            'deskripsiAcara' => 'required',
            'tanggalAcara' => 'required',
            'gambarAcara' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ], 
        [
            'namaAcara.required' => 'Nama acara tidak boleh kosong!',
            'deskripsiAcara.required' => 'Deskripsi acara tidak boleh kosong!',
            'tanggalAcara.required' => 'Tanggal acara tidak boleh kosong!',
            'gambarAcara.required' => 'Gambar acara tidak boleh kosong!'
        ]);

        $gambarAcara = $request->file('gambarAcara');
        $gambarAcara->storeAs('public/acaras', $gambarAcara->hashName());

        Acara::create([
            'namaAcara' => $request->namaAcara,
            'deskripsiAcara' => $request->deskripsiAcara,
            'tanggalAcara' => $request->tanggalAcara,
            'gambarAcara' => $gambarAcara->hashName()
        ]);
        return redirect()->route('acara')->with(['message' => 'Acara berhasil ditambahkan']);
    }

    public function edit_acara(string $id): View
    {
        $acra = Acara::findOrFail($id);

        return view('layanan.edit_acara', compact('acra'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'namaAcara' => 'required',
            'deskripsiAcara' => 'required',
            'tanggalAcara' => 'required',
            'gambarAcara' => 'image|mimes:jpeg,jpg,png|max:2048'
        ],
        [
            'namaAcara.required' => 'Nama Acara tidak boleh kosong!',
            'deskripsiAcara.required' => 'Deskripsi Acara tidak boleh kosong!',
            'tanggalAcara.required' => 'Tanggal Acara tidak boleh kosong!',
            'gambarAcara.required' => 'Gambar Acara tidak boleh kosong!'
        ]);

        $acra = acara::findOrFail($id);

        if ($request->hasFile('gambarAcara')) {
            $gambarAcara = $request->file('gambarAcara');
            $gambarAcara->storeAs('public/acaras', $gambarAcara->hashName());

            Storage::delete('public/acaras/' . $acra->gambarAcara);

            $acra->update([
                'namaAcara' => $request->namaAcara,
                'deskripsiAcara' => $request->deskripsiAcara,
                'tanggalAcara' => $request->tanggalAcara,
                'gambarAcara' => $gambarAcara->hashName()
            ]);
        } else {
            $acra->update([
                'namaAcara' => $request->namaAcara,
                'deskripsiAcara' => $request->deskripsiAcara,
                'tanggalAcara' => $request->tanggalAcara
            ]);
        }
        return redirect()->route('acara')->with((['message' => 'Acara berhasil diedit']));
    }

    public function hapus_acara($id): RedirectResponse
    {
        $acra = acara::findOrFail($id);

        Storage::delete('public/acaras/' . $acra->gambarAcara);

        $acra->delete();
        return redirect()->route('acara')->with(['message' => 'Acara berhasil dihapus']);
    }
}
