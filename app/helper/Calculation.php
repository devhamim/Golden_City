<?php

use App\Models\ActivePackage;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class Calculate
{
    public static function Balance() //Negative value //Positive Value
    {
        $wallets = Wallet::where('receiver_id', Auth::user()->id)->get();
        $negativeWallets = Wallet::where('sender_id', Auth::user()->id)->get();

        $positiveBalance = []; //Positive

        $wallets->map(function ($wallet) use (&$positiveBalance) {
            $walletType = $wallet->wallet_type;
            $balance = (float)$wallet->balance;

            if (!is_numeric($balance)) {
                // Handle non-numeric value, log it, or set it to 0
                $balance = 0.0; // For example, set it to 0
            }

            if (!isset($positiveBalance[$walletType])) {
                $positiveBalance[$walletType] = 0;
            }

            $positiveBalance[$walletType] += $balance;
        });

        $negativeBalance = []; //Negative

        $negativeWallets->map(function ($wallet) use (&$negativeBalance) {
            $walletType = $wallet->wallet_type;
            $balance = (float)$wallet->balance;

            if (!is_numeric($balance)) {
                // Handle non-numeric value, log it, or set it to 0
                $balance = 0.0; // For example, set it to 0
            }
            if (!isset($negativeBalance[$walletType])) {
                $negativeBalance[$walletType] = 0;
            }

            $negativeBalance[$walletType] += $balance;
        });

        $final = $positiveBalance;

        foreach ($negativeBalance as $key => $value) {
            if (array_key_exists($key, $final)) {
                $final[$key] -= $value;
            } else {
                $final[$key] = 0;
            }
        }
        return $final;
    }

    public static function limitBalance()
    {
        $activePackage = ActivePackage::where('user_id', Auth::user()->id)->get();
    }
}
