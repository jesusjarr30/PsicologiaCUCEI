<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Model
{
    use HasFactory;

    protected $table="usuarios";
    
    protected function nombre():Attribute
    {
        return new Attribute(
            set: function($value){
                return Str::upper($value);
            }
        );
    }

    
}
