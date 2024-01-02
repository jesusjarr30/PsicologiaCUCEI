<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table="citas";
    protected $fillable = ['cliente_id', 'consultorio', 'usuario_id', 'fecha', 'atendido'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
