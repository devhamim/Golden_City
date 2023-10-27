<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DepositRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    function user_deposit()
    {
        return view('user.deposit.deposit');
    }
    function deposit_request(Request $request)
    {
        $request->validate([
            'country'               => 'required',
            'wallet_type'           => 'required',
            'email'                 => 'required',
            'pin'                   => 'required',
            'transaction_number'    => 'required',
            'amount'                => 'required',
        ]);

        $deposit                        = new DepositRequest();
        $deposit->user_id               = Auth::user()->id;
        $deposit->country               = $request->country;
        $deposit->email                 = $request->email;
        $deposit->wallet_type           = $request->wallet_type;
        $deposit->amount                = $request->amount;
        $deposit->status                = 'pending';
        $deposit->transaction_number    = $request->transaction_number;
        $deposit->save();

        return back()->with(['succ' => 'Successful! Money will be added soon']);
    }
}
