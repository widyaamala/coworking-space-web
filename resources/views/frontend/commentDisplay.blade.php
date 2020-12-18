@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->comment }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('post-comment') }}">
            @csrf
            <div class="form-group">
				<input type="hidden" name="user_id" value="{{Auth()->user()?Auth()->user()->id:''}}" />
				<input type="hidden" name="event_starter_id" value="{{$eventStarter->id}}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                <input type="text" name="comment" class="form-control" />

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('frontend.commentDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
