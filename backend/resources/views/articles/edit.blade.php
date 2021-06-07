@extends('layouts.app')

@section('title', '記事一覧')

@include('layouts.navigation')
@section('content')
<link rel="stylesheet" href="{{ asset('css/articles/create.css') }}">
<form action="{{ route('articles.update', ['article' => $article->id]) }}" method="post"> 
    @include('articles.form')
</form>
<!-- <script src="{{ asset('js/articles/create.js') }}"></script> -->
@endsection