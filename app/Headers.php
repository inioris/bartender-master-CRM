<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headers extends Model
{
    protected $guarded = [
        'title' => 'required|string|max:200',
        'description' => 'required',
        'imagen' => 'required|image'
    ];
}
