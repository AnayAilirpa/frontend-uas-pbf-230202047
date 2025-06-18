<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pasienController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/pasien';

    public function index()
    {
        $response = Http::get($this->apiUrl);

        if ($response->failed()) {
            return back()->with('error', 'Gagal mengambil data dari API.');
        }

        $pasien = $response->json();
        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $response = Http::post($this->apiUrl, $request->all());

        if ($response->failed()) {
            return back()->with('error', 'Gagal menambahkan data ke API.');
        }

        return redirect('/pasien')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/$id");

        if ($response->failed() || !$response->json()) {
            return back()->with('error', 'Data pasien tidak ditemukan.');
        }

        $pasien = $response->json();
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrl}/$id", $request->all());

        if ($response->failed()) {
            return back()->with('error', 'Gagal memperbarui data.');
        }

        return redirect('/pasien')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/$id");

        if ($response->failed()) {
            return back()->with('error', 'Gagal menghapus data.');
        }

        return back()->with('success', 'Data pasien berhasil dihapus.');
    }
}