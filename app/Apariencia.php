<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apariencia extends Model
{
    protected $table = 'apariencia';
    protected $guarded = [
        'headers' => 'string|max:30',
        'nav_lateral' => 'string|max:30',
        'barra_localidad'=> 'string|max:30',
        'bg_color' => 'string|max:30',
        'bg_pantalla' => 'image'
    ];

}
