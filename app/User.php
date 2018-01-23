<?php

namespace App;

use App\Model\Fan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取该用户的文章列表
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {   //这里的第二个参数是关联posts表里的外键,第二个参数是自身表的主键id,可以不用写,因为Laravel默认就是这个
        return $this->hasMany(\App\Model\Post::class,'user_id','id');
    }

    /**
     * 关注我的,那么我的id就会存在Fan表里,跟star_id相对应,所以star_id就是外键(别人关注我的,在别人那里显示的是关注);
     * 所以这里返回的应该是粉丝数
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fans()
    {
        return $this->hasMany(\App\Model\Fan::class,'star_id','id');
    }
    /**
     * 我关注的,外键就是fan_id,因为我是粉丝,我的id存在Fan表里(我关注别人的,在别人那里显示的是粉丝);
     * 所以这里返回的应该是关注数
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stars()
    {
        return $this->hasMany(\App\Model\Fan::class,'fan_id','id');
    }

    /**
     * 关注某人
     * @param $uid
     * @return false|\Illuminate\Database\Eloquent\Model
     */
    public function doFan($uid)
    {
        $fan = new Fan();
        $fan->star_id = $uid;
        return $this->stars()->save($fan);
    }

    /**
     * 取消关注
     * @param $uid
     * @return mixed
     */
    public function doUnFan($uid)
    {
        $fan = new Fan();
        $fan->star_id = $uid;
        return $this->stars()->delete($fan);
    }
    
}
