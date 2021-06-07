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
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        
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

    // 記事削除
    public function destroy(Article $article) {
        $article->delete();
        return redirect()->route("articles.index");
    }

    // 記事編集画面に遷移
    public function edit(Article $article) {
        return view("articles.edit", ["article" => $article]);
    }

    // 記事編集
    public function update(ArticleRequeat $request, Article $article) {
        $article->fill($request->all());
        $article->update();
        return redirect()->route("articles.index");
    }
}
