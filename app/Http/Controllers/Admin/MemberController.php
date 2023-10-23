<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function add_member()
    {
        return view('admin.member.add_member');
    }
    function member_packge_list()
    {
        $package = Package::all();
        return view('admin.member.member_packge_list', ['packages' => $package]);
    }
    function banned_member()
    {
        return view('admin.member.banned_member');
    }
    function member_account_verified()
    {
        return view('admin.member.member_account_verified');
    }
    function member_bonus()
    {
        return view('admin.member.member_bonus');
    }

    function member_packge_store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'price'     => 'required|integer',
            'day'       => 'required|integer',
            't_price'   => 'required|integer',
        ]);

        $package = new Package();
        $package->name          = $request->name;
        $package->price         = $request->price;
        $package->day           = $request->day;
        $package->target_price  = $request->t_price;
        $package->comment       = $request->comment;
        $package->save();
        return back()->with('succ', 'Package added');
    }
}
