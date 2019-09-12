@extends('frontend.main')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">Blog</a></li>
                      
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Container  -->
    <section class="page-section padding-30">
        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-md-9">
                    <div class="blog-listing">
                        <article>
                            <img class="img-thumbnail" src="{{ asset('onion/img/single-blog.webp') }}">
                            <h2>Post Format Image</h2>
                            <hr class="title-underline">
                            <p>
                               In the last year alone, Getty Images has noticed a spike in interest for pictures that defy tired clichés we’re used to seeing in advertising. Searches for “women leaders,” “real people,” “strong women,” and “diverse women” have more than doubled, with increases of 202%, 192%, 187%, and 168%, respectively....
                            </p>
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> Aug 17, 2016 - 6:53</span>
                                <span><i class="fa fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                                <a href="blog-single-post.html" class="btn btn-xs btn-primary pull-right">Read more...</a>
                            </div>
                        </article>
                        <article class="post-video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="https://player.vimeo.com/video/177466730?color=ffffff&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                            <h2>Post Format - Video</h2>
                            <hr class="title-underline">
                            <p>
                                Last year, Claire Cain Miller from The New York Times tackled another elephant in the room: representation of non-binary and transgender people in stock photography just wasn’t up to par. Sure, there were plenty of photos of the transgender pride symbol, but few showed faces....
                            </p>
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> Aug 17, 2016 - 6:53</span>
                                <span><i class="fa fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                                <a href="blog-single-post.html" class="btn btn-xs btn-primary pull-right">Read more...</a>
                            </div>
                        </article>
                        <article>
                            <iframe width="100%" height="250" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/259883503&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                            <h2>Post Format - Audio</h2>
                            <hr class="title-underline">
                            <p>
                                 To some extent, that’s what it’s all about: giving people what they want. But while Licensing Contributors will often respond to and illustrate topics we see in the news and on social media, it’s never a one-way street....
                            </p>
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> Aug 17, 2016 - 6:53</span>
                                <span><i class="fa fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                                <a href="blog-single-post.html" class="btn btn-xs btn-primary pull-right">Read more...</a>
                            </div>
                        </article>
                        <ul class="pagination pagination-lg">
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                @include('frontend.include.blog-side-widget')
            </div>
        </div>
    </section>
@stop