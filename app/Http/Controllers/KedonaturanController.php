<?php

namespace App\Http\Controllers;

use App\Models\Kedonaturan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KedonaturanController extends Controller
{
    public function kedonaturan(): View
    {
        $donatur = Kedonaturan::all();
        return view('kedonaturan.kedonaturan', compact('donatur'));
    }

    public function detail_donatur(string $id): view
    {
        $donatur = Kedonaturan::findOrFail($id);

        return view('kedonaturan.detail_kedonaturan', compact('donatur'));
    }

    public function tambah_donatur(): View
    {
        return view('kedonaturan.tambah_kedonaturan');
    }

    public function tambahDon(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_donatur' => 'required',
            'email' => 'required|email',
            'passwordd' => 'required|min:8|max:16',
            'foto_donatur' => 'image|mimes:jpeg,jpg,png|max:2048',
        ],
        [
            'nama_donatur.required' => 'Nama donatur harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'passwordd.required' => 'Password harus diisi!',
            'passwordd.min' => 'Password harus terdiri dari 8-16 karakter',
            'passwordd.max' => 'Password harus terdiri dari 8-16 karakter',
            'foto_donatur.image' => 'Format foto salah!',
            'foto_donatur.max' => 'Ukuran foto terlalu besar'
        ]);

        $fotoDonaturPath = $request->hasFile('foto_donatur') ? $request->file('foto_donatur')->store('public/kedonaturans') : null;
        $foto_donatur = $fotoDonaturPath ? basename($fotoDonaturPath) : null;

        $getDntr = Kedonaturan::where('email', '=', $request->email)->first();
        if($getDntr){
            return back()->with('fail', 'Email sudah terdaftar!');
        }else{
            Kedonaturan::create([
                'nama_donatur' => $request->nama_donatur,
                'nomor_handphone' => $request->nomor_handphone,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'password' => Hash::make($request->passwordd),
                'foto_donatur' => $foto_donatur
            ]);
            return redirect()->route('kedonaturan')->with(['message' => 'Donatur berhasil ditambahkan']);
        }
    }

    public function edit_donatur(string $id): View
    {
        $donatur = Kedonaturan::findOrFail($id);
        return view('kedonaturan.edit_kedonaturan', compact('donatur'));
    }

    public function update_donatur(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_donatur' => 'required',
            'email' => 'required|email',
            'foto_donatur' => 'image|mimes:jpeg,jpg,png|max:2048'
        ],
        [
            'nama_donatur.required' => 'Nama donatur harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'foto_donatur.image' => 'Format foto salah!',
            'foto_donatur.max' => 'Ukuran foto terlalu besar'
        ]);

        $donatur = Kedonaturan::findOrFail($id);

        if(Kedonaturan::where('email', '=', $request->email)->where('id', '!=', $request->id)->first()){
            return back()->with('fail', 'Email sudah terdaftar!');
        } else if(Kedonaturan::where('email', '=', $request->email)->where('id', '=', $request->id)->first() || Kedonaturan::where('email', '!=', $request->email)->where('id', '=', $request->id)->first()){
            if ($request->hasFile('foto_donatur')) {
                $foto_donatur = $request->file('foto_donatur');
                $foto_donatur->storeAs('public/kedonaturans', $foto_donatur->hashName());
    
                Storage::delete('public/kedonaturans/' . $donatur->foto_donatur);
    
                if(strlen($request->passwordd) < 8 || strlen($request->passwordd) > 16){
                    if(empty($request->passwordd)){
                        $donatur->update([
                            'nama_donatur' => $request->nama_donatur,
                            'nomor_handphone' => $request->nomor_handphone,
                            'alamat' => $request->alamat,
                            'jenis_kelamin' => $request->jenis_kelamin,
                            'email' => $request->email,
                            'foto_donatur' => $foto_donatur->hashName()
                        ]);
                        return redirect()->route('kedonaturan')->with(['message' => 'Data donatur berhasil diedit']);
                    } else {
                        return back()->with('fail', 'Password harus terdiri dari 8-16 karakter');
                    }
                } else {
                    $donatur->update([
                        'nama_donatur' => $request->nama_donatur,
                        'nomor_handphone' => $request->nomor_handphone,
                        'alamat' => $request->alamat,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'email' => $request->email,
                        'password' => Hash::make($request->passwordd),
                        'foto_donatur' => $foto_donatur->hashName()
                    ]);
                    return redirect()->route('kedonaturan')->with(['message' => 'Data donatur berhasil diedit']);
                }
            } else {
                if(strlen($request->passwordd) < 8 || strlen($request->passwordd) > 16){
                    if(empty($request->passwordd)){
                        $donatur->update([
                            'nama_donatur' => $request->nama_donatur,
                            'nomor_handphone' => $request->nomor_handphone,
                            'alamat' => $request->alamat,
                            'jenis_kelamin' => $request->jenis_kelamin,
                            'email' => $request->email
                        ]);
                        return redirect()->route('kedonaturan')->with(['message' => 'Data donatur berhasil diedit']);
                    } else {
                        return back()->with('fail', 'Password harus terdiri dari 8-16 karakter');
                    }
                } else {
                    $donatur->update([
                        'nama_donatur' => $request->nama_donatur,
                        'nomor_handphone' => $request->nomor_handphone,
                        'alamat' => $request->alamat,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'email' => $request->email,
                        'password' => Hash::make($request->passwordd)
                    ]);
                    return redirect()->route('kedonaturan')->with(['message' => 'Data donatur berhasil diedit']);
                }
            }
        } 
    }

    public function hapus_donatur($id): RedirectResponse
    {
        $donatur = kedonaturan::findOrFail($id);

        Storage::delete('public/kedonaturans/' . $donatur->foto_donatur);

        $donatur->delete();
        return redirect()->route('kedonaturan')->with(['message' => 'Donatur berhasil dihapus']);
    }
}
