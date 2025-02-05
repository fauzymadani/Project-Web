<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'kategori';
    protected $primarykey = 'id';
    protected $fillable = ['kategori_buku'];

public function buku()
{

    return $this->Hasmany('App\Models\Buku');
}
}