<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        return view('kategori.index', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kategori_buku' => 'required',
        ]);
        Kategori::create([
            'kategori_buku' => $request->kategori_buku,
        ]);
        return redirect('kategori')->with('success', 'kategori Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Kategori::where('id', $id)->first();
        return view('kategori.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'kategori_buku' => 'required',
        ]);
        $data = ([
            'kategori_buku' => $request->kategori_buku,
        ]);
        Kategori::where('id', $id)->update($data);
        return redirect('kategori')->with('success', 'Kategori Buku berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Kategori::where('id', $id)->delete();
        return redirect('kategori')->with('success', 'Kategori Buku berhasil dihapus!');
    }
}
