<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(Article $article, User $user, int $id) {
        $user =  $user->where('id', $id)->first();
        $articles = $article->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);
        return view("users.show", ["articles" => $articles, "id" => $user]);
    }
}
