@extends('layouts.app')

@section('title', '記事一覧')

@include('layouts.navigation')
@section('content')

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
        <div class="card-body d-flex flex-row">
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
</div>
<script src="{{ asset('js/articles/index.js') }}"></script>
@endsection