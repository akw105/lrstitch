@extends('layouts.app')

@section('content')

<section class="blog-post-wrap medium-padding80">
	<div class="container">
		<div class="row">
            @foreach( $posts as $post )
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="ui-block">

                    <!-- Post -->
                    
					
					<article class="hentry blog-post">
					
						<div class="post-thumb">
							<img src="/img/post5.jpg" alt="photo">
						</div>
					
						<div class="post-content">
							<a href="{{ url('/site-news/'.$post->slug) }}" class="h4 post-title">{{ $post->title }}</a>
							<p>{!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}</p>
					
							<div class="author-date">
								by
								<a class="h6 post__author-name fn" href="#">Stitchtrove Admin</a>
								<div class="post__date">
									<time class="published" datetime="{{ $post->created_at->format('M d,Y \a\t h:i a') }}">
										- {{ $post->created_at->format('M d,Y \a\t h:i a') }}
									</time>
								</div>
							</div>
				
						</div>
					
					</article>
					
					<!-- ... end Post -->
				</div>
            </div>
            @endforeach
		</div>
	</div>


</section>
@endsection
