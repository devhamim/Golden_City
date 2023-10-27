<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tree;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    function tree_hide_show(){
        return view('admin.tree.tree_hide_show');
    }
    function tree_config(Request $request){
        $tree = Tree::get();
        if ($tree->count() == '0') {
            Tree::insert([
                'status' => $request->status,
            ]);
        }
        $tree = Tree::first();
        Tree::where('id', $tree->id)->update([
            'status' => $request->status,
        ]);
        return back();
    }
}
