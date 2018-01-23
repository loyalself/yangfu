<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function seeting()
    {
        return view('user.seeting');
    }

    public function seetingStore()
    {
        
    }

    /**
     * 个人介绍页面
     */
    public function show()
    {
        return view('user.show');
    }
}
