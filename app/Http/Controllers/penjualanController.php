<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class penjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = penjualan::orderBy('nama', 'desc')->paginate(5);
        return view('penjualan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjualan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required:penjualan,nama',
            'kategori' => 'required',
            'harga' => 'required',
        ],[
            'nama.required'=>'Nama produk wajib diisi',
            'kategori.required'=>'Kategori produk wajib diisi',
            'harga.required'=>'Harga produk wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
        ];
        penjualan::create($data);
        return redirect()->to('penjualan')->with('success', 'Berhasil menambahkan barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = penjualan::where('nama', $id)->first();
        return view('penjualan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori' => 'required',
            'harga' => 'required',
        ],[
            'kategori.required'=>'Kategori produk wajib diisi',
            'harga.required'=>'Harga produk wajib diisi',
        ]);
        $data = [
            'kategori' => $request->kategori,
            'harga' => $request->harga,
        ];
        penjualan::where('nama',$id)->update($data);
        return redirect()->to('penjualan')->with('success', 'Berhasil mengupdate data barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        penjualan::where('nama', $id)->delete();
        return redirect()->to('penjualan')->with('success', 'Berhasil menghapus barang');
    }
}
