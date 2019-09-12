@extends('frontend.main')

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        

                        <li><a href="#">Events</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Events</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro -->
    <section class="page-section padding-30">
        <div class="container intro">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="title-section"><span class="title-regular">We are the <strong>best</strong></span><br/> For all your needs</h1>
                    <hr class="title-underline-center">
                    <p class="lead"> Things change when everyone on the team is equally invested in the overall purpose and goal.
                        <br/>  You find yourself working faster, finding mistakes more easily, and innovating better. </p>
                </div>
            </div>
        </div>
    </section>





    <!-- OUR TEAM -->
    <section class="page-section padding-60">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="title-section"><span class="title-regular">OUR</span><br/>EVENTS</h2>
                    <hr class="title-underline-center" />
                </div>
            </div>
        </div>
        <div class="container team-member">
            <div class="row">
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
            </div>
        </div>
    </section>
@stop