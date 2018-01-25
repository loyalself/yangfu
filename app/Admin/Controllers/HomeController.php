<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //后台展示页面
    public function home()
    {
        return view('admin.home.index');
    }
}
