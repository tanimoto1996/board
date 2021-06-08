@extends('layouts.app')

@section('title', '記事一覧')

@include('layouts.navigation')
@section('content')

<link rel="stylesheet" href="{{ asset('css/articles/index.css') }}">
<div class="container">
    @if(Auth::user())
    <div class="create-btn-wrap d-flex justify-content-end">
        <a href="{{ url('/create') }}">
            <button type="button" class="text-right btn btn-primary mt-3">記事投稿</button>
        </a>
    </div>
    @endif

    @foreach($articles as $article)
    <div class="card mt-3">
        <div class="card-body d-flex flex-row justify-content-between">
            <a href="{{ route('users.show', ['id' => $article->user_id]) }}">
                <div class="d-flex">
                    <i class="fas fa-user-circle fa-3x mr-1"></i>
                    <div>
                        <div class="font-weight-bold">
                            {{ $article->user->name }}
                        </div>
                        <div class="font-weight-lighter">
                            {{ $article->created_at->format('Y/m/d H:i') }}
                        </div>
                    </div>
                </div>
            </a>
            @if(Auth::id() === $article->user_id)
            <div class="ml-auto card-text">
                <div class="dropdown">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <button type="button" class="btn btn-link text-muted m-0 p-2">
                            <i class="fas fa-plus"></i>
                        </button>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('articles.edit', ['article' => $article->id]) }}">
                            <i class="fas fa-pen mr-1"></i>記事を更新する
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item text-danger" data-toggle="modal" data-target="">
                            <form class="destroy-form" action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="destroy-btn text-danger"><i class="fas fa-trash-alt mr-1"></i>記事を削除する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="card-body pt-0 pb-2">
            <h3 class="h4 card-title">
                {{ $article->title }}
            </h3>
            <div class="card-text">
                {{ $article->body }}
            </div>
        </div>
    </div>
    @endforeach
    <div class="page-wrap">
        {{ $articles->links() }}
    </div>
</div>
<script src="{{ asset('js/articles/index.js') }}"></script>
@endsection