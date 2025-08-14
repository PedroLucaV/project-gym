<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $table = 'equipaments';

    protected $fillable = [
        'name',
        'brand',
        'model',
        'fabrication_year',
        'max_capacity',
        'localization',
        'state'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
