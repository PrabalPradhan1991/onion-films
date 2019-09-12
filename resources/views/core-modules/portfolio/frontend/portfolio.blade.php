@extends('frontend.main')

@section('content')
    {{-- <link href="{{ asset('onion/bootstrap/css/carousel.css') }}" rel="stylesheet"> --}}
    <!-- Page Header -->
    <link rel="stylesheet" href="{{ asset('onion/extensions/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('onion/extensions/owlcarousel/assets/owl.carousel.min.css') }}">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('portfolios') }}">Portfolio</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $data->title }}</h1>
                </div>
            </div>
        </div>
    </div>





    <!-- Container  -->
    <section class="page-section padding-30">
        <div class="container">
            <div class="row">
                <!-- Content -->
                
                <div class="col-md-8 col-md-push-4 margin-bottom-15">
                    @foreach($data->getAssets as $index => $a)
                        @if($index == 0)
                            @if($a->mime)    
                                <a title="{{ $a->title }}" class="fancybox-pop fancybox.image" href="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}" rel="portfolio-main">
                                    <img src="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}" alt="{{ $a->title }}" class="img-responsive">
                                </a>
                            @else
                                <a title="{{ $a->title }}" class="fancybox-pop fancybox.iframe" href="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}" rel="portfolio-main">
                                    <div class="embed-responsive embed-responsive-16by9" style="padding: 36%">
                                        <iframe src="{{ $a->asset }}" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width=625px></iframe>
                                    </div>
                                </a>
                            @endif
                            <?php break; ?>
                        @endif
                    @endforeach
                    
                </div>


                <!-- Sidebar -->


                <div class="col-md-4 col-md-pull-8">

                    <h4>Project details</h4>
                    <div class="portfolio-details">
                        <p>
                            <strong>Client:</strong> {{ $data->client }}
                            <br/>
                            <strong>Date:</strong> {{ \App\Http\Controllers\HelperController::changeDateFormat($data->portfolio_date, 'Y-m-d') }}
                            <br/>
                            <strong>Category:</strong> @if(count($data->getCategories)) @foreach($data->getCategories as $c) {{ \App\Http\Controllers\CoreModules\Service\ServiceModel::where('id', $c->service_id)->first()->service }}, @endforeach @else Uncategorized @endif
                            <br/>
                            @if($data->website)
                                <strong>Website:</strong> <a href="//{{ $data->website }}" target="_blank">{{ $data->website }}</a>
                            @endif
                        </p>
                        <p style="text-align: justify; font-family: 'Oxygen', sans-serif;">{!! nl2br($data->long_description) !!}</p>
                    </div>

                </div>

            </div>

        </div>

        <div class="container">
            <div class="row  portfolio-gallery">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">
                        
                            @foreach($data->getAssets as $index => $a)
                                <div class="item">
                                    @if($a->mime)
                                        <a title="{{ $a->title }}" class="fancybox-pop fancybox.image" href="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}" rel="portfolio-1">
                                            <img src="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}" alt="{{ $a->title }}" class="img-responsive">
                                        </a>
                                    @else
                                        <a title="{{ $a->title }}" class="fancybox-pop fancybox.iframe" href="{{ $a->asset }}" rel="portfolio-1">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe src="{{ $a->asset }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            </div>
                                        </a>
                                       
                                    @endif
                                </div>
                            @endforeach
                        
                </div>
            </div>
        </div>
    </section>
@stop

<!-- Initiate owlCarousel -->
@section('custom-js')
    <script src="{{ asset('onion/extensions/owlcarousel/owl.carousel.js') }}"></script>
    <!-- Options owlCarousel -->
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@stop