<?php

namespace App\Http\Controllers;


use App\Models\Anggota;
use App\Models\Buku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $anggota = Anggota::all();
        return view('anggota.index', ['anggota' => $anggota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        // Mendapatkan data buku
        $buku = Buku::all();

        // Mengembalikan view dengan data buku
        return view('anggota.create', ['buku' => $buku]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nia' => 'required',
            'nama_anggota' => 'required',
            'buku_yang_dibaca' => 'required|integer',
            'buku_id' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png,gif',
        ], [
            'nia.required' => 'NIA Wajib Diisi!',
            'nama_anggota.required' => 'Nama Anggota Wajib Diisi!',
            'buku_id.required' => 'Buku Wajib Diisi!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi!',
            'foto.required' => 'Foto Wajib Diisi!',
            'foto.mimes' => 'Foto hanya boleh berekstensi jpeg, jpg, png, atau gif',
        ]);

        $foto_file = $request->file('foto');
        $foto_nama = time() . "_" . uniqid() . "." . $foto_file->extension();
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nia' => $request->nia,
            'nama_anggota' => $request->nama_anggota,
            'buku_yang_dibaca' => $request->buku_yang_dibaca,  // Menambahkan kolom buku_yang_dibaca
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'buku_id' => $request->buku_id,
            'foto' => $foto_nama,
        ];

        Anggota::create($data);

        return redirect()->route('anggota.index')->with('success', 'Data Anggota Berhasil Ditambahkan!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        return view('anggota.show', ['anggota' => $anggota]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Anggota::where('nia', $id)->first();
        $buku = Buku::all();

        return view(
            'anggota.edit',
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
            'nia' => 'required',
            'nama_anggota' => 'required',
            'buku_id' => 'required',
            'gaji_anggota' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required', // pastikan buku_id valid
        ], [
            'nia.required' => 'NIP Wajib Diisi!',
            'nama_anggota.required' => 'Nama Anggota Wajib Diisi!',
            'buku_id' => 'Buku Wajib Diisi',
            'buku_yang_dibaca.required' => 'Gaji Anggota Wajib Diisi!',
            'alamat.required' => 'Alamat Anggota Wajib Diisi!',
            'jenis_kelamin.required' => 'Data Jenis Kelamin Wajib Diisi!',
        ]);

        // Ambil data ANGGOTA berdasarkan nip
        $data = Anggota::where('nia', $id)->first();

        // Perbarui data anggota dengan data baru
        $data->update([
            'nia' => $request->nia,
            'nama_anggota' => $request->nama_anggota,
            'buku_id' => $request->buku_id,
            'buku_yang_dibaca' => $request->gaji_anggota,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin, // update buku_id
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $data = Anggota::where('nia', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);

        Anggota::where('nia', $id)->delete();
        return redirect('anggota')->with('success', 'Data Berhasil Dihapus!');
    }
}
