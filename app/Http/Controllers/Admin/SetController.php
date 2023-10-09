<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetController extends Controller
{
    function daily_bonus_set(){
        return view('admin.set.daily_bonus_set');
    }
    function reference_bonus_set(){
        return view('admin.set.reference_bonus_set');
    }
    function transfer_vat_set(){
        return view('admin.set.transfer_vat_set');
    }
    function withdraw_vat_set(){
        return view('admin.set.withdraw_vat_set');
    }
    function matching_bonus_set(){
        return view('admin.set.matching_bonus_set');
    }
}
