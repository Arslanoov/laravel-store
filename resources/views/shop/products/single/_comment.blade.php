<div class="review_item" data-id="{{ $comment->id }}" data-title="{{ Str::limit($comment->text, 10) }}">
    <div class="media">
        <div class="d-flex">
            <img src="{{ $comment->author ? $comment->author->getPhotoUrl() : '' }}" alt="" width="60px" height="60px">
        </div>
        <div class="media-body">
            <h4>{{ $comment->author ? $comment->author->name : 'Deleted' }}</h4>
            <h5>{{ $comment->created_at }}</h5>
            <a class="reply_btn" href="javascript:void(0)">Reply</a>
        </div>
    </div>
    <p>
        {{ $comment->text }}
    </p>
</div>

@if ($comment->children()->exists())
    @foreach ($comment->children as $child)
        <div class="left-padding">
            @include ('shop.products.single._comment', ['comment' => $child])
        </div>
    @endforeach
@endif