<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //可以赋值的属性
    //protected $fillable = ['title','content'];

    //不可以注入的字段
    protected $guarded = [];
}
