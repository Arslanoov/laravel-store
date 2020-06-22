<div class="comments-area" id="comments">
    <h4>{{ $post->comments }} Comments</h4>

    @foreach ($post->commentsList as $comment)
        @include ('blog.posts._comment', $comment)
    @endforeach
</div>

@guest
    <p>You must be logged in to leave a comment</p>
@else
    <div class="comment-form" id="reply-block">
        <h4>Leave a Reply</h4>
        <form method="POST" action="{{ route('blog.posts.comment', $post) }}">
            @csrf

            <div class="form-group">
                <input type="hidden" id="parent" name="parent">
                <textarea class="form-control mb-10" rows="5" name="text" id="text" placeholder="Write Your message.."></textarea>
            </div>

            <input type="submit" class="primary-btn submit_btn" value="Post Comment">
        </form>
    </div>
@endguest

@section ('script')
    <script>
        $(document).on("click", "#comments .reply-btn", function () {
            let link = $(this);
            let form = $("#reply-block");
            let comment = link.closest(".comment-list");
            $("#parent").val(comment.data("id"));
            form.detach().appendTo(comment.find(".reply-block:first"));
            return false;
        });
    </script>
@endsection