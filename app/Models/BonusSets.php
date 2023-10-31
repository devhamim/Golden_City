<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusSets extends Model
{
    use HasFactory;
    protected $fillable = ['bonus_type', 'bonus', 'c_wallet', 'r_wallet', 's_wallet'];
}
