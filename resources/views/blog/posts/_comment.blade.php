<div class="comment-list" data-id="{{ $comment->id }}" id="comment_{{ $comment->id }}">
    <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
                <img src="{{ $comment->author ? $comment->author->getPhotoUrl() : '' }}" alt="" width="60px" height="60px">
            </div>
            <div class="desc">
                <h5><a href="#">{{ $comment->author ? $comment->author->name : 'Deleted' }}</a></h5>
                <p class="date">{{ $comment->created_at }}</p>
                <p class="comment">
                    {{ $comment->text }}
                </p>
            </div>
        </div>

        <div class="reply-btn">
            <a href="#" class="btn-reply comment-reply text-uppercase">reply</a>
        </div>
    </div>

    <div class="reply-block"></div>
</div>

@if ($comment->children()->exists())
    @foreach ($comment->children as $child)
        <div class="left-padding">
            @include ('blog.posts._comment', ['comment' => $child])
        </div>
    @endforeach
@endif