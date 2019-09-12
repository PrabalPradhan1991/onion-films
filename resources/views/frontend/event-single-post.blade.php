@extends('frontend.main')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">Event</a></li>
                        <li>Event Details</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Event Details</h1>
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
                    <a title="Main Image" class="fancybox-pop fancybox.image" href="{{ asset('onion/img/event-item.webp') }}" rel="portfolio-main">
                        <img src="{{ asset('onion/img/event-item.webp') }}" alt="portfolio" class="img-responsive">
                    </a>
                </div>


                <!-- Sidebar -->


                <div class="col-md-4 col-md-pull-8">

                    <h4>Event details</h4>
                    <div class="portfolio-details">
                        <p>
                            <div class="post-meta">
                                <ul style="list-style: none; padding-inline-start: 0px;">
                                    <li>
                                        <span><i class="fa fa-calendar"></i> Event Date: Aug 17, 2019 - Aug 20, 2019 </span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-hourglass"></i> Event Time: 10am - 4pm </span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-compass"></i> Location: Samakhusi, Kathmandu</span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-calendar"></i> Deadline: Aug 17, 2019  </span>
                                    </li>
                                </ul>
                            </div>
                        </p>
                        <p style="text-align: justify;">Nepal’s unique topography makes the country a nature-lover’s paradise. Its majestic peaks and rolling hills, coupled with its lush forests and breathtaking rapids, are all testament to the beauty of the great outdoors. That said, it is of little wonder that tourists go to Nepal not only to climb its numerous mountains, but also to revel in the beauty of nature.Unlike most crowded tourist destination.Its majestic peaks and rolling hills, coupled with its lush forests and breathtaking rapids, are all testament to the beauty of the great outdoors. </p>
                    </div>

                </div>

            </div>

        </div>
</section>

<!--FORM-->
<section class="page-section">
        <div class="container">
            <div class="row ">

                <div class="col-md-12">
                   
                    <p>
                       If you have queries about our services, fill up the form below and we will do our best to reply within 24 hours.
                    </p>
                    <form method="post" action="{{ route('event-post', urlencode('Event 1')) }}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="usr" placeholder="NAME" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="message" id="message" placeholder="MESSAGE"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">APPLY NOW <i class="fa fa-envelope"></i></button>
                        {{ csrf_field() }}
                    </form>
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