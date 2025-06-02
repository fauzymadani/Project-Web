<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $fillable = ['title', 'description', 'label', 'active'];
}
