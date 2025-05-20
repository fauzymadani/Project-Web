<?php

namespace App\Http\Controllers;


use App\Models\Peminjaman;
use App\Models\Buku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', ['peminjaman' => $peminjaman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $buku = Buku::all();


        return view('peminjaman.create', ['buku' => $buku]); // Kirim variabel ke view
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_dikembalikan' => 'required',
            'buku_id' => 'required',
        ], [
            'nisn.required' => 'NISN Wajib Diisi!',
            'nama_peminjam.required' => 'Nama Peminjam Wajib Diisi!',
            'tanggal_pinjam.required' => 'Tanggal_Pinjam Wajib Diisi!',
            'tanggal_dikembalikan.required' => 'Tanggal_Dikembalikan Wajib Diisi!',
            'buku_id' => 'wajib diisi ini!',
        ]);


        $data = [
            'nisn' => $request->nisn,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
            'buku_id' => $request->buku_id,
        ];

        Peminjaman::create($data);

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman Berhasil Ditambahkan!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjaman.show', ['peminjaman' => $peminjaman]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Peminjaman::where('nisn', $id)->first();
        $buku = Buku::all();

        return view(
            'peminjaman.edit',
            [
                'buku' => $buku,
                'data' => $data
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nisn' => 'required',
        'nama_peminjam' => 'required',
        'tanggal_pinjam' => 'required',
        'tanggal_dikembalikan' => 'required',
        'buku_id' => 'required',
    ], [
        'nisn.required' => 'NISN Wajib Diisi!',
        'nama_peminjam.required' => 'Nama Peminjam Wajib Diisi!',
        'tanggal_pinjam.required' => 'Tanggal Pinjam Wajib Diisi!',
        'tanggal_dikembalikan.required' => 'Tanggal Dikembalikan Wajib Diisi!',
        'buku_id' => 'ini juga wajib diisi ya atminn!',
    ]);

    // Ambil data yang akan diupdate
    $data = Peminjaman::where('nisn', $id)->first();

    // Update data
    $data->update([
        'nisn' => $request->nisn,
        'nama_peminjam' => $request->nama_peminjam,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
        'buku_id' => $request->buku_id,
    ]);

    return redirect()->route('peminjaman.index')->with('success', 'Data berhasil diperbarui');
}





    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $data = Peminjaman::where('nisn', $id)->first();

        Peminjaman::where('nisn', $id)->delete();
        return redirect('peminjaman')->with('success', 'Data Berhasil Dihapus!');
    }

    public function cekStatus(Request $request)
    {
    $peminjaman = null;

    if ($request->has('nisn')) {
        $request->validate([
            'nisn' => 'required'
        ]);

        $peminjaman = Peminjaman::where('nisn', $request->nisn)
            ->with('buku')
            ->get();
    }

        return view('peminjaman.cek-status', compact('peminjaman'));
    }

    public function cekStatusForm()
    {
        return view('peminjaman.cek-status');
    }

}
