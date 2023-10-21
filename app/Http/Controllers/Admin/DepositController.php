<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepositRequest;


class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function admin_deposit()
    {
        return view('admin.deposit.admin_deposit');
    }
    function deposite_request()
    {
        $request = DepositRequest::all();
        return view('admin.deposit.deposite_request', [
            'requests' => $request,
        ]);
    }
    function deposite_reject()
    {
        return view('admin.deposit.deposite_reject');
    }
}
