<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'name',
        'description'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
