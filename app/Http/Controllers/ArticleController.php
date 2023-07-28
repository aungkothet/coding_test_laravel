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
        /** TODO :: Add logic here to get all articles */
        
        return $this->sendResponse($articles, 'Article Data');
    }

    public function store(ArticleRequest $request)
    {
        /** TODO :: Add logic here to create article data */
        return $this->sendResponse($article, 'Article Created', Response::HTTP_CREATED);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        /** TODO :: Add logic here to update article data */
        return $this->sendResponse($article, 'Article Updated');
    }

    /** TODO :: create one more api for article delete. */
}
