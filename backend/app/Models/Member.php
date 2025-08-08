<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasUuids;
    protected $table = 'members';

    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'address',
        'birthdate',
        'enrollment_date',
        'contract_plan'
    ];
}
