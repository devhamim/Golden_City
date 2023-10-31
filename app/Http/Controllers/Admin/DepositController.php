<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DepositReject;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Models\DepositRequest;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function admin_deposit()
    {
        $request = DepositRequest::where('status', 'confirm')->get();
        return view('admin.deposit.admin_deposit', [
            'requests' => $request,
        ]);
    }
    function deposite_request()
    {
        $request = DepositRequest::where('status', 'pending')->get();
        return view('admin.deposit.deposite_request', [
            'requests' => $request,
        ]);
       
    }
    function deposite_reject()
    {
        $request = DepositRequest::where('status', 'cancel')->get();
        return view('admin.deposit.deposite_reject', [
            'requests' => $request,
        ]);
    }


    function deposite_request_status(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $email = $user->email;
       
        //dd($request->all());
        if ($request->status == 'confirm') {
            $request->validate([
                'id'        => 'required|integer',
                'user_id'   => 'required|integer',
                'status'    => 'required',
                'username'  => 'required',
                'amount'    => 'required|integer',
            ]);

            DepositRequest::find($request->id)->update([
                'status' => 'confirm',
            ]);
            
            $wallet = new Wallet();
            $wallet->sender_id = null;
            $wallet->receiver_id = $request->user_id;
            $wallet->wallet_type = 'credit';
            $wallet->transaction_type = 'deposit';
            $wallet->status = 'confirm';
            $wallet->balance = $request->amount;
            $wallet->save();
            if ($request->status == 'confirm') {
                Mail::to($email)->send(new InvoiceMail($request->status));
            }
            return back()->with(['succ' => 'Deposit completed']);
        } 
        elseif ($request->status == 'cancel') {
            $request->validate([
                'id'        => 'required|integer',
                'status'    => 'required',
                'comment'   => 'required',
            ]);

            DepositRequest::find($request->id)->update([
                'status'    => 'cancel',
                'comment'   => $request->comment,
            ]);
            if ($request->status == 'cancel') {
                $comment = $request->comment;
                $user_id = $request->user_id;
                Mail::to($email)->send(new InvoiceMail($comment));
            }
            return back()->with(['succ' => 'Deposit cancel']);
        }
    }
}
