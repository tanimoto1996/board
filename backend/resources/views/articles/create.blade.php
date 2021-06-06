@extends('layouts.app')

@section('title', '記事一覧')

@include('layouts.navigation')
@section('content')
<link rel="stylesheet" href="{{ asset('css/articles/create.css') }}">
<div class="form"></div>
<form action="{{ route('articles.store') }}" method="post"> 
    @csrf
    <input name="title" type="text" class="feedback-input" placeholder="タイトル" />
    <textarea name="body" class="feedback-input" placeholder="コメント"></textarea>
    <input type="submit" value="送信" />
</form>
<!-- <script src="{{ asset('js/articles/create.js') }}"></script> -->
@endsection