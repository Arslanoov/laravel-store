<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="row">
        <div class="col-lg-6">
            <div class="comment_list" id="comments">
                @if ($product->comments()->exists())
                    @foreach ($product->comments()->get() as $comment)

                        @include ('shop.products.single._comment', compact('comment'))

                    @endforeach
                @else
                    <h2>Empty</h2>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="review_box">
                <h4>Post a comment</h4>
                @guest
                    <p>You must be logged in to leave a comment</p>
                @else
                    <form class="row contact_form" action="{{ route('shop.products.comment', compact('product')) }}" method="POST" novalidate="novalidate">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="parent">Parent:</label> <span id="parent_comment">Empty</span>
                                <input type="hidden" id="parent" name="parent">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="text" id="text" rows="1" placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                        </div>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</div>