<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    
    protected $table="citas";

    public function usuario()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
