<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/25
 * Time: 15:17
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Model\AdminUser;

class UserController extends Controller
{
    //管理员列表页面
    public function index()
    {
        $users = AdminUser::paginate(10);
        return view('admin.user.index',compact('users'));
    }
    //管理员创建页面
    public function create()
    {
        return view('admin.user.add');
    }
    /**
     * 添加管理员逻辑
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(request(),[
            'name'=>'required|min:3',
            'password'=>'required|min:3|max:12'
        ]);
        $name = request('name');
        $password = bcrypt(request('password'));
        AdminUser::create(compact('name','password'));
        return redirect('/admin/users');
    }
}