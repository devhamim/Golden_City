<?php

namespace App\Models;

use App\Mail\DepositReject;
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
    function deposit_user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
