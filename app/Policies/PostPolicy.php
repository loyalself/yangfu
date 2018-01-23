<?php

namespace App\Policies;

use App\Model\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Update Post Permission
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function update(User $user,Post $post)
    {
        return $user->id == $post->user_id;
    }

    /**
     * Delete Post Permission
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function delete(User $user,Post $post)
    {
        return $user->id == $post->user_id;
    }
}
