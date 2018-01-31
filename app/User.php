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
        return $this->hasMany(\App\Model\Post::class, 'user_id', 'id');
    }

    /**
     * 关注我的,那么我的id就会存在Fan表里,跟star_id相对应,所以star_id就是外键(别人关注我的,在别人那里显示的是关注);
     * 所以这里返回的应该是粉丝数
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fans()
    {
        return $this->hasMany(\App\Model\Fan::class, 'star_id', 'id');
    }

    /**
     * 我关注的,外键就是fan_id,因为我是粉丝,我的id存在Fan表里(我关注别人的,在别人那里显示的是粉丝);
     * 所以这里返回的应该是关注数
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stars()
    {
        return $this->hasMany(\App\Model\Fan::class, 'fan_id', 'id');
    }

    /**
     * 关注某人,说明他是我的star_id
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

    /**
     * 当前用户是否被uid关注了
     * @param $uid
     * @return int
     */
    public function hasFan($uid)
    {
        return $this->fans()->where('fan_id', $uid)->count();
    }

    /**
     * 当前用户是否关注了uid
     * @param $uid
     * @return int
     */
    public function hasStar($uid)
    {
        return $this->stars()->where('star_id', $uid)->count();
    }

    /**
     * 一个用户收到的通知,是多对多的关系
     * 一个用户可以收到多条通知,一个通知可以发送给多个用户
     * @return $this
     */
    public function notices()
    {
        return $this->belongsToMany(\App\Model\Notice::class, 'user_notice', 'user_id', 'notice_id')
                     ->withPivot(['user_id', 'notice_id']);
    }

    /**
     * 给用户增加通知
     * @param $notice
     * @return bool
     */
    public function addNotice($notice)
    {
        return $this->notices()->save($notice);     //如果是删除使用detach
    }
}
