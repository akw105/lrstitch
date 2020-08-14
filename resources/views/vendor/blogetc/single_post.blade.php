@extends("layouts.app",['title'=>$post->genSeoTitle()])
@section("content")
    {{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}
    <div class="container">
        <div class="row mt50">
            <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="hentry blog-post single-post single-post-v3">
                    @include("blogetc::partials.show_errors")
                    @include("blogetc::partials.full_post_details")

                    @if(config("blogetc.comments.type_of_comments_to_show","built_in") !== 'disabled')
                        <div id="maincommentscontainer">
                            <h2 class="text-center" id="blogetccomments">Comments</h2>
                            @include("blogetc::partials.show_comments")
                        </div>
                    @endif
                    </div>
                </div>
            </div>
                @include('includes.news-sidebar')
        </div>
    </div>
@endsection

