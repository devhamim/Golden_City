<?php

use App\Models\ActivePackage;
use App\Models\User;
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

    public static function limitBalance($user_id)
    {
        $balance = 0.00;
        $data = ActivePackage::where('user_id', $user_id)->get();

        foreach ($data as $value) {
            $balance += $value->target_price;
        }

        return $balance;
    }

    public static function EarnLimit($user_id)
    {
        $balance = self::limitBalance($user_id) - Balance::TotalBonus($user_id);
        return $balance;
    }

    public static function MatchingIcome($userId)
    {
        $user = User::find($userId);
        // return $user->leftChild;

        if ($user) {
            $leftPrice = self::calculateActivePackagePrice($user->leftChild);
            $rightPrice = self::calculateActivePackagePrice($user->rightChild);

            return [
                'left' => $leftPrice,
                'right' => $rightPrice,
            ];
        }

        return [
            'left' => 0.00,
            'right' => 0.00,
        ];
    }

    private static function calculateActivePackagePrice($user)
    {
        // Calculate the active package price for the current user
        $currentActivePackagePrice = $user->activePackages->sum('price');

        $leftPrice = 0.00;
        if ($user->leftChild) {
            $leftPrice = self::calculateActivePackagePrice($user->leftChild);
        }

        $rightPrice = 0.00;
        if ($user->rightChild) {
            $rightPrice = self::calculateActivePackagePrice($user->rightChild);
        }

        return $leftPrice + $rightPrice + $currentActivePackagePrice;
    }
}
