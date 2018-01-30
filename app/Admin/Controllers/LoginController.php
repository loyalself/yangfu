<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/25
 * Time: 11:22
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 后台登陆页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('/admin.login.index');
    }

    /**
     * 登陆逻辑
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login()
    {
        $this->validate(request(),[
            'name'=>'required|min:2',
            'password'=>'required|min:6|max:30'
        ]);
        $user = request(['name','password']);
        if (true == \Auth::guard('admin')->attempt($user))
        {
            return redirect('/admin/home');
        }
        return \Redirect::back()->withErrors('用户名或密码错误');
    }

    /**
     * 退出登陆
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}