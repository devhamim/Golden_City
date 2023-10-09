<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function add_member(){
        return view('admin.member.add_member');
    }
    function member_packge_list(){
        return view('admin.member.member_packge_list');
    }
    function banned_member(){
        return view('admin.member.banned_member');
    }
    function member_account_verified(){
        return view('admin.member.member_account_verified');
    }
    function member_bonus(){
        return view('admin.member.member_bonus');
    }
}
