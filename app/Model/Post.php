<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //可以赋值的属性
    //protected $fillable = ['title','content'];

    //不可以注入的字段
    protected $guarded = [];

    /**
     * User Relationships
     * One to One (one post to one user)inverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Comment Relationships
     * One To Many(one post to many comments)
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Model\Comment')->orderBy('created_at','desc');
    }

    /**
     * One To One(One post One user One zan)
     * @param $user_id
     */
    public function zan($user_id)
    {        //文章表                赞表                用户id
        return $this->hasOne(Zan::class)->where('user_id',$user_id);
    }

    /**
     * All the praise of an article
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zans()
    {
        return $this->hasMany(Zan::class);
    }
    /**
     * 属于某个作者的文章
     * @param Builder $query
     * @param $user_id
     * @return mixed
     */
    public function scopeAuthorBy(Builder $query,$user_id)
    {
        return $query->where('user_id',$user_id);
    }

    public function postTopics()
    {
        return $this->hasMany(\App\Model\PostTopic::class,'post_id','id');
    }

    /**
     * 不属于某个专题的文章
     * @param Builder $query
     * @param $topic_id
     * @return mixed
     */
    public function scopeTopicNotBy(Builder $query,$topic_id)
    {
        return $query->doesntHave('postTopics','and',function($q) use($topic_id){
            $q->where('topic_id',$topic_id);
        });
    }
    /**
     * Laravel软删除，使用全局scope进行软删除模型:
     * 当posts表中的status为-1时,页面上将不会显示该文章
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('available',function(Builder $builder){
            $builder->whereIn('status',[0,1]);
        });
    }
    
}
