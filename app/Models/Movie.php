<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    function todasPeliculas(){
        return Movie::all();
    }

    function mostrarPelicula($id){
        return Movie::findOrFail($id);
    }
}
