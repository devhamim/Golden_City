<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DepositRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    function user_deposit(Request $request)
    {
        $data = DepositRequest::query();

        if ($request->has('start') && $request->has('end')) {
            if ($request->start != null && $request->end != null) {
                $data->whereBetween('created_at', [$request->start, $request->end . ' 23:59:59']);
            }
        }

        $depositRequest = $data->where('user_id', Auth::user()->id)->get();

        $total_deposit = DepositRequest::select('amount')->where('user_id', Auth::user()->id)->where('status', 'confirm')->sum('amount');
        // dd($total_deposit);
        return view('user.deposit.deposit', [
            'depositsRequest'   => $depositRequest,
            'totalDeposit'      => $total_deposit
        ]);
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

        if (Auth::user()->pin != null) {
            if (Auth::user()->pin == $request->pin) {
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
            } else {
                return back()->with(['err' => 'Incorrect pin']);
            }
        } else {
            return back()->with(['err' => 'Setup your PIN, before deposit']);
        }
    }
}
