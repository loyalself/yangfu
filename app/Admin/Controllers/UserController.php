<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/25
 * Time: 15:17
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Model\AdminRole;
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

    /**
     * 用户角色页面
     * @param AdminUser $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role(\App\Model\AdminUser $user)
    {
        $roles = AdminRole::all();  //取出所有角色
        $myRoles = $user->roles;     //当前用户的角色
        return view('admin.user.role',compact('roles','myRoles','user'));
    }

    /**
     * 储存用户角色页面
     * @param AdminUser $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRole(AdminUser $user)
    {
        $this->validate(request(),[
            'roles'=>'required|array'
        ]);
        //这个是即将要添加的角色
        $roles = AdminRole::find(request('roles'));
        //这个是当前用户持有的角色
        $myRoles = $user->roles;

        //要增加的,就是用户之前没有的角色
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $role)
        {
            $user->roles()->save($role);
        }
        //要删除的
        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role)
        {
            $user->deleteRole($role);
        }
        return back();
    }
}