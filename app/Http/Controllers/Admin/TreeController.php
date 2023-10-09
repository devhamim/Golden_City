<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    function tree_hide_show(){
        return view('admin.tree.tree_hide_show');
    }
}
