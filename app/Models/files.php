<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [

        'load_id',
        'files',

    ];
}
