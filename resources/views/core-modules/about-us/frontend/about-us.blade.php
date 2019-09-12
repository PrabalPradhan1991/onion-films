@extends('frontend.main')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    <section class="page-section">
        <div class="container ">
            <div class="row">
                <div class="col-md-8 col-md-push-4">
                    <div class="col-md-12">
                        <h2 class="title-section"><span class="title-regular">{{ $data->title }}</h2>
                        <hr class="title-underline" />
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            
                          
                                {!! $data->description !!}
                            
                            
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-4 col-md-pull-8 ">
                    <img class="img-responsive" src="{{ route('get-asset', ['about-us', $data->asset]) }} " alt="{{ $data->title }}" />
                </div>
            </div>
        </div>
    </section>
@stop