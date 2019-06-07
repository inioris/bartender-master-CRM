<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personalizar extends Model
{
    protected $table = 'personalizar';
    protected $guarded = [
        'headers' => 'required|string|max:50',
        'nav_lateral' => 'required|max:50',
        'barra_localidad'=> 'required',
        'bg_color' => 'required'
    ];
}
