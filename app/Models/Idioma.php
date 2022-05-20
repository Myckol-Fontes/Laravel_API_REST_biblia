<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    /**
     * Pega todas as versẽos
     */

    public function versao(){
        return $this->hasMany(Versao::class);
    }
}
