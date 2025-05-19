<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'kodebuku';
    protected $fillable = [
        'nama_buku',
        'kategori_id',
        'file_pdf',
        "deskripsi",
        "sampul"

    ];

    public function Anggota()
    {

        return $this->Hasmany('App\Models\Anggota');
    }
    public function Peminjaman()
    {

        return $this->Hasmany('App\Models\Peminjaman');
    }
    public function Kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }
}
