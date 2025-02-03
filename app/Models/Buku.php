<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primarykey = 'kodebuku';
    protected $fillable = ['nama_buku'];

    public function Anggota()
    {

        return $this->Hasmany('App\Models\Anggota');
    }
    public function Peminjaman()
    {

        return $this->Hasmany('App\Models\Peminjaman');
    }
}
