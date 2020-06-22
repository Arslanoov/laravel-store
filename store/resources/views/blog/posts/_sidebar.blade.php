<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <div class="input-group">
                <form action="{{ route('blog.posts.search') }}" method="GET">
                    <input type="text" class="form-control" placeholder="Search Posts" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" name="q">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                </span>
                </form>
            </div><!-- /input-group -->
            <div class="br"></div>
        </aside>

        <aside class="single_sidebar_widget ads_widget">
            <a href="#"><img class="img-fluid" src="/img/blog/add.jpg" alt=""></a>
            <div class="br"></div>
        </aside>

        {{ Widget::run(\App\Widget\Blog\CategoriesWidget::class) }}

        {{ Widget::run(\App\Widget\Blog\TagsWidget::class) }}

        <aside class="single-sidebar-widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>
            <p>
                Here, I focus on a range of items and features that we use in life without
                giving them a second thought.
            </p>
            <div class="form-group d-flex flex-row">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                </div>
                <a href="#" class="bbtns">Subcribe</a>
            </div>
            <p class="text-bottom">You can unsubscribe at any time</p>
            <div class="br"></div>
        </aside>
    </div>
</div>