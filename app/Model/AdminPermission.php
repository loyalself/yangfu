<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    //protected $table = 'admin_permissions';
    protected $guarded = [];
    public function roles()
    {
        return $this->belongsToMany(AdminRole::class,'admin_permission_role','permission_id','role_id')
                     ->withPivot(['permission_id','role_id']);
    }
}
