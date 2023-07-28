<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $model = Article::findOrFail($request->article_id);
        $comment = new Comment();
        /** TODO :: Add 2 lines here to save the article_commenter and article_commentable objects */
        $comment->article_comment = $request->message;
        $comment->save();
        return $this->sendResponse($comment, "Comment Saved", Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update([
            'article_comment' => $request->message,
        ]);
        return $this->sendResponse($comment, "Comment Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return $this->sendResponse([], "Comment Deleted");
    }

    function reply(StoreReplyRequest $request, Comment $comment)
    {
        $reply = new Comment();
        $reply->article_commenter()->associate(Auth::user());
        $reply->article_commentable()->associate($comment->article_commentable);
        /** TODO :: Add a line here to save the parent comment object */
        $reply->article_comment = $request->message;   
        $reply->save(); 
        return $this->sendResponse($reply, "Replied Saved", Response::HTTP_CREATED);
    }
}
