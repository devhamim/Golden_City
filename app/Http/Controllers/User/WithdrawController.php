<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Calculate;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    function user_withdraw()
    {
        return view('user.withdraw.withdraw', [
            'balance'  => Calculate::Balance(),
        ]);
    }

    function transfer_request(Request $request)
    {
        $request->validate([
            'id'         => 'required',
            'wallet'     => 'required',
            'username'   => 'required',
            'amount'     => 'required',
        ]);

        if (User::where('username', $request->username)->exists()) {
            // dd($request->all());
            $balance = Calculate::Balance();
            $receiver_id = User::where('username', $request->username)->where('status', 1)->first()->id;

            if ($balance[$request->wallet] >= $request->amount) {
                $wallet = new Wallet();
                $wallet->sender_id          = $request->id;
                $wallet->receiver_id        = $receiver_id;
                $wallet->wallet_type        = $request->wallet;
                $wallet->transaction_type   = 'transfer';
                $wallet->status             = 'confirm';
                $wallet->balance            = $request->amount;
                $wallet->save();
                return back()->with('succ', 'Transfer complete');
            } else {
                return back()->with('err', 'Not enough balance');
            }


            $wallet = new Wallet();
            // $wallet->


        } else {
            return back()->with('err', 'Try again! No receiver found');
        }
    }

    function user_withdraw_request(Request $request)
    {
        $request->validate([
            'balance'       => 'required',
            'wallet_type'   => 'required',
            'wallet'        => 'required',
            'pin'           => 'required',
        ]);
    }
}
