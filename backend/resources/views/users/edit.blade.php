@extends('layouts.app')

@section('title', '記事一覧')

@include('layouts.navigation')
@section('content')
<link rel="stylesheet" href="{{ asset('css/users/edit.css') }}">
<div class="container">
    @if (session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="topWrapper">
        @if(!empty($user->thumbnail))
            <img src="/storage/user/{{ $user->thumbnail }}" class="editThumbnail">
        @else
        画像なし
        @endif
    </div>

    <form method="post" action="{{ route('users.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_id" value="{{ $user->id }}">
        @if($errors->has('user_id'))<div class="error">{{ $errors->first('user_id') }}</div>@endif

        <div class="labelTitle">Name</div>
        <div>
            <input type="text" class="userForm" name="name" placeholder="User" value="{{ $user->name }}">
            @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
        </div>

        <div class="labelTitle">Thumbnail</div>

        <div>
            <input type="file" name="thumbnail">
        </div>

        <div class="buttonSet">
            <input type="submit" name="send" value="ユーザー変更" class="btn btn-primary btn-sm btn-done">
            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">戻る</a>
        </div>
    </form>
</div>
<!-- <script src="{{ asset('js/users/show.js') }}"></script> -->
@endsection