<?php

namespace App\Providers;

use App\Models\Wallet;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        // view()->composer('*', function ($view) {
        //     $user = auth()->user();
        //     if ($user) {
        //         $wallets = Wallet::where('receiver_id', $user->id)->where('sender_id', $user->id)->get();
        //         $balace = null;
        //         foreach ($wallets as $wallet) {
        //             $balace += $wallet->balance;
        //         }
        //         dd($balace);
        //         $view->with('balance', $balace);
        //     }
        // });
    }
}
