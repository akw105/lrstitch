<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'projectfiles';


    protected $fillable = [
        'name',
        'file_path'
    ];
}
