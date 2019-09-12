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
                <div class="col-md-4">
                    <article>
                        <img class="img-thumbnail" src="{{ asset('onion/img/events.webp') }}" alt="Event" />
                        <h2>Event 1</h2>
                        <hr class="title-underline">
                        <p>
                            In the last year alone, there has been a major spike in interest for photography that defies the tired clichés that we are used to seeing in advertising.Searches for “women leaders,” “real people,” “strong women,” ...
                        </p>
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
                        <a href="{{ route('event-single-post') }}" class="btn btn-xs btn-primary">Learn more...</a>
                    </article>
                </div>
                <div class="col-md-4">
                    <article>
                        <img class="img-thumbnail" src="{{ asset('onion/img/events.webp') }}" alt="Event" />
                        <h2>Event 1</h2>
                        <hr class="title-underline">
                        <p>
                            In the last year alone, there has been a major spike in interest for photography that defies the tired clichés that we are used to seeing in advertising.Searches for “women leaders,” “real people,” “strong women,” ...
                        </p>
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
                        <a href="{{ route('event-single-post') }}" class="btn btn-xs btn-primary">Learn more...</a>
                    </article>
                </div>
                <div class="col-md-4">
                    <article>
                        <img class="img-thumbnail" src="{{ asset('onion/img/events.webp') }}" alt="Event" />
                        <h2>Event 1</h2>
                        <hr class="title-underline">
                        <p>
                            In the last year alone, there has been a major spike in interest for photography that defies the tired clichés that we are used to seeing in advertising.Searches for “women leaders,” “real people,” “strong women,” ...
                        </p>
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
                       <a href="{{ route('event-single-post') }}" class="btn btn-xs btn-primary">Learn more...</a>
                    </article>
                </div>
                <div class="col-md-4">
                      <article>
                        <img class="img-thumbnail" src="{{ asset('onion/img/events.webp') }}" alt="Event" />
                        <h2>Event 1</h2>
                        <hr class="title-underline">
                        <p>
                            In the last year alone, there has been a major spike in interest for photography that defies the tired clichés that we are used to seeing in advertising.Searches for “women leaders,” “real people,” “strong women,” ...
                        </p>
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
                        <a href="{{ route('event-single-post') }}" class="btn btn-xs btn-primary">Learn more...</a>
                    </article>
                </div>
                <div class="col-md-4">
                      <article>
                        <img class="img-thumbnail" src="{{ asset('onion/img/events.webp') }}" alt="Event" />
                        <h2>Event 1</h2>
                        <hr class="title-underline">
                        <p>
                            In the last year alone, there has been a major spike in interest for photography that defies the tired clichés that we are used to seeing in advertising.Searches for “women leaders,” “real people,” “strong women,” ...
                        </p>
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
                        <a href="{{ route('event-single-post') }}" class="btn btn-xs btn-primary">Learn more...</a>
                    </article>
                </div>
                <div class="col-md-4">
                     <article>
                        <img class="img-thumbnail" src="{{ asset('onion/img/events.webp') }}" alt="Event" />
                        <h2>Event 1</h2>
                        <hr class="title-underline">
                        <p>
                            In the last year alone, there has been a major spike in interest for photography that defies the tired clichés that we are used to seeing in advertising.Searches for “women leaders,” “real people,” “strong women,” ...
                        </p>
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
                       <a href="{{ route('event-single-post') }}" class="btn btn-xs btn-primary">Learn more...</a>
                    </article>
                </div>
            </div>
        </div>
    </section>
@stop