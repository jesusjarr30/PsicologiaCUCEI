<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="clientes";

    //relacion con los comentarios 
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'cliente_id');
    }
    public function notas()
    {
        return $this->hasMany(Notas::class, 'cliente_id');
    }
    public function citas()
    {
        return $this->hasMany(citas::class, 'cliente_id');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'cliente_id');
    }
}
