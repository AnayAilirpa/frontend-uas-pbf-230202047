<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class obatController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/obat';

    public function index()
    {
        $response = Http::get($this->apiUrl);

        if ($response->failed()) {
            return back()->with('error', 'Gagal mengambil data dari API.');
        }

        $obat = $response->json();
        return view('obat.index', compact('obat'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        $response = Http::post($this->apiUrl, $request->all());

        if ($response->failed()) {
            return back()->with('error', 'Gagal menambahkan data ke API.');
        }

        return redirect('/obat')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/$id");

        if ($response->failed() || !$response->json()) {
            return back()->with('error', 'Data obat tidak ditemukan.');
        }

        $obat = $response->json();
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrl}/$id", $request->all());

        if ($response->failed()) {
            return back()->with('error', 'Gagal memperbarui data.');
        }

        return redirect('/obat')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/$id");

        if ($response->failed()) {
            return back()->with('error', 'Gagal menghapus data.');
        }

        return back()->with('success', 'Data obat berhasil dihapus.');
    }
}