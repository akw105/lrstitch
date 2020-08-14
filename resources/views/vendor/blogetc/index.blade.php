@extends("layouts.app",['title'=>$title])
@section("content")
<div class="blog-post-wrap medium-padding80">
    <div class="container">
    <div class="row">

            @if(isset($blogetc_category) && $blogetc_category)
                <h2 class="text-center">
                    Viewing Category: {{$blogetc_category->category_name}}
                </h2>
                @if($blogetc_category->category_description)
                    <p class="text-center">{{$blogetc_category->category_description}}</p>
                @endif
            @endif

            @forelse($posts as $post)
                @include("blogetc::partials.index_loop")
            @empty
                <div class="alert alert-danger">No posts</div>
            @endforelse

            <div class="text-center col-sm-4 mx-auto">
                {{$posts->appends( [] )->links()}}
            </div>
            @include("blogetc::sitewide.search_form")
        </div>
</div>
</div>
@endsection
