<?php

namespace App\Trait;

use App\Models\Comment;

/**
 * Add this trait to your User model so
 * that you can retrieve the comments for a user.
 */
trait Commenter
{
    /**
     * Returns all comments that this user has made.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'article_commenter');
    }


}
