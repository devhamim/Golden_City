<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    function user_tree_access(){
        return view('admin.access.user_tree_access');
    }
    function user_bkash_access(){
        return view('admin.access.user_bkash_access');
    }
}
