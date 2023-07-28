<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'article_comment_id';

    protected $table = "MY_ARTICLE_COMMENT";

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'article_commenter',
        'replies'
    ];
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_comment',
    ];


    public function article_commenter()
    {
        return $this->morphTo();
    }

    /**
     * The model that was commented upon.
     */
    public function article_commentable()
    {
        return $this->morphTo();
       
    }

    /**
     * Returns all comments that this comment is the parent of.
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'article_comment_child_id');
    }

    /**
     * Returns the comment to which this comment belongs to.
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'article_comment_child_id');
    }

}
