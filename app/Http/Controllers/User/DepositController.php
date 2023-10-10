<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    function user_deposit(){
        return view('user.deposit.deposit');
    }
}
