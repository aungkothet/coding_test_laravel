<?php

namespace App\Trait;

use App\Models\Comment;

/**
 * Add this trait to any model that you want to be able to
 * comment upon or get comments for.
 */
trait Commentable
{
    /**
     * This static method does voodoo magic to
     * delete leftover comments once the commentable
     * model is deleted.
     */
    protected static function bootArticleCommentable()
    {
        static::deleted(function($article_commentable) {
            foreach ($article_commentable->comments as $comment) {
                $comment->delete();
            }
        });
    }

    /**
     * Returns all comments for this model.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'article_commentable')->whereNull('article_comment_child_id');;
    }

}
