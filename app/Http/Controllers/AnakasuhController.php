<?php

namespace App\Http\Controllers;

use App\Models\Anakasuh;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnakasuhController extends Controller
{
    public function anakasuh(): View
    {
        // $ank = Anakasuh::all();
        // return view('asuhan.anakasuh', compact('ank'));

        return view('asuhan.anakasuh');
    }

    public function tambah_anakasuh(): View
    {
        return view('asuhan.tambah_anakasuh');
    }

    public function tambahAnk(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nik' => 'required'
        ],
        [
            'nik.required' => 'NIK harus diisi!'
        ]);

        $imgAktaPath = $request->hasFile('img_akta') ? $request->file('img_akta')->store('public/anakasuhs/Akta') : null;
        $imgKKPath = $request->hasFile('img_kk') ? $request->file('img_kk')->store('public/anakasuhs/KK') : null;
        $imgSKKOPath = $request->hasFile('img_skko') ? $request->file('img_skko')->store('public/anakasuhs/SKKO') : null;
        $imgAnakPath = $request->hasFile('img_anak') ? $request->file('img_anak')->store('public/anakasuhs/Foto') : null;

        $imgAkta = $imgAktaPath ? basename($imgAktaPath) : null;
        $imgKK = $imgKKPath ? basename($imgKKPath) : null;
        $imgSKKO = $imgSKKOPath ? basename($imgSKKOPath) : null;
        $imgAnak = $imgAnakPath ? basename($imgAnakPath) : null;

        Anakasuh::create([
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'asrama' => $request->input('asrama'),
            'no_akta' => $request->input('no_akta'),
            'img_akta' => $imgAkta,
            'no_kk' => $request->input('no_kk'),
            'img_kk' => $imgKK,
            'no_skko' => $request->input('no_skko'),
            'img_skko' => $imgSKKO,
            'nama_sekolah' => $request->input('nama_sekolah'),
            'tingkat' => $request->input('tingkat'),
            'kelas' => $request->input('kelas'),
            'cabang' => $request->input('cabang'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nik_ayah' => $request->input('nik_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'nik_ibu' => $request->input('nik_ibu'),
            'nama_wali' => $request->input('nama_wali'),
            'nik_wali' => $request->input('nik_wali'),
            'img_anak' => $imgAnak
        ]);
        
        return redirect()->route('anakasuh')->with('message', 'Anak Asuh berhasil ditambahkan');
    }


    public function detail_anakasuh(string $id): View
    {
        $ank = Anakasuh::findOrFail($id);
        return view('detail_anakasuh', compact('ank'));
    }

    public function edit_anakasuh(string $id): view
    {
        $ank = Anakasuh::findOrFail($id);
        return view('asuhan.edit_anakasuh', compact('ank'));
    }

    public function update_anakasuh(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nik' => 'required'
        ],
        [
            'nik.required' => 'NIK harus diisi!'
        ]);

        $ank = Anakasuh::findOrFail($id);

        if ($request->hasFile('img_akta')) {
            $imgAktaPath = $request->file('img_akta')->store('public/anakasuhs/Akta');
            if ($ank->img_akta && Storage::exists('public/anakasuhs/Akta/' . $ank->img_akta)) {
                Storage::delete('public/anakasuhs/Akta/' . $ank->img_akta);
            }
            $ank->img_akta = basename($imgAktaPath);
        }

        if ($request->hasFile('img_kk')) {
            $imgKKPath = $request->file('img_kk')->store('public/anakasuhs/KK');
            if ($ank->img_kk && Storage::exists('public/anakasuhs/KK/' . $ank->img_kk)) {
                Storage::delete('public/anakasuhs/KK/' . $ank->img_kk);
            }
            $ank->img_kk = basename($imgKKPath);
        }

        if ($request->hasFile('img_skko')) {
            $imgSKKOPath = $request->file('img_skko')->store('public/anakasuhs/SKKO');
            if ($ank->img_skko && Storage::exists('public/anakasuhs/SKKO/' . $ank->img_skko)) {
                Storage::delete('public/anakasuhs/SKKO/' . $ank->img_skko);
            }
            $ank->img_skko = basename($imgSKKOPath);
        }

        if ($request->hasFile('img_anak')) {
            $imgAnakPath = $request->file('img_anak')->store('public/anakasuhs/Foto');
            if ($ank->img_anak && Storage::exists('public/anakasuhs/Foto/' . $ank->img_anak)) {
                Storage::delete('public/anakasuhs/Foto/' . $ank->img_anak);
            }
            $ank->img_anak = basename($imgAnakPath);
        }

        $ank->update([
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'asrama' => $request->input('asrama'),
            'no_akta' => $request->input('no_akta'),
            'img_akta' => $ank->img_akta,
            'no_kk' => $request->input('no_kk'),
            'img_kk' => $ank->img_kk,
            'no_skko' => $request->input('no_skko'),
            'img_skko' => $ank->img_skko,
            'nama_sekolah' => $request->input('nama_sekolah'),
            'tingkat' => $request->input('tingkat'),
            'kelas' => $request->input('kelas'),
            'cabang' => $request->input('cabang'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nik_ayah' => $request->input('nik_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'nik_ibu' => $request->input('nik_ibu'),
            'nama_wali' => $request->input('nama_wali'),
            'nik_wali' => $request->input('nik_wali'),
            'img_anak' => $ank->img_anak
        ]);

        return redirect()->route('anakasuh')->with('message', 'Anak asuh berhasil diedit');
    }

    public function hapus_anakasuh($id): RedirectResponse
    {
        $ank = Anakasuh::findOrFail($id);

        Storage::delete('public/anakasuhs/Akta/' . $ank->img_akta);
        Storage::delete('public/anakasuhs/KK/' . $ank->img_kk);
        Storage::delete('public/anakasuhs/SKKO/' . $ank->img_skko);
        Storage::delete('public/anakasuhs/Foto/' . $ank->img_anak);

        $ank->delete();

        return redirect()->route('anakasuh')->with(['message' => 'Anak asuh berhasil dihapus']);
    }
}
