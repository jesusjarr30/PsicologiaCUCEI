<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table="comentarios";

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cliente_id');
    }
}
