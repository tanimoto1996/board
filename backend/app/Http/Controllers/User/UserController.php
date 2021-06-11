<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(Article $article, User $user, int $id) {
        $user =  $user->where('id', $id)->first();
        $articles = $article->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);
        return view("users.show", ["articles" => $articles, "id" => $user]);
    }

    public function userEdit(User $user, int $id) {
        $user= $user->where('id', $id)->first();
        return view('users.edit', ["user" => $user]);
    }

    public function userUpdate(Request $request, User $user, int $id) {
        $user= $user->where('id', $id)->first();
        $uploadFile = $request->file('thumbnail');

        if(!empty($uploadFile)) {
            $thumbnailName = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->storeAs('public/user', $thumbnailName);

            $param = [
                'name'=>$request->name,
                'thumbnail'=>$thumbnailName,
                'comment'=>$request->comment
            ];
        } else {
            $param = [
                'name'=>$request->name,
                'comment'=>$request->comment,
            ];
        }

        User::where('id', $user->id)->update($param);
        return redirect(route('users.edit', ['id' => $user->id]))->with('success', '保存しました。');
    }
}
