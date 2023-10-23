<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivePackage extends Model
{
    use HasFactory;



    public function getHumanReadableDurationAttribute()
    {
        return Carbon::parse($this->attributes['duration'])->diffForHumans();
    }
}
