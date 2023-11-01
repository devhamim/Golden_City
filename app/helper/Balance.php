<?php

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class Balance
{
    public static function TransferBalance()
    {
        $balance = 0.00;
        $data = Wallet::select('balance')->where('sender_id', Auth::user()->id)->where('transaction_type', 'transfer')->get();

        foreach ($data as $value) {
            $balance += $value->balance;
        }

        return $balance;
    }
    public static function receiveBalance()
    {
        $balance = 0.00;
        $data = Wallet::select('balance')->where('receiver_id', Auth::user()->id)->where('transaction_type', 'transfer')->get();

        foreach ($data as $value) {
            $balance += $value->balance;
        }

        return $balance;
    }
}
