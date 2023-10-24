<?php

namespace App\Console\Commands;

use App\Models\ActivePackage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class AddDailyBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:add-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add daily bonus to eligible users.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $package = ActivePackage::where('user_id', Auth::user()->id)->get();
        dd($package);
    }
}
