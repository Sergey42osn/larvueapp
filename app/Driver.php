<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'f_name', 'name', 'phone','id_car','confirmed',
    ];
}
