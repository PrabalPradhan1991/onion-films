@extends('frontend.main')

@section('content')
    <!-- Map -->
    <section class="page-section-no-padding">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-12 padding-0 map-page-header">
                   
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="300px" id="gmap_canvas" src="{{ $data->google_map }}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                        
                </div>
            </div>
        </div>
    </section>





    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                       

                        <li>Contact</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>





    <!-- CONTAKT US-->
    <section class="page-section">
        <div class="container">
            <div class="row ">
                <form method="post">
                    <div class="col-md-8">
                        <h2 class="title-section"><span class="title-regular">CONTACT</span><br/>US</h2>
                        <hr class="title-underline " />
                        <p>
                           If you have queries about our services, fill up the contact form below and we will do our best to reply within 24 hours.
                        </p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="usr" placeholder="NAME" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="message" id="message" placeholder="MESSAGE" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">SEND <i class="fa fa-envelope"></i></button>
                    </div>
                    {{ csrf_field() }}

                </form>
                <div class="col-md-4">
                    @if($data->more_info)
                        <h3>More Info</h3>
                        <p>{!! nl2br($data->more_info) !!}</p>
                    @endif

                    @if($data->address)
                        <p><strong>Address:</strong>
                            <br/>{!! nl2br($data->address) !!}
                        </p>
                    @endif
                    @if($data->mobile)
                        <p><strong>Mobile:</strong> {{ $data->mobile }}</p>
                    @endif
                    @if($data->landline)
                        <p><strong>Landline:</strong> {{ $data->landline }}</p>
                    @endif
                    @if($data->fax)
                        <p><strong>Fax:</strong> {{ $data->fax }}</p>
                    @endif
                    @if($data->business_hours)
                        <p><strong>Business Hours:</strong><br/>{!! nl2br($data->business_hours) !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@stop