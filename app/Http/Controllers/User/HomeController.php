<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Calculate;

class HomeController extends Controller
{
    function user_dashboard()
    {
        return view('user.home.dashboard', [
            'balance'       => Calculate::Balance(),
            // 'mainBalance'   => $final
        ]);
    }
}
