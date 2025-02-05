<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buku = Buku::all();
        return view('buku.index', ['buku' => $buku]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        $kategori = Kategori::all();
       

        return view('buku.create', ['kategori' => $kategori]); // Kirim variabel ke view
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_buku' => 'required',
            'kategori_id' => 'required',
        ]);
        Buku::create([
            'nama_buku' => $request->nama_buku,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect('buku')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Buku::where('id', $id)->first();
        $kategori = Kategori::all();
        return view('buku.edit', ['kategori' => $kategori])->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_buku' => 'required',
            'kategori_id' => 'required',
        ]);
        $data = ([
            'nama_buku' => $request->nama_buku,
            'kategori_id' => $request->kategori_id,
        ]);
        Buku::where('id', $id)->update($data);
        return redirect('buku')->with('success', 'Buku berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Buku::where('id', $id)->delete();
        return redirect('buku')->with('success', 'Buku berhasil dihapus!');
    }
}
