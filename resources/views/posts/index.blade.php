@extends('layouts.blog')

@section('body')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            <i class="fas fa-journal-whills"></i> Articles
        </h3>

        @foreach($posts as $post)
            <div class="blog-post card shadow mb-4 mt-6">
                <div class="blog-post-tag">
                    <img src="{{ url("images/laravel.png") }}" class="img-circle" alt="laravel">
                </div>

                <div class="card-body">
                    <h2 class="blog-post-title">{{ $post->title }}</h2>

                    <p class="blog-post-meta">
                        <i class="fas fa-calendar"></i> January 1, 2014 by <a href="#"><i class="fas fa-user"></i> Mark</a>
                    </p>

                    <div class="card-text">
                        {{ $post->content }}

                        <div class="text-right">
                            <a href="#" class="btn btn-sm btn-primary">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="card-footer post-blog-footer">
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">
                            <img src="{{ url("images/vuejs.svg") }}" class="img-circle img-to-icon" alt="Vuejs"> VueJs
                        </li>
                        <li class="list-group-item">
                            <img src="{{ url("images/laravel.png") }}" class="img-circle img-to-icon" alt="laravel"> Laravel
                        </li>
                    </ul>

                    <p class="card-text text-right"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        @endforeach


        <div class="blog-post card shadow mb-4 mt-6">
            <div class="blog-post-tag">
                <img src="{{ url("images/vuejs.svg") }}" class="img-circle" alt="Vuejs">
            </div>

            <div class="card-body">
                <h2 class="blog-post-title">Post de démonstration</h2>

                <p class="blog-post-meta">
                    <i class="fas fa-calendar"></i> January 1, 2014 by <a href="#"><i class="fas fa-user"></i> Mark</a>
                </p>

                <div class="card-text">
                    <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
                        typography, images, and code are all supported.</p>
                    <hr>
                    <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus.
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur
                        est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                    <blockquote>
                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu
                            leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </blockquote>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                        fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    <h2>Heading</h2>
                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo
                        luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                    <h3>Sub-heading</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <pre><code>Example code block</code></pre>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce
                        dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                    <h3>Sub-heading</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia
                        bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac
                        cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <ul>
                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                        <li>Donec id elit non mi porta gravida at eget metus.</li>
                        <li>Nulla vitae elit libero, a pharetra augue.</li>
                    </ul>
                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                    <ol>
                        <li>Vestibulum id ligula porta felis euismod semper.</li>
                        <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                        <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                    </ol>
                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>

                    <div class="text-right">
                        <a href="#" class="btn btn-sm btn-primary">Read more</a>
                    </div>
                </div>
            </div>

            <div class="card-footer post-blog-footer">
                <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item">
                        <img src="{{ url("images/vuejs.svg") }}" class="img-circle img-to-icon" alt="Vuejs"> VueJs
                    </li>
                    <li class="list-group-item">
                        <img src="{{ url("images/laravel.png") }}" class="img-circle img-to-icon" alt="laravel"> Laravel
                    </li>
                </ul>

                <p class="card-text text-right"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>

        <div class="blog-post card shadow mb-4 mt-6">
            <div class="blog-post-tag">
                <img src="{{ url("images/vuejs.svg") }}" class="img-circle" alt="Laravel">
            </div>

            <div class="card-body">
                <h2 class="blog-post-title">Post de démonstration</h2>

                <p class="blog-post-meta">
                    <i class="fas fa-calendar"></i> January 1, 2014 by <a href="#"><i class="fas fa-user"></i> Mark</a>
                </p>

                <div class="card-text">
                    <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
                        typography, images, and code are all supported.</p>
                    <hr>
                    <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus.
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur
                        est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                    <blockquote>
                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu
                            leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </blockquote>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                        fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    <h2>Heading</h2>
                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo
                        luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                    <h3>Sub-heading</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <pre><code>Example code block</code></pre>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce
                        dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                    <h3>Sub-heading</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia
                        bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac
                        cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <ul>
                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                        <li>Donec id elit non mi porta gravida at eget metus.</li>
                        <li>Nulla vitae elit libero, a pharetra augue.</li>
                    </ul>
                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                    <ol>
                        <li>Vestibulum id ligula porta felis euismod semper.</li>
                        <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                        <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                    </ol>
                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>

                    <div class="text-right">
                        <a href="#" class="btn btn-sm btn-primary">Read more</a>
                    </div>
                </div>
            </div>

            <div class="card-footer post-blog-footer">
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        </nav>

    </div>

@endsection