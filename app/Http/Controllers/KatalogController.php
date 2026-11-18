<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $kategori = $request->input('kategori');

        $query = Produk::where('is_active', true);

        if (!empty($q)) {
            $query->where('nama', 'like', '%' . $q . '%');
        }

        if (!empty($kategori)) {
            $query->where('kategori', $kategori);
        }

        $produk = $query->get()->toArray();

        return view('katalog.index', compact('produk', 'q'));
    }
}
