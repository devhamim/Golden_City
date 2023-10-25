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

    //Level Bonus
    public static function LevelBonus($package, $bonus_type)
    {
        if (BonusSets::where('bonus_type', $bonus_type)->exists()) {
            $refferal = BonusSets::where('bonus_type', $bonus_type)->first();
            $initialAmount = $package->price;


            $user = Auth::user();

            if (!$user) {
                return;
            }

            // Define the initial percentage
            $percentage = 0.10;

            for ($i = 1; $i <= 5; $i++) {
                if ($percentage < 0.02 || !$user->parent) {
                    break;
                }

                // Calculate the distribution amount
                $distributionAmount = $initialAmount * $percentage;

                self::MakeBonusHistory($bonus_type, $user->id, Auth::user()->id, $package->id, null, $distributionAmount);

                $walletTypes = ['c_wallet', 'r_wallet', 's_wallet'];

                foreach ($walletTypes as $walletType) {
                    if ($refferal->$walletType != 0) {
                        // Calculate the share for the current parent and wallet type
                        $parentShare = $distributionAmount * $refferal->$walletType / 100;

                        // Convert wallet type to real, refferal, or shopping
                        if ($walletType == 'c_wallet') {
                            $walletTypeConvert = 'credit';
                        } elseif ($walletType == 'r_wallet') {
                            $walletTypeConvert = 'refferal';
                        } elseif ($walletType == 's_wallet') {
                            $walletTypeConvert = 'shopping';
                        }

                        // Credit <--- Reference
                        $wallet = new Wallet();
                        $wallet->receiver_id        = $user->parent->id;
                        $wallet->wallet_type        = $walletTypeConvert;
                        $wallet->transaction_type   = 'credit';
                        $wallet->balance            = (float) $parentShare;
                        $wallet->status             = 'confirm';
                        $wallet->save();
                    }
                }

                $percentage -= 0.02;
                $user = $user->parent; // Move to the next parent
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
