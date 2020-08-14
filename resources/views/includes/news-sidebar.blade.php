<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
    <aside>
        <div class="ui-block">
            <div class="ui-block-title">
                <ul class="nav">
                    {{-- TODO replace with repo--}}
                    @foreach(\WebDevEtc\BlogEtc\Models\Category::orderBy('category_name')->limit(200)->get() as $category)
                        <li class="nav-item">
                            <a class="nav-link post-category category-{{ $category->category_name }}" href="{{ $category->url() }}">{{ $category->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="ui-block">

            <!-- Post -->
            
            <article class="hentry blog-post blog-post-v3 featured-post-item">
            
                <div class="post-thumb">
                    <img src="/img/post13.jpg" alt="photo">
                    <a href="#" class="post-category bg-purple">INSPIRATION</a>
                </div>
            
                <div class="post-content">
            
                    <div class="author-date">
                        by
                        <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                        <div class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                - 5 MONTHS ago
                            </time>
                        </div>
                    </div>
            
                    <a href="#" class="h4 post-title">We went lookhunting in all the California bay area</a>
            
                    <div class="post-additional-info inline-items">
            
                        <div class="friends-harmonic-wrap">
                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat26.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat27.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat2.png" alt="icon">
                                    </a>
                                </li>
                            </ul>
                            <div class="names-people-likes">
                                206
                            </div>
                        </div>
            
                        <div class="comments-shared">
                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-speech-balloon-icon">
                                    <use xlink:href="#olymp-speech-balloon-icon"></use>
                                </svg>
                                <span>97</span>
                            </a>
                        </div>
            
                    </div>
                </div>
            
            </article>
            
            <!-- ... end Post -->

        </div>

        <div class="ui-block">

            <!-- Post -->
            
            <article class="hentry blog-post blog-post-v3 featured-post-item">
            
                <div class="post-thumb">
                    <img src="/img/post14.jpg" alt="photo">
                    <a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
                </div>
            
                <div class="post-content">
            
                    <div class="author-date">
                        by
                        <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                        <div class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                - 2 MONTHS ago
                            </time>
                        </div>
                    </div>
            
                    <a href="#" class="h4 post-title">We went lookhunting in all the California bay area</a>
            
                    <div class="post-additional-info inline-items">
            
                        <div class="friends-harmonic-wrap">
                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat6.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat7.png" alt="icon">
                                    </a>
                                </li>
                            </ul>
                            <div class="names-people-likes">
                                37
                            </div>
                        </div>
            
                        <div class="comments-shared">
                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-speech-balloon-icon">
                                    <use xlink:href="#olymp-speech-balloon-icon"></use>
                                </svg>
                                <span>62</span>
                            </a>
                        </div>
            
                    </div>
                </div>
            
            </article>
            
            <!-- ... end Post -->

        </div>

        <div class="ui-block">

            <!-- Post -->
            
            <article class="hentry blog-post blog-post-v3 featured-post-item">
            
                <div class="post-thumb">
                    <img src="/img/post15.jpg" alt="photo">
                    <a href="#" class="post-category bg-purple">INSPIRATION</a>
                </div>
            
                <div class="post-content">
            
                    <div class="author-date">
                        by
                        <a class="h6 post__author-name fn" href="#">MADDY SIMMONS </a>
                        <div class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                - 3 MONTHS ago
                            </time>
                        </div>
                    </div>
            
                    <a href="#" class="h4 post-title">Check out this 10 yummy breakfast recipes</a>
            
                    <div class="post-additional-info inline-items">
            
                        <div class="friends-harmonic-wrap">
                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat20.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat11.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat9.png" alt="icon">
                                    </a>
                                </li>
                            </ul>
                            <div class="names-people-likes">
                                88
                            </div>
                        </div>
            
                        <div class="comments-shared">
                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-speech-balloon-icon">
                                    <use xlink:href="#olymp-speech-balloon-icon"></use>
                                </svg>
                                <span>39</span>
                            </a>
                        </div>
            
                    </div>
                </div>
            
            </article>
            
            <!-- ... end Post -->
        </div>

        <div class="ui-block">

            <!-- Post -->
            
            <article class="hentry blog-post blog-post-v3 featured-post-item">
            
                <div class="post-thumb">
                    <img src="/img/post16.jpg" alt="photo">
                    <a href="#" class="post-category bg-primary">OLYMPUS NEWS</a>
                </div>
            
                <div class="post-content">
            
                    <div class="author-date">
                        by
                        <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                        <div class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                - 6 MONTHS ago
                            </time>
                        </div>
                    </div>
            
                    <a href="#" class="h4 post-title">We optimized the Olympus App for better navigation</a>
            
                    <div class="post-additional-info inline-items">
            
                        <div class="friends-harmonic-wrap">
                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat1.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat26.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/icon-chat27.png" alt="icon">
                                    </a>
                                </li>
                            </ul>
                            <div class="names-people-likes">
                                93
                            </div>
                        </div>
            
                        <div class="comments-shared">
                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-speech-balloon-icon">
                                    <use xlink:href="#olymp-speech-balloon-icon"></use>
                                </svg>
                                <span>105</span>
                            </a>
                        </div>
            
                    </div>
                </div>
            
            </article>
            
            <!-- ... end Post -->

        </div>

    </aside>
</div>