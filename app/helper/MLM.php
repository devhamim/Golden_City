<?php

use App\Models\BonusHistory;
use App\Models\BonusSets;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class MLM
{

    public static function RefferanceBonus($package, $bonus_type)
    {
        if (BonusSets::where('bonus_type', $bonus_type)->exists()) {
            $refferal = BonusSets::where('bonus_type', $bonus_type)->first();
            $amount = $package->price * $refferal->bonus / 100;

            self::MakeBonusHistory($bonus_type, Auth::user()->parent->id, Auth::user()->id, $package->id, null, $amount);

            $walletTypes = ['c_wallet', 'r_wallet', 's_wallet'];

            foreach ($walletTypes as $walletType) {
                if ($refferal->$walletType != 0) {
                    $cWallet = $amount * $refferal->$walletType / 100;

                    $walletTypeConvert = null; //Convert into real wallet

                    if ($walletType == 'c_wallet') {
                        $walletTypeConvert = 'credit';
                    } elseif ($walletType == 'r_wallet') {
                        $walletTypeConvert = 'refferal';
                    } elseif ($walletType == 's_wallet') {
                        $walletTypeConvert = 'shopping';
                    }

                    //Credit <---refference
                    $wallet                     = new Wallet();
                    $wallet->receiver_id        = Auth::user()->parent->id;
                    $wallet->wallet_type        = $walletTypeConvert;
                    $wallet->transaction_type   = 'credit';
                    $wallet->balance            = (float)$cWallet;
                    $wallet->status             = 'confirm';
                    $wallet->save();
                }
            }
        }
    }

    public static function DailyBonus($package, $bonus_type)
    {
        if (BonusSets::where('bonus_type', $bonus_type)->exists()) {
            $refferal = BonusSets::where('bonus_type', $bonus_type)->first();
            $amount = $package->price * $refferal->bonus / 100;

            self::MakeBonusHistory($bonus_type, $package->user_id, null, $package->id, null, $amount);

            $walletTypes = ['c_wallet', 'r_wallet', 's_wallet'];

            foreach ($walletTypes as $walletType) {
                if ($refferal->$walletType != 0) {
                    $cWallet = $amount * $refferal->$walletType / 100;

                    $walletTypeConvert = null; //Convert into real wallet

                    if ($walletType == 'c_wallet') {
                        $walletTypeConvert = 'credit';
                    } elseif ($walletType == 'r_wallet') {
                        $walletTypeConvert = 'refferal';
                    } elseif ($walletType == 's_wallet') {
                        $walletTypeConvert = 'shopping';
                    }

                    //Credit <---refference
                    $wallet                     = new Wallet();
                    $wallet->receiver_id        =  $package->user_id; //Auth::user()->parent->id; //user getting from package user id
                    $wallet->wallet_type        = $walletTypeConvert;
                    $wallet->transaction_type   = 'credit';
                    $wallet->balance            = (float)$cWallet;
                    $wallet->status             = 'confirm';
                    $wallet->save();
                }
            }
        }
    }

    //Making bonus history
    public static function MakeBonusHistory($bonusType, $receiver_id, $sender_id = null, $package_id = null, $position = null, $amount)
    {
        $Bonus = new BonusHistory();
        $Bonus->bonus_type  = $bonusType;
        $Bonus->user_id     = $receiver_id;
        $Bonus->sender_id   = $sender_id;
        $Bonus->package_id  = $package_id;
        $Bonus->position    = $position;
        $Bonus->amount      = $amount;
        $Bonus->save();
    }
}
