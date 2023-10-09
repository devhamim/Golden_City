<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function admin_deposit(){
        return view('admin.deposit.admin_deposit');
    }
    function deposite_request(){
        return view('admin.deposit.deposite_request');
    }
    function deposite_reject(){
        return view('admin.deposit.deposite_reject');
    }
}
