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
        'role_id',
        'peminjaman_id'
    ];



    public function buku()
    {
        return $this->belongsTo('App\Models\Buku');
    }

    public function role()
    {
        /*return $this->belongsTo('App\Models\Role');*/
        return $this->belongsTo(Role::class, 'role_id');
    }
}
