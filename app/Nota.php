<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table      = "notas";
    protected $primaryKey = "id";
    public $timestamps    = true;

    protected $fillable = [
        "nombre",
        "descripcion"        
    ];
}
