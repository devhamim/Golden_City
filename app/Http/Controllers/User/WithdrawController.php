<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    function user_withdraw(){
        return view('user.withdraw.withdraw');
    }
}
