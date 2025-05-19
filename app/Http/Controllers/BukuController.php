<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Article;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', ['buku' => $buku]);
    }

    public function create(): \Illuminate\View\View
    {
        $kategori = Kategori::all();
        return view('buku.create', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required',
            'kategori_id' => 'required',
            'file_pdf' => 'required|mimes:pdf|max:5120',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file PDF
        $filenamePdf = null;
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $filenamePdf = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pdf'), $filenamePdf);
        }

        // Simpan gambar sampul
        $filenameSampul = null;
        if ($request->hasFile('sampul')) {
            $sampul = $request->file('sampul');
            $filenameSampul = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('uploads/sampul'), $filenameSampul);
        }

        Buku::create([
            'nama_buku' => $request->nama_buku,
            'kategori_id' => $request->kategori_id,
            'file_pdf' => $filenamePdf,
            'sampul' => $filenameSampul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Buku $buku)
    {
        //
    }

    public function edit($id)
    {
        $data = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_buku' => 'required',
            'kategori_id' => 'required',
            'file_pdf' => 'nullable|mimes:pdf|max:5120',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $buku = Buku::findOrFail($id);

        // PDF
        $fileNamePdf = $buku->file_pdf;
        if ($request->hasFile('file_pdf')) {
            if ($buku->file_pdf && file_exists(public_path('uploads/pdf/' . $buku->file_pdf))) {
                unlink(public_path('uploads/pdf/' . $buku->file_pdf));
            }

            $file = $request->file('file_pdf');
            $fileNamePdf = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pdf'), $fileNamePdf);
        }

        // Sampul
        $fileNameSampul = $buku->sampul;
        if ($request->hasFile('sampul')) {
            if ($buku->sampul && file_exists(public_path('uploads/sampul/' . $buku->sampul))) {
                unlink(public_path('uploads/sampul/' . $buku->sampul));
            }

            $sampul = $request->file('sampul');
            $fileNameSampul = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('uploads/sampul'), $fileNameSampul);
        }

        $buku->update([
            'nama_buku' => $request->nama_buku,
            'kategori_id' => $request->kategori_id,
            'file_pdf' => $fileNamePdf,
            'sampul' => $fileNameSampul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('buku')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        // Hapus PDF
        if ($buku->file_pdf && file_exists(public_path('uploads/pdf/' . $buku->file_pdf))) {
            unlink(public_path('uploads/pdf/' . $buku->file_pdf));
        }

        // Hapus gambar sampul
        if ($buku->sampul && file_exists(public_path('uploads/sampul/' . $buku->sampul))) {
            unlink(public_path('uploads/sampul/' . $buku->sampul));
        }

        $buku->delete();
        return redirect('buku')->with('success', 'Buku berhasil dihapus');
    }

    public function daftarBuku()
    {
        $buku = Buku::all();
        $articles = Article::latest()->take(3)->get();
        return view('index.index', compact('buku', 'articles'));
    }

    public function fetchBuku()
    {
        $buku = Buku::all();
        return view('buku.list', compact('buku'));
    }
}

