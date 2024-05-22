<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function program(): View
    {
        $prog = Program::latest()->paginate(5);
        return view('layanan.program', compact('prog'));
    }

    public function detail_program(string $id): view
    {
        $prog = Program::findOrFail($id);

        return view('detail_program', compact('prog'));
    }

    public function tambah_program(): View
    {
        return view('layanan.tambah_program');
    }

    public function tambah(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'namaProgram' => 'required',
            'deskripsiProgram' => 'required',
            'gambarProgram' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ], 
        [
            'namaProgram.required' => 'Nama program tidak boleh kosong!',
            'deskripsiProgram.required' => 'Deskripsi program tidak boleh kosong!',
            'gambarProgram.required' => 'Gambar program tidak boleh kosong!'
        ]);

        $gambarProgram = $request->file('gambarProgram');
        $gambarProgram->storeAs('public/programs', $gambarProgram->hashName());

        Program::create([
            'namaProgram' => $request->namaProgram,
            'deskripsiProgram' => $request->deskripsiProgram,
            'gambarProgram' => $gambarProgram->hashName()
        ]);
        return redirect()->route('program')->with(['message' => 'Program berhasil ditambahkan']);
    }

    public function edit_program(string $id): View
    {
        $prog = Program::findOrFail($id);

        return view('layanan.edit_program', compact('prog'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'namaProgram' => 'required',
            'deskripsiProgram' => 'required',
            'gambarProgram' => 'image|mimes:jpeg,jpg,png|max:2048'
        ],
        [
            'namaProgram.required' => 'Nama program tidak boleh kosong!',
            'deskripsiProgram.required' => 'Deskripsi program tidak boleh kosong!',
            'gambarProgram.required' => 'Gambar program tidak boleh kosong!'
        ]);

        $prog = program::findOrFail($id);

        if ($request->hasFile('gambarProgram')) {
            $gambarProgram = $request->file('gambarProgram');
            $gambarProgram->storeAs('public/programs', $gambarProgram->hashName());

            Storage::delete('public/programs/' . $prog->gambarProgram);

            $prog->update([
                'namaProgram' => $request->namaProgram,
                'deskripsiProgram' => $request->deskripsiProgram,
                'gambarProgram' => $gambarProgram->hashName()
            ]);
        } else {
            $prog->update([
                'namaProgram' => $request->namaProgram,
                'deskripsiProgram' => $request->deskripsiProgram
            ]);
        }
        return redirect()->route('program')->with((['message' => 'Program berhasil diedit']));
    }

    public function hapus_program($id): RedirectResponse
    {
        $prog = program::findOrFail($id);

        Storage::delete('public/programs/' . $prog->gambarProgram);

        $prog->delete();
        return redirect()->route('program')->with(['message' => 'Program berhasil dihapus']);
    }
}
