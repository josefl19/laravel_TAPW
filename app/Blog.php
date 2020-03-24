<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //Referenciar a la tabla en la base de datos. (Ajustar modelo)
    protected $table = 'blog';
    public $timestamps = false;

}
