<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    function ordenes(){
        return $this->belongsToMany(Orden::class)
                    ->withPivot(["cantidad"])
                    ->withTimestamps();
    }
}
