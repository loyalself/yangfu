<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * 多对多的关系
     * 属于这个专题的所有文章
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {   //第三个参数是post_topics表中与当前模型关联的外键,第四个参数是post表里与post_tables表进行关联的外键
        return $this->belongsToMany(Post::class,'post_topics','topic_id','post_id');
    }

    /**
     * 专题的文章数,用于withCount
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postTopics()
    {
        return $this->hasMany(PostTopic::class,'topic_id','id');
    }
}
