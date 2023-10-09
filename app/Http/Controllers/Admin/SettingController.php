<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function account_setting(){
        return view('admin.setting.account_setting');
    }
    function password_change(){
        return view('admin.setting.password_change');
    }
}
