<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = [
        'nip',
        'nama_anggota',
        'buku_yang_dibaca',
        'alamat',
        'jenis_kelamin',
        'buku_id',
        'foto',

    ];

    public function buku() {
        return $this->belongsTo('App\Models\Buku');
    }

}
