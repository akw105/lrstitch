<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? ''}} Stitchtrove</title>
    <meta name="description" content="{{$description ?? ''}}" />

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@stitchtrove">
    <meta name="twitter:title" content="{{$seotitle ?? 'Stitchtrove | Stash inventory for cross stitchers'}}">
    <meta name="twitter:description" content="{{$seodescription ?? ''}}">
    <meta name="twitter:creator" content="@stitchtrove">
    <!-- Twitter Summary card images must be at least 120x120px -->
    <meta name="twitter:image" content="/img/socials/twitter-image.jpg"> 

    <!-- Open Graph data -->
    <meta property="og:title" content="{{$seotitle ?? 'Stitchtrove | Stash inventory for cross stitchers'}}" />
    <meta property="og:url" content="/" />
    <meta property="og:image" content="/img/opengraph-image.jpg" />
    <meta property="og:description" content="{{$seodescription ?? ''}}" />
    <meta property="og:site_name" content="Stitchtrove" />
    <meta property="fb:admins" content="Facebook numberic ID" /> 
    <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script>
    {!!\WebDevEtc\BlogEtc\Helpers::rss_html_tag()!!}
</head>
<body id="{{$bodyid ?? ''}}">
    @auth
    @if(Auth::user()->id == '1')
        @include('includes.adminbar')
    @endif
    @endauth
    <div id="app">
        <header class="header" id="site-header">
            <div class="page-title">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/stitchtrove-logo.png" alt="StitchTrove"/>
                </a>
            </div>
            <div class="header-content-wrapper">
        {{-- <x-notification description="plaeholder"/> --}}

        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
							<a href="/" class="nav-link">Home</a>
                        </li>
                         <li class="nav-item">
							<a href="/blog" class="nav-link">Site News</a>
                        </li>
                        {{--
                        <li class="nav-item">
							<a href="/features" class="nav-link">Features</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link" title="Coming soon"><strike>Forum</strike></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" title="Coming soon"><strike>Shop</strike></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" title="Coming soon"><strike>Projects</strike></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" title="Coming soon"><strike>Learn</strike></a>
                        </li> --}}
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/profile/{{Auth::user()->name}}">My Profile</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
            </div>
        </header>
        <main class="py-4">
            @if (Session::has('message'))
            <div class="flash alert-info">
              <p class="panel-body">
                {{ Session::get('message') }}
              </p>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="flash alert-success">
              <p class="panel-body">
                {{ Session::get('success') }}
              </p>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="flash alert-error">
              <p class="panel-body">
                {{ Session::get('error') }}
              </p>
            </div>
            @endif
            @if ($errors->any())
            <div class='flash alert-danger'>
              <ul class="panel-body">
                @foreach ( $errors->all() as $error )
                <li>
                  {{ $error }}
                </li>
                @endforeach
              </ul>
            </div>
            @endif
      
            @yield('content')
        </main>
        @include('includes.footer')
    </div>
    @yield('scripts')
    @include('kustomer::kustomer')
</body>
</html>
