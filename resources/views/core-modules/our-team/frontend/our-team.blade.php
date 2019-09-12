@extends('frontend.main')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        

                        <li>Our Team</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Team</h1>
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
                    <h2 class="title-section"><span class="title-regular">OUR</span><br/>TEAM</h2>
                    <hr class="title-underline-center" />
                </div>
            </div>
        </div>
        <div class="container team-member">
            <div class="row">
            	@foreach($our_team as $t)
                <div class="col-md-4">
                    <img src="{{ route('get-asset', ['our-team', $t->asset]) }}" class="img-responsive" alt="{{ $t->name }}">
                    <h2>{{ $t->name }}</h2>
                    <h3>{{ $t->position }}</h3>
                    <p class="text-center">
                       {!! nl2br($t->description) !!}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@stop