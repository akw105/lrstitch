@php
    /** @var \WebDevEtc\BlogEtc\Models\Post $post */
@endphp
@foreach($post->categories as $category)
    <a href="{{ $category->url() }}" class="post-category category-{{ $category->category_name }}">{{ $category->category_name }}</a>
@endforeach

<h1 class="post-title">{{$post->title}}</h1>
<div class="author-date">
    by
    <a class="h6 post__author-name fn" href="#">Stitchtrove Admin</a>
    <div class="post__date">
        <time class="published" datetime="{{ $post->posted_at }}">
            -  {{ $post->posted_at->diffForHumans() }}
        </time>
    </div>
</div>
<div class="post-thumb">
    {!! $post->imageTag('medium', false, 'd-block mx-auto ') !!}
</div>
<div class="post-content-wrap">
    {!! $post->renderBody() !!}

    {{--@if(config("blogetc.use_custom_view_files")  && $post->use_view_file)--}}
    {{--                                // use a custom blade file for the output of those blog post--}}
    {{--   @include("blogetc::partials.use_view_file")--}}
    {{--@else--}}
    {{--   {!! $post->post_body !!}        // unsafe, echoing the plain html/js--}}
    {{--   {{ $post->post_body }}          // for safe escaping --}}
    {{--@endif--}}
</div>


