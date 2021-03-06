<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_prod',
        'name_employee',
        'team',
        'age',
        'genre',
        'vote',
    ];
}
