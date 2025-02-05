<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'nisn',
        'nama_peminjam',
        'tanggal_pinjam',
        'tanggal_dikembalikan',
        'buku_id',
    ];



    public function buku()
    {
        return $this->belongsTo('App\Models\Buku');
    }
          
    
}
