<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function update_news(){
        return view('admin.news.update_news');
    }
    function news_promotion(){
       return view('admin.news.news_promotion');
    }
}
