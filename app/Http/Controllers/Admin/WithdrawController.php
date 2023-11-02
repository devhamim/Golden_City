<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StopAllWithdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    function admin_withdraw(){
        return view('admin.withdraw.admin_withdraw');
    }
    function admin_withdraw_request(){
        return view('admin.withdraw.admin_withdraw_request');
    }
    function admin_withdraw_commission(){
        return view('admin.withdraw.admin_withdraw_commission');
    }
    function admin_withdraw_reject(){
        return view('admin.withdraw.admin_withdraw_reject');
    }
    function stop_withdraw(){
        return view('admin.withdraw.stop_withdraw');
    }
    function stop_all_withdraw(){
        return view('admin.withdraw.stop_all_withdraw');
    }
    function withdraw_vat_set(){
        return view('admin.withdraw.withdraw_vat_set');
    }
    function all_withdraw_status(Request $request){
        $count = StopAllWithdraw::count();
        if ($count == '0') {
            StopAllWithdraw::insert([
                'status' =>$request->status,
            ]);
            return back();
        }
        else{
            $count = StopAllWithdraw::first();
            StopAllWithdraw::where('id', $count->id)->update([
                'status' =>$request->status,
            ]);
            return back();
        }
    }
}
