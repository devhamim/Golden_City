<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    function balance_transfer(){
        return view('user.balance.balance_transfer');
    }
}
