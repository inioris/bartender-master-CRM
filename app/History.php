<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";

    protected $guarded = [
        'title' => 'required|string',
        'description' => 'required',
        'imagen'=> 'required|image'
    ];

}
