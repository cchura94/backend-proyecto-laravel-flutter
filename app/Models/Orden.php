<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    function productos(){
        return $this->belongsToMany(Producto::class)
                    ->withPivot(["cantidad"])
                    ->withTimestamps();
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
