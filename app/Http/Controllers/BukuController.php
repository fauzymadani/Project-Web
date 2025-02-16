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
    $request->validate([
        'nama_buku' => 'required',
        'kategori_id' => 'required',
        'file_pdf' => 'required|mimes:pdf|max:2048', // Validasi PDF
    ]);

    // Simpan file PDF
    if ($request->hasFile('file_pdf')) {
        $file = $request->file('file_pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/pdf'), $filename);
    } else {
        $filename = null;
    }

    Buku::create([
    'nama_buku' => $request->nama_buku,
    'kategori_id' => $request->kategori_id,
    'file_pdf' => $filename,
    'deskripsi' => $request->deskripsi,
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
    $data = Buku::findOrFail($id);
    $kategori = Kategori::all();
    return view('buku.edit', compact('data', 'kategori'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_buku' => 'required',
        'kategori_id' => 'required',
        'file_pdf' => 'nullable|mimes:pdf|max:2048'
    ]);

    $buku = Buku::findOrFail($id);
    $fileName = $buku->file_pdf;

    if ($request->hasFile('file_pdf')) {
        // Hapus file lama jika ada
        if ($buku->file_pdf && file_exists(public_path('uploads/pdf/' . $buku->file_pdf))) {
            unlink(public_path('uploads/pdf/' . $buku->file_pdf));
        }

        // Simpan file baru
        $file = $request->file('file_pdf');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/pdf'), $fileName);
    }

    $buku->update([
    'nama_buku' => $request->nama_buku,
    'kategori_id' => $request->kategori_id,
    'file_pdf' => $fileName,
    'deskripsi' => $request->deskripsi,
]);


    return redirect('buku')->with('success', 'Buku berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $buku = Buku::findOrFail($id);

    // Hapus file PDF jika ada
    if ($buku->file_pdf && file_exists(public_path('uploads/pdf/' . $buku->file_pdf))) {
        unlink(public_path('uploads/pdf/' . $buku->file_pdf));
    }

    $buku->delete();
    return redirect('buku')->with('success', 'Buku berhasil dihapus');
}

public function daftarBuku()
{
    $buku = Buku::all();
    return view('index.index', compact('buku'));
}

}
