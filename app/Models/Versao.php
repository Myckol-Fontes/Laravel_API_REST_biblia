<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    use HasFactory;

    protected $table = 'versoes';

    protected $fillable = ['nome', 'abreviacao', 'idioma_id'];

    /**
     * Pega o Idioma
     */

     public function idioma(){
         return $this->belongsTo(Idioma::class);
     }

     /**
      * Pega o Livro
      */

      public function livros(){
          return $this->hasMany(Livro::class);
      }
}

