<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function account_verified(){
        return view('user.account.account_verified');
    }
    function user_nid_store(Request $request){
        return $request->all();
    }
}
