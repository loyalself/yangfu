<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //注册界面
    public function index()
    {
        return view('register.index');
    }

    /**
     * 注册逻辑
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register()
    {

        $this->validate(request(),[
            'name'=>'required|unique:users|min:3',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6|max:20|confirmed'
        ]);

        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));

        $user = User::create(compact('name','email','password'));

        return redirect('/login');
    }

}
