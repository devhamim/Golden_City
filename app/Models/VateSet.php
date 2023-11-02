<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VateSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'vate_set',
        'fee',
    ];
}
