<?php

use App\Models\BonusHistory;
use App\Models\Wallet;

class Balance
{
    public static function TransferBalance($user_id)
    {
        $balance = 0.00;
        $data = Wallet::select('balance')->where('sender_id', $user_id)->where('transaction_type', 'transfer')->get();

        foreach ($data as $value) {
            $balance += $value->balance;
        }

        return $balance;
    }

    public static function receiveBalance($user_id)
    {
        $balance = 0.00;
        $data = Wallet::select('balance')->where('receiver_id', $user_id)->where('transaction_type', 'transfer')->get();

        foreach ($data as $value) {
            $balance += $value->balance;
        }

        return $balance;
    }

    public static function TotalDailyIncome($user_id)
    {
        $balance = 0.00;

        $data = BonusHistory::where("user_id", $user_id)->where('bonus_type', 'daily')->get();

        foreach ($data as $value) {
            $balance += $value->amount;
        }

        return $balance;
    }

    public static function RefferalIncome($user_id)
    {
        $balance = 0.00;

        $data = BonusHistory::where("user_id", $user_id)->where('bonus_type', 'refferal')->get();

        foreach ($data as $value) {
            $balance += $value->amount;
        }

        return $balance;
    }
    public static function GenerationIncome($user_id)
    {
        $balance = 0.00;

        $data = BonusHistory::where("user_id", $user_id)->where('bonus_type', 'generation')->get();

        foreach ($data as $value) {
            $balance += $value->amount;
        }

        return $balance;
    }
    public static function MatchingIncome($user_id)
    {
        $balance = 0.00;

        $data = BonusHistory::where("user_id", $user_id)->where('bonus_type', 'matching')->get();

        foreach ($data as $value) {
            $balance += $value->amount;
        }

        return $balance;
    }
    public static function TotalBonus($user_id)
    {
        $balance = 0.00;

        $data = BonusHistory::where("user_id", $user_id)->get();

        foreach ($data as $value) {
            $balance += $value->amount;
        }

        return $balance;
    }
}
