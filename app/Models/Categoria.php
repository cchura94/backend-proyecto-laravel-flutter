<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // wp_categorias
    # protected $table = 'categorias';

    # protected $primaryKey = 'idcat';
    # public $incrementing = false;
    # protected $keyType = 'string';

    # public $timestamps = false;

    function productos(){
        return $this->hasMany(Producto::class);
    }

}
