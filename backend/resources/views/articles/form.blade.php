@csrf
<input name="title" type="text" class="feedback-input" placeholder="タイトル" value="{{ $article->title ?? old('title') }}"/>
<textarea name="body" class="feedback-input" placeholder="コメント">{{ $article->body ?? old('body') }}</textarea>
<input type="submit" value="送信" />