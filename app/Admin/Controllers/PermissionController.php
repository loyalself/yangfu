<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/28
 * Time: 10:31
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Model\AdminPermission;

class PermissionController extends Controller
{
    /**
     * 权限列表页面
     */
    public function index()
    {
        $permissions = AdminPermission::paginate(10);
        return view('admin.permission.index',compact('permissions'));
    }
    /**
     * 增加权限页面
     */
    public function create()
    {
        return view('admin.permission.add');
    }

    /**
     * 储存权限逻辑
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(request(),[
            'name'=>'required|min:3',
            'description'=>'required'
        ]);
        AdminPermission::create(request(['name','description']));
        return redirect('/admin/permissions');
    }

}