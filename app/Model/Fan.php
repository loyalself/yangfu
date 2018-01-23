<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    /**
     * 获取粉丝用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuser()
    {                                               //这里表示Fan表里的fan_id跟user表里的id是外键关联关系的,下面的也是一样
        return $this->hasOne(\App\User::class,'id','fan_id');
    }

    /**
     * 获取被关注的用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suser()
    {
        return $this->hasOne(\App\User::class,'id','star_id');
    }
}
