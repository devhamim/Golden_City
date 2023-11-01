<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function bonusHistories()
    {
        return $this->hasMany(BonusHistory::class, 'package_id');
    }
}
