<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
