<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
    <div class="row">
        <div class="col-lg-6">
            <div class="row total_rate">
                <div class="col-6">
                    <div class="box_total">
                        <h5>Overall</h5>
                        <h4>{{ $product->rating ?: 'Null' }}</h4>
                        <h6>({{ $product->reviews()->count() }} Reviews)</h6>
                    </div>
                </div>
                <div class="col-6">
                    <div class="rating_list">
                        <h3>Based on 3 Reviews</h3>
                        <ul class="list">
                            <li>
                                <a href="javascript:void(0)">
                                    5 Star
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    {{ $product->reviewWhere(5)->count() }}
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    4 Star
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    {{ $product->reviewWhere(4)->count() }}
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    3 Star
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    {{ $product->reviewWhere(3)->count() }}
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    2 Star
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    {{ $product->reviewWhere(2)->count() }}
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    1 Star
                                    <i class="fa fa-star"></i>
                                    {{ $product->reviewWhere(1)->count() }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="review_list">
                @if ($product->reviews()->exists())
                    @foreach ($product->reviews()->get() as $review)
                        <div class="review_item">
                            <div class="media">
                                <div class="d-flex">
                                    <img src="{{ $review->author ? $review->author->getPhotoUrl() : '' }}" alt="" width="60px" height="60px">
                                </div>
                                <div class="media-body">
                                    <h4>{{ $review->author ? $review->author->name : 'Deleted' }}</h4>
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <p>
                                {{ $review->text }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <h2>Empty</h2>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="review_box">
                <h4>Add a Review</h4>
                <p>Your Rating:</p>
                <ul class="list">
                    <li><a href="javascript:void(0);" class="star" data-rating="1"><i class="fa fa-star" id="star_1"></i></a></li>
                    <li><a href="javascript:void(0);" class="star" data-rating="2"><i class="fa fa-star" id="star_2"></i></a></li>
                    <li><a href="javascript:void(0);" class="star" data-rating="3"><i class="fa fa-star" id="star_3"></i></a></li>
                    <li><a href="javascript:void(0);" class="star" data-rating="4"><i class="fa fa-star" id="star_4"></i></a></li>
                    <li><a href="javascript:void(0);" class="star" data-rating="5"><i class="fa fa-star" id="star_5"></i></a></li>
                </ul>
                <p>Outstanding</p>
                <form class="row contact_form" action="{{ route('shop.products.review', compact('product')) }}" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="rating" id="rating" value="5">
                            <textarea class="form-control" name="text" id="text" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary-btn">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>