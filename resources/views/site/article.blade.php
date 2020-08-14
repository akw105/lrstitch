@extends('layouts.app')

@section('content')

<section>
	<div class="container">
		<div class="row mt50">
			<div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				<div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post single-post single-post-v3">
				
                        <a href="#" class="post-category bg-primary">STITCHTROVE NEWS</a>
                    
                        <h1 class="post-title">{{ $post->title }}</h1>
                    
                        <div class="author-date">
                            
                            <a class="h6 post__author-name fn" href="#">by Stitchtrove Admin </a>
                            
                            <div class="post__date">
                                <time class="published" datetime="{{ $post->created_at->format('M d,Y \a\t h:i a') }}">
                                     - {{ $post->created_at->format('M d,Y \a\t h:i a') }}
                                </time>
                            </div>
                        </div>
                        <div class="post-thumb">
                            <img src="/img/post-thumb1.jpg" alt="author">
                        </div>
                    
                        <div class="post-content-wrap">
                    
                  
                            <div class="post-content">
                                {!! $post->body !!}
                            </div>
                        </div>
                    
                
                    </article>
					
					<!-- ... end Post -->
				</div>
            </div>

            @include('includes.news-sidebar')


		</div>
	</div>


</section>
@endsection
