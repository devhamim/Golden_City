<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function user_info(){
        return view('user.user.info');
    }
    function account_verified(){
        return view('user.user.account_verified');
    }
    function upgrade_account(){
        return view('user.user.upgrade_account');
    }
    function pin_code(){
        return view('user.user.pin_code');
    }
    function password_change(){
        return view('user.user.password_change');
    }
    function user_profile(){
        return view('user.user.user_profile');
    }
    function edit_user_profile(){
        return view('user.user.edit_user_profile');
    }
}
