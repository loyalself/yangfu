<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
   // protected $table = 'admin_roles';

    /**
     * 当前角色的所有权限
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class,'admin_permission_role','role_id','permission_id')
                     ->withPivot(['role_id','permission_id']);
    }

    /**
     * 给角色赋予权限
     * @param $permission
     * @return Model
     */
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission);
    }
    /**
     * 取消角色赋予的权限
     * @param $permission
     * @return int
     */
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }
    /**
     * 判断角色是否有权限
     * @param $permission
     * @return mixed
     */
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }
}
