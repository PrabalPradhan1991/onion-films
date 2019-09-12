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
                        <li><a href="#">Portfolio</a></li>
                        <li>Portfolio Items</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Portfolio Items</h1>
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
                    <a title="Main Image" class="fancybox-pop fancybox.image" href="{{ asset('onion/img/portfolio-item.webp') }}" rel="portfolio-main">
                        <img src="{{ asset('onion/img/portfolio-item.webp') }}" alt="portfolio" class="img-responsive">
                    </a>
                </div>


                <!-- Sidebar -->


                <div class="col-md-4 col-md-pull-8">

                    <h4>Project details</h4>
                    <div class="portfolio-details">
                        <p>
                            <strong>Client:</strong> Jon Doe
                            <br/>
                            <strong>Date:</strong> 10 November, 2016
                            <br/>
                            <strong>Category:</strong> <a href="#">Design</a>, <a href="#">Photo</a>
                            <br/>
                            <strong>Website:</strong> <a href="#" target="_blank">www.website.com</a>
                        </p>
                        <p style="text-align: justify; font-family: 'Oxygen', sans-serif;">Nepal’s unique topography makes the country a nature-lover’s paradise. Its majestic peaks and rolling hills, coupled with its lush forests and breathtaking rapids, are all testament to the beauty of the great outdoors. That said, it is of little wonder that tourists go to Nepal not only to climb its numerous mountains, but also to revel in the beauty of nature.Unlike most crowded tourist destinations, Nepal has managed to strike a balance between cosmopolitan business centers and lush scenery, thereby allowing wildlife to thrive in the country even as it continuously gains popularity as a backpacking and trekking destination.</p>
                    </div>

                </div>

            </div>

        </div>

        <div class="container">
            <div class="row  portfolio-gallery">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <a title="First Image" class="fancybox-pop fancybox.image" href="{{ asset('onion/img/portfolio-item.webp') }}" rel="portfolio-1">
                                <img src="{{ asset('onion/img/portfolio-item.webp') }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        
                        <div class="item">
                            <a title="Third Image" class="fancybox-pop fancybox.image" href="{{ asset('onion/img/portfolio-item.webp') }}" rel="portfolio-1">
                                <img src="{{ asset('onion/img/portfolio-item.webp') }}" alt="" class="img-responsive">
                            </a>
                        </div>

                        <div class="item">
                            <a title="Fourth Image" class="fancybox-pop fancybox.image" href="{{ asset('onion/img/portfolio-item.webp') }}" rel="portfolio-1">
                                <img src="{{ asset('onion/img/portfolio-item.webp') }}" alt="" class="img-responsive">
                            </a>
                        </div>

                         
                        <div class="item">
                            <a title="Sixth Image" class="fancybox-pop fancybox.iframe" href="https://player.vimeo.com/video/177466730?color=ffffff&title=0&byline=0&portrait=0" rel="portfolio-1">
                                <div class="embed-responsive embed-responsive-16by9">
                               <iframe src="https://player.vimeo.com/video/177466730?color=ffffff&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                                
                            </a>
                        </div>
                        <div class="item">
                            <a title="Seventh Image" class="fancybox-pop fancybox.image" href="{{ asset('onion/img/portfolio-item.webp') }}" rel="portfolio-1">
                                <img src="{{ asset('onion/img/portfolio-item.webp') }}" alt="" class="img-responsive">
                            </a>
                        </div>

                    </div>
                     
                </div>
            </div>
        </div>
    </section>




    <section class="page-section  padding-30">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Project Description</h4>
                </div>
                <div class="col-md-6">
                    <p>You can explore the national park on foot or aboard a vehicle. If you want to take pictures of as many animals as possible, however, you might want to explore the park on a jeep in order to cover more ground!</p>
                </div>
                <div class="col-md-6">
                    <p>Also, since the Bardia National park is close to the Karnali River, you may also venture on a whitewater rafting trip while in the area!</p>
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