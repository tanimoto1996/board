<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequeat;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // 一覧画面の処理
    public function index() {
        $articles = Article::all()->sortByDesc('created_at');
        return view("articles.index", ["articles" => $articles]);
    }

    // 投稿画面に遷移処理
    public function create() {
        return view("articles.create");
    }

    // 記事投稿
    public function store(ArticleRequeat $request, Article $article) {
        // ArticleRequeatでfillを指定している。
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();

        return redirect()->route("articles.index");
    }
}
