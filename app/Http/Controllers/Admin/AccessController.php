<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
    function user_tree_access()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.access.user_tree_access', ['user' => $user]);
    }
    function user_bkash_access()
    {
        return view('admin.access.user_bkash_access');
    }
}
