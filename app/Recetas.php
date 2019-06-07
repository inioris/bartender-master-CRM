<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    protected $guarded = [
        'title' => 'required|string|max:100',
            'subtitle' => 'required|max:100',
            'category'=> 'required',
            'description' => 'required',
            'imagen' => 'required|image'
    ];
    public function getRoutekeyName(){
        return 'title';
    }
}
