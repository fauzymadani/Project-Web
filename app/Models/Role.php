<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;
    protected $table = 'roles';
    protected $primarykey = 'id';
    protected $fillable = ['roles'];

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'role_id');
    }
}
