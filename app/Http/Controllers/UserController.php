<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function seeting()
    {
        return view('user.seeting');
    }

    public function seetingStore()
    {
        
    }

    /**
     * 个人介绍页面[Personl Introduce]
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        //当前用户的信息    关注/粉丝/文章数
        $user = User::withCount(['stars','fans','posts'])->find($user->id);

        //当前用户的文章列表,这里根据创建时间排序取最新创建的10条
        $posts = $user->posts()->orderBy('created_at','desc')->take(10)->get();

        //当前用户关注的别人  包含关注用户的  关注/粉丝/文章数
        $stars = $user->stars;
        $susers = User::whereIn('id',$stars->pluck('star_id'))->withCount(['stars','fans','posts'])->get();

        //当前用户的粉丝    包含粉丝的  关注/粉丝/文章数
        $fans = $user->fans;
        $fusers = User::whereIn('id',$fans->pluck('fan_id'))->withCount(['stars','fans','posts'])->get();
        return view('user.show',compact('user','posts','susers','fusers'));
    }

    /**
     * 关注用户
     * @param User $user  别人的用户信息
     * @return array
     */
    public function fan(User $user)
    {
        $me = \Auth::user();
        $me->doFan($user->id);
        return ['error'=>0,'msg'=>''];
    }

    /**
     * 取消关注
     * @param User $user
     * @return array
     */
    public function unfan(User $user)
    {
        $me = \Auth::user();
        $me->doUnFan($user->id);
        return ['error'=>0,'msg'=>''];
    }
}
