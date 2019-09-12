@extends('frontend.main')    

@section('content')
    <!-- Hero Header -->
    
    <?php $slider = \App\Http\Controllers\CoreModules\Slider\SliderModel::where('is_active', 'yes')->inRandomOrder()->take(1)->get(); 
    ?>
    @foreach($slider as $s)
        @if(strpos($s->mime, 'video') !== false)
            <style type="text/css">
                .heropanel--video {
                   font-family: 'Open Sans', sans-serif;
                   min-height:580px;
                }
                @keyframes gm-slidein {
                   from {
                       -webkit-transform:translate3d(0,-100%,0);
                       opacity:0;
                       transform:translate3d(0,-100%,0);
                   }
                    
                   to {
                       -webkit-transform:none;
                       opacity:1;
                       transform:none;
                   }
                }

                .heropanel__content {
                   -moz-animation:gm-slidein 3s 1;
                   -ms-animation:gm-slidein 3s 1;
                   -o-animation:gm-slidein 3s 1;
                   -webkit-animation:gm-slidein 3s 1;
                   animation:gm-slidein 3s 1;
                   border-bottom:1px solid #FFF;
                   margin:0 auto;
                   max-width:50%;
                   padding:4em 0 2em;
                   text-align:center;
                   background-color: rgba(0, 0, 0, 0.5);
                }
                .heropanel__content h1 {
                   //margin:0 0 .5em;
                   margin-top: 40px;
                   text-transform:uppercase;
                }
                .heropanel__content h1 a {
                   color:#FFF;
                   text-decoration:none;
                }
                .heropanel__content p {
                   color:#fff;
                   margin:0;
                   text-transform:uppercase;
                }
            </style>

            <header class="heropanel--video" data-vide-bg="{{ str_replace('video/', '', $s->mime) }}: {{ route('get-asset', ['slider', $s->asset]) }},   data-vide-options="posterType: png, loop: true, muted: false, volume: 1, position: 50% 50%>
                @if($s->intro_text || $s->link)
                <div class="container">
                    <div class="intro-text">
                        @if($s->intro_text)
                            <div class="intro-lead-in">{{ $s->intro_text }}</div>
                            {{-- <div class="intro-heading">We  bring stories to life</div> --}}
                            @if($s->link)
                                <a href="{{ $s->link }}" class="btn btn-primary btn-lg">See More</a>
                            @endif
                        @endif
                    </div>
                </div>
                @endif
            </header>
        @else
            <header class="hero-header" style="background-image: url({{ route('get-asset', ['slider', $s->asset]) }})">
                
                <div class="container">
                    
                    <div class="intro-text">
                        @if($s->intro_text || $s->link)
                        @if($s->intro_text)
                            <div class="intro-lead-in">{{ $s->intro_text }}</div>
                            {{-- <div class="intro-heading">We  bring stories to life</div> --}}
                            @if($s->link)
                                <a href="{{ $s->link }}" class="btn btn-primary btn-lg">See More</a>
                            @endif
                        @endif
                        @endif
                    </div>
                    
                </div>
                
            </header>
        @endif
    @endforeach
    <?php unset($slider); ?>
    

 <!-- Our Services -->
    <section class="page-section " id="services">
        <div class="container ">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="title-section"><span class="title-regular">OUR</span><br/>SERVICES</h2>
                    <hr class="title-underline" />
                </div>
                <?php 
                    $services = \App\Http\Controllers\CoreModules\Service\ServiceModel::orderBy('ordering', 'ASC')->get()->toArray(); 
                    //dd($services);
                    $services = array_chunk($services, 2);
                ?> 
                
                <div class="col-md-8">
                    @foreach($services as $service)
                        <div class="row">
                            @foreach($service as $s)
                                <div class="col-md-6">
                                    <div class="col-xs-2 box-icon">
                                        <div class="{{ $s['icon'] }}"></div>
                                    </div>
                                    <div class="col-xs-10">
                                        <h4>{{ $s['service'] }}</h4>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <p>
                                            {{ $s['description'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <?php unset($services); ?>
                </div>
            </div>
        </div>
    </section>



<!-- VIDEO -->
    <?php $how_we_work = (new \App\Http\Controllers\CoreModules\HowWeWork\HowWeWorkModel)->getHowWeWork(); ?>

    @if($how_we_work)
    <div class="page-section-no-padding  video-container" @if($how_we_work->asset) style="background-image: url({{ route('get-asset', ['how-we-work', $how_we_work->asset]) }}); background-size: cover;" @endif>
        <div class="video-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 ">
                        {{ $how_we_work->first }}
                        <a class="fancybox-media vide-icon" href="{{  $how_we_work->link }}"><i class=" fa fa-play-circle-o"></i></a> {{ $how_we_work->last }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Full Spotlight left-->
    <div class="container ">
            <div class="row" style="text-align: center;">
                
                    <div class="col-md-12">
                        <br/><br/><br/><br/>
                        <h2 class="title-section"><span class="title-regular">FEATURED</span><br/>WORK</h2>
                        <hr class="title-underline" style="margin: 0 auto;" />
                        <br/><br/><br/><br/>
                    </div>
                
            </div>
    </div>
    <?php $featured_work = \App\Http\Controllers\CoreModules\Portfolio\PortfolioModel::with('getAssets')->where('is_featured', 'yes')->take(2)->orderBy('ordering', 'ASC')->get(); ?>

    @foreach($featured_work as $_index => $f)
        @if($_index == 0)
        <section class="page-section-no-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="container col-md-6">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-4 spotlight-container">
                                <h2 class="title-section"><span class="title-regular">{{ $f->title }}</h2>
                                <hr class="title-underline" />
                                <p>
                                    {!! nl2br($f->short_description) !!}
                                </p>
                                <a href="{{ route('portfolio', $f->id) }}" class="btn btn-primary">More Information</a>
                            </div>
                        </div>
                    </div>
                    @foreach($f->getAssets as $index => $a)
                        @if($index == 0)
                            @if($a->mime)
                            <div class="col-md-6 spotlight-img-cont" style="background-image: url({{ route('get-asset', ['portfolio-asset', $a->asset]) }}); "> </div>
                            @else
                                <div class="col-md-6 spotlight-img-cont"><iframe width="100%" height="100%" src="{{ $a->asset }}" style="height: 450px"></iframe></div>
                            @endif
                        @endif
                        <?php break; ?>
                    @endforeach
                </div>
            </div>
        </section>
        @else
        <section class="page-section-no-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="container col-md-6 col-md-push-6">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-1 spotlight-container">
                                <h2 class="title-section"><span class="title-regular">{{ $f->title }}</h2>
                                <hr class="title-underline" />
                                <p>
                                    {!! nl2br($f->short_description) !!}
                                </p>
                                <a href="{{ route('portfolio', $f->id) }}" class="btn btn-primary">More Information</a>
                            </div>
                        </div>
                    </div>
                    @foreach($f->getAssets as $index => $a)
                        @if($index == 0)
                            @if($a->mime)
                            <div class="col-md-6 col-md-pull-6 spotlight-img-cont" style="background-image: url({{ route('get-asset', ['portfolio-asset', $a->asset]) }}); "> </div>
                            @else
                                <div class="col-md-6 col-md-pull-6 spotlight-img-cont"><iframe width="100%" src="{{ $a->asset }}"></iframe></div>
                            @endif
                        @endif
                        <?php break; ?>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    @endforeach

    <!-- Portfolio / Projects -->
    <section class="page-section">
        <div class="container">
            <!-- /3 Column Portfolio -->
            <div class="filter-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                        <h2 class="title-section"><span class="title-regular">RECENT</span><br/>WORK</h2>
                        <hr class="title-underline" />
                    </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-section port-col">
                <?php $portfolios = \App\Http\Controllers\CoreModules\Portfolio\PortfolioModel::with('getAssets')->orderBy('ordering', 'ASC')->take(6)->get(); ?>

                <div class="row">
                    <div class="isotopeContainer">
                        @foreach($portfolios as $p)
                        <div class="col-md-4 isotopeSelector photography">
                            <article class="">
                                <figure>
                                    @if(count($p->getAssets))
                                        @foreach($p->getAssets as $index => $a)
                                            @if($index == 0)
                                                @if(is_null($a->mime))
                                                    <div class="embed-responsive embed-responsive-16by9" style="padding: 36%">
                                                        <iframe src="{{ $a->asset }}" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width=625px></iframe>
                                                    </div>
                                                @else
                                                    <img src="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}" alt="{{ $a->title }}">
                                                @endif
                                            @endif
                                            <div class="overlay-background">
                                                <div class="inner"></div>
                                            </div>
                                        @endforeach
                                    @else
                                        <img src="no-image.jpg" alt="No image">
                                        <div class="overlay-background">
                                            <div class="inner"></div>
                                        </div>
                                    @endif
                                    <div class="overlay">
                                        <div class="inner-overlay">
                                            <div class="row margin-0 project-content">
                                                <div class="col-md-12 info-head">
                                                    <h3>{{ $p->title }}</h3>
                                                    <h4>Category</h4>
                                                </div>
                                                <div class="col-md-12 info">
                                                    <p>{{ $p->short_description }}</p>
                                                    <p><a title="{{ $p->title }}"
                                                     class="fancybox-pop fancybox.iframe"
                                                        @if(count($p->getAssets))
                                                            @foreach($p->getAssets as $index => $a)
                                                                @if($index == 0)
                                                                    @if(is_null($a->mime))
                                                                        data-fancybox="" data-type="iframe"      
                                                                        href="{{ $a->asset }}"
                                                                    @else
                                                                        href="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}"
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif><i class="fa fa-search fa-border fa-2x"></i></a>
                                                        <a title="Project Link" href="{{ route('portfolio', $p->id) }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- END Columns Portfolio -->

            <div class="text-center">
                <a href="{{ route('portfolios') }}">
                <button type="button" class="btn btn-primary ">VIEW MORE PROJECTS <i class="fa fa-arrow-right"></i></button>
                </a>
            </div>
        </div>

    </section>

    <!-- Our Clients -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <style>
        .slick-prev:before {
            background-image: url('images/arrow-left.png');
            background-size: 50px 50px;
            display: inline-block;
            width: 50px; 
            height: 50px;
            content:"";
        }
        .slick-next:before {
            /*background-image: url('images/arrow-right.png');*/
            background-size: 50px 50px;
            display: inline-block;
            width: 50px; 
            height: 50px;
            content:"";
        }
    </style>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-push-8">
                    <h2 class="title-section"><span class="title-regular">OUR</span><br/>CLIENTS</h2>
                    <hr class="title-underline" />
                    <p>
                        Serving our clients is privilege and responsibility that we do not take lightly.
                    </p>
                </div>
                <?php $clients = \App\Http\Controllers\CoreModules\Clients\ClientsModel::orderBy('ordering', 'ASC')->get(); ?>
                <div class="col-md-8 col-md-pull-4 text-center">
                    <div class="row multiple-items">
                        @foreach($clients as $c)
                        <div class="col-md-4">
                            <a href="{{ route('client-projects') }}?#client-{{ $c->id }}">
                                <img data-lazy="{{ route('get-asset', ['clients', $c->asset]) }}" alt="{{ $c->client }}" class="client-logo img img-responsive" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <?php unset($clients); ?>
                    <div class="content">
                        <div class="row">
                            
                                <div class="arrows-here">
                                </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.multiple-items').slick({
          infinite: true,
          lazyLoad: 'ondemand',
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          prevArrow: '<img src="images/arrow-left.png" class="pull-left">',
          nextArrow: '<img src="images/arrow-right.png" class="pull-right">',
          appendArrows: ".arrows-here"
        });
    </script>

    <!-- EVENT/LATEST NEWS-->
    <section class="page-section-no-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-section"><span class="title-regular">LATEST</span><br/>EVENTS</h2>
                    <hr class="title-underline" />
                </div>
            </div>
            <div class="row blog-listing">
                <?php $events = \App\Http\Controllers\CoreModules\Events\EventsModel::orderBy('start_date', 'DESC')->take(3)->get(); ?>
                
                @foreach($events as $e)
                <div class="col-md-4">
                    <article>
                        <img class="img-thumbnail" src="{{ route('get-asset', ['events', $e->asset]) }}" alt="{{ $e->title }}" />
                        <h2>Event 1</h2>
                        <hr class="title-underline">
                        <p>
                            {!! nl2br($e->short_description) !!}
                        </p>
                        <div class="post-meta">
                            <ul style="list-style: none; padding-inline-start: 0px;">
                                <li>
                                    <span><i class="fa fa-calendar"></i> Event Date: {{ \App\Http\Controllers\HelperController::changeDateFormat($e->start_date, 'Y-m-d') }} - {{ \App\Http\Controllers\HelperController::changeDateFormat($e->end_date, 'Y-m-d') }} </span>
                                </li>
                                <li>
                                    <span><i class="fa fa-hourglass"></i> Event Time: {{ $e->event_time }} </span>
                                </li>
                                <li>
                                    <span><i class="fa fa-compass"></i> Location: {{ $e->location }}</span>
                                </li>
                                <li>
                                    <span><i class="fa fa-calendar"></i> Deadline: {{ \App\Http\Controllers\HelperController::changeDateFormat($e->deadline, 'Y-m-d') }}  </span>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('event-single', $e->id) }}" class="btn btn-xs btn-primary">Learn more...</a>
                    </article>
                </div>
                @endforeach
                <?php unset($events); ?>
            </div>
            <div class="text-center">
                <a href="{{ route('events') }}">
                <button type="button" class="btn btn-primary ">VIEW MORE EVENTS <i class="fa fa-arrow-right"></i></button>
                </a>
            </div>
        </div>
    </section>

    <!-- BLOG/LATEST NEWS-->
    <section class="page-section-no-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-section"><span class="title-regular">LATEST</span><br/>BLOGS</h2>
                    <hr class="title-underline" />
                </div>
            </div>
            <div class="row blog-listing">
                <?php $blogs = \App\Http\Controllers\CoreModules\Blog\BlogModel::where('is_active', 'yes')->orderBy('publish_date', 'DESC')->take(3)->get(); ?>
                
                @foreach($blogs as $b)
                <div class="col-md-4">
                    <article>
                        <img class="img-thumbnail" src="{{ route('get-asset', ['blog', $b->asset]) }}" alt="{{ $b->title }}" />
                        <h2>{{ $b->title }}</h2>
                        <hr class="title-underline">
                        <p>
                            {!! nl2br($b->short_description) !!}
                        </p>
                        <div class="post-meta">
                            <span><i class="fa fa-calendar"></i>{{ \App\Http\Controllers\HelperController::changeDateFormat($b->publish_date, 'Y-m-d') }}</span>
                            <span><i class="fa fa-user"></i> By <a href="#">{{ $b->author }}</a> </span>
                            <?php $tags = \App\Http\Controllers\HelperController::getTagCloud($b->tags); ?>
                            @if(count($tags))
                            <span><i class="fa fa-tag"></i> 
                                @foreach($tags as $t)
                                <a href="{{ route('blogs') }}?{{urlencode('search[tags]')}}={{ $t }}">{{ $t }}</a>&nbsp;&nbsp; 
                                @endforeach
                            </span>
                            @endif
                        </div>
                        <a href="{{ route('blog', $b->slug) }}" class="btn btn-xs btn-primary">Read more...</a>
                    </article>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{ route('blogs') }}">
                <button type="button" class="btn btn-primary ">VIEW MORE BLOGS <i class="fa fa-arrow-right"></i></button>
                </a>
            </div>
        </div>
    </section>
    <br/>
    <br/>
@stop

@section('custom-js')
    <script src="https://www.gordonmac.com/wp-content/themes/2016/vendor/vide/jquery.vide.min.js"></script>
@stop