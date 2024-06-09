<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class DonasiController extends Controller
{
    public function donasi(): View {
        $dnsi =  Donasi::all();

        return view('donasi.donasi', compact('dnsi'));
    }

    public function detail_donasi(string $id): view{
        $dnsi = Donasi::findOrFail($id);
        return View('donasi.detail_donasi', compact('dnsi'));
    }
}
