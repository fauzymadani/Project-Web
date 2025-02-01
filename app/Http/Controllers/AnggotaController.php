<?php

namespace App\Http\Controllers;


use App\Models\Anggota;
use App\Models\Buku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Role;

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
        $buku = Buku::all();
        $role = Role::all(); // Ambil semua data dari tabel roles

        return view('anggota.create', ['buku' => $buku, 'role' => $role]); // Kirim variabel ke view
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nia' => 'required',
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png,gif',
            'role_id' => 'required',
        ], [
            'nia.required' => 'NIA Wajib Diisi!',
            'nama_anggota.required' => 'Nama Anggota Wajib Diisi!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi!',
            'foto.required' => 'Foto Wajib Diisi!',
            'foto.mimes' => 'Foto hanya boleh berekstensi jpeg, jpg, png, atau gif',
            'role_id' => 'wajib diisi ini!',
        ]);

        $foto_file = $request->file('foto');
        $foto_nama = time() . "_" . uniqid() . "." . $foto_file->extension();
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nia' => $request->nia,
            'nama_anggota' => $request->nama_anggota,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $foto_nama,
            'role_id' => $request->role_id,
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
        $role = Role::all();

        return view(
            'anggota.edit',
            [
                'buku' => $buku,
                'role' => $role,
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
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|mimes:jpeg,jpg,png,gif',
            'role_id' => 'required',
        ], [
            'nia.required' => 'NIA Wajib Diisi!',
            'nama_anggota.required' => 'Nama Anggota Wajib Diisi!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi!',
            'foto.mimes' => 'Foto hanya boleh berekstensi jpeg, jpg, png, atau gif',
            'role_id' => 'ini wajib diisi juga yaa admin!',
        ]);

        $data = Anggota::where('nia', $id)->first();

        if ($request->hasFile('foto')) {
            if ($data->foto && File::exists(public_path('foto/' . $data->foto))) {
                File::delete(public_path('foto/' . $data->foto));
            }

            $foto_file = $request->file('foto');
            $foto_nama = time() . "_" . uniqid() . "." . $foto_file->extension();
            $foto_file->move(public_path('foto'), $foto_nama);

            $data->foto = $foto_nama;
        }

        $data->update([
            'nia' => $request->nia,
            'nama_anggota' => $request->nama_anggota,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $data->foto,
            'role_id' => $request->role_id,
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
