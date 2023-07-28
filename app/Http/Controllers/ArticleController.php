<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $category = ($request->category) ?: "article";
        $perPage = ($request->per_page) ?: 5;
        $articles = Article::with('comments')->where('category', $category)->paginate($perPage);
        return $this->sendResponse($articles, 'Article Data');
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'content' => $request->content,
            'category' => $request->category,
            'article_creation_datetime' => now(),
            'article_update_datetime' => now()
        ]);
        return $this->sendResponse($article, 'Article Created', Response::HTTP_CREATED);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'content' => $request->content,
            'category' => $request->category,
            'article_update_datetime' => now()
        ]);
        return $this->sendResponse($article, 'Article Updated');
    }
}
