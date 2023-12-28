<?php

namespace App\Policies;

use App\Models\CommentReply;
use App\Models\User;

class CommentReplyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, CommentReply $reply)
    {
        return $user->id === $reply->user_id;
    }

    public function delete(User $user, CommentReply $reply)
    {
        return $user->id === $reply->user_id;
    }
}
