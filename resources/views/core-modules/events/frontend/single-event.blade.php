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
                    <h1>{{ $event->title }}</h1>
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
                    <a title="{{ $event->title }}" class="fancybox-pop fancybox.image" href="{{ route('get-asset', ['events', $event->asset]) }}" rel="portfolio-main">
                        <img src="{{ route('get-asset', ['events', $event->asset]) }}" alt="{{ $event->title }}" class="img-responsive">
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
	                                    <span><i class="fa fa-calendar"></i> Event Date: {{ \App\Http\Controllers\HelperController::changeDateFormat($event->start_date, 'Y-m-d') }} - {{ \App\Http\Controllers\HelperController::changeDateFormat($event->end_date, 'Y-m-d') }} </span>
	                                </li>
	                                <li>
	                                    <span><i class="fa fa-hourglass"></i> Event Time: {{ $event->event_time }} </span>
	                                </li>
	                                <li>
	                                    <span><i class="fa fa-compass"></i> Location: {{ $event->location }}</span>
	                                </li>
	                                <li>
	                                    <span><i class="fa fa-calendar"></i> Deadline: {{ \App\Http\Controllers\HelperController::changeDateFormat($event->deadline, 'Y-m-d') }}  </span>
	                                </li>
                                </ul>
                            </div>
                        </p>
                        <p style="text-align: justify;">{!! nl2br($event->long_description) !!}</p>
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
    
@stop