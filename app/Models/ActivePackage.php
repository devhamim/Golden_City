<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivePackage extends Model
{
    use HasFactory;

    protected $dates = ['duration'];


    public function activePackage() //Find Parent
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
