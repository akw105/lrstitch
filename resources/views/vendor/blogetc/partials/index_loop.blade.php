@php
    /** @var \WebDevEtc\BlogEtc\Models\Post $post */
@endphp
{{--Used on the index page (so shows a small summary--}}
{{--See the guide on webdevetc.com for how to copy these files to your /resources/views/ directory--}}
{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="ui-block">
        <div class="hentry blog-post">
            <div class="post-thumb">
                {!! $post->imageTag('medium', true, '') !!}
            </div>
            <div class="post-content">
                @foreach($post->categories as $category)
                    <a href="{{ $category->url() }}" class="post-category category-{{ $category->category_name }}">{{ $category->category_name }}</a>
                @endforeach
                <a href="{{$post->url()}}" class="h4 post-title">{{$post->title}}</a>
                <p>{{$post->subtitle}}</p>

                <div class="author-date">
                    by
                    <a class="h6 post__author-name fn" href="#">Stitchtrove Admin</a>
                    <div class="post__date">
                        <time class="published" datetime="{{ $post->posted_at }}">
                            - {{ $post->posted_at->diffForHumans() }}
                        </time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

