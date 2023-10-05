<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table="notas";

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cliente_id');
    }
}
