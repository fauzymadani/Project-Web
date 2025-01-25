<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = [
        'nia',
        'nama_anggota',
        'buku_yang_dibaca',
        'buku_id',
        'alamat',
        'jenis_kelamin',
        'foto',
    ];



    public function buku()
    {
        return $this->belongsTo('App\Models\Buku');
    }
}
