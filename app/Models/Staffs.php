<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    protected $fillable = [
        'name',
        'position_name',
        'phone',
        'email',
        'join_date',
        'address'
    ];
}
