<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Cyril Tonneville">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Playground') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('style')

</head>
<body>
    <div class="container" id="app">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
    {{--                <a class="text-muted" href="#">Subscribe</a>--}}
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo" href="{{ route('home') }}">{{ config('app.name', 'Playground') }}</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
{{--                    <a class="text-muted" href="#">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"--}}
{{--                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"--}}
{{--                             viewBox="0 0 24 24" focusable="false"><title>Search</title>--}}
{{--                            <circle cx="10.5" cy="10.5" r="7.5"></circle>--}}
{{--                            <path d="M21 21l-5.2-5.2"></path>--}}
{{--                        </svg>--}}
{{--                    </a>--}}

                    @guest
                        @if (Route::has('register'))
                            <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                        @endif

                        <a class="btn btn-sm btn-outline-primary" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-users-cog"></i> {{ Auth::user()->pseudo }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('admin') }}" class="dropdown-item">
                                    Administration
                                </a>
                                <hr />
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 btn btn-light" href="#"><img src="{{ url("images/tags/css3.png") }}" alt="" class="img-to-icon"> CSS</a>
                <a class="p-2 btn btn-light" href="#"><img src="{{ url("images/tags/laravel.png") }}" alt="" class="img-to-icon"> Laravel</a>
                <a class="p-2 btn btn-light" href="#"><img src="{{ url("images/tags/mysql.png") }}" alt="" class="img-to-icon"> MySql</a>
                <a class="p-2 btn btn-light" href="#"><img src="{{ url("images/tags/symfony.png") }}" alt="" class="img-to-icon"> Symfony</a>
                <a class="p-2 btn btn-light" href="#"><img src="{{ url("images/tags/vagrant.png") }}" alt="" class="img-to-icon"> Vagrant</a>
                <a class="p-2 btn btn-light" href="#"><img src="{{ url("images/tags/vue.png") }}" alt="" class="img-to-icon"> VueJs</a>
                <a class="p-2 btn btn-light" href="#"><img src="{{ url("images/tags/webpack.png") }}" alt="" class="img-to-icon"> Webpack</a>
            </nav>
        </div>

        <div class="row mb-2 mt-4">
            <div class="col-md-6">
                <div class="blog-post card shadow mb-2 mt-4">
                    <a class="blog-post-pin" href="#">
                        <i class="fab fa-galactic-senate fa-rotate-180 fa-3x"></i>
                    </a>

                    <div class="blog-post-tag-sm">
                        <img src="{{ url("images/tags/laravel.png") }}" class="img-circle" alt="laravel">
                    </div>

                    <div class="card-body">
                        <h3 class="blog-post-title">Post épinglé</h3>

                        <p class="blog-post-meta">
                            <i class="fas fa-calendar"></i> January 1, 2014 by <a href="#"><i class="fas fa-user"></i> Mark</a>
                        </p>

                        <div class="card-text">
                            <p class="card-text mb-auto">
                                This is a wider card with supporting text below as a natural lead-in to
                                additional content.</p>

                            <div class="text-right">
                                <a href="#" class="btn btn-sm btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="blog-post card shadow mb-2 mt-4">
                    <a class="blog-post-pin" href="#">
                        <i class="fab fa-galactic-senate fa-rotate-180 fa-3x"></i>
                    </a>

                    <div class="blog-post-tag-sm">
                        <img src="{{ url("images/tags/css3.png") }}" class="img-circle" alt="css">
                    </div>

                    <div class="card-body">
                        <h3 class="blog-post-title">Post épinglé</h3>

                        <p class="blog-post-meta">
                            <i class="fas fa-calendar"></i> January 1, 2014 by <a href="#"><i class="fas fa-user"></i> Mark</a>
                        </p>

                        <div class="card-text">
                            <p class="card-text mb-auto">
                                This is a wider card with supporting text below as a natural lead-in to
                                additional content.</p>

                            <div class="text-right">
                                <a href="#" class="btn btn-sm btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main role="main" class="container mt-4">
        <div class="row">
            @yield('body')

            <aside class="col-md blog-sidebar">
                <div class="pl-3 pr-3 mb-4">
                    <h3 class="pb-3 mb-4 font-italic border-bottom"><i class="fab fa-galactic-republic"></i> About</h3>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus
                        sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>

                <div class="pl-3 pr-3 mb-4">
                    <h3 class="pb-3 mb-4 font-italic border-bottom">Archives</h3>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>

                <div class="pl-3 pr-3 mb-4">
                    <h3 class="pb-3 mb-4 font-italic border-bottom"><i class="fab fa-jedi-order"></i> Elsewhere</h3>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.
        </p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
@yield('script')
</body>
</html>