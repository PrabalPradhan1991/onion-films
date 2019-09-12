@extends('frontend.main')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li>{{ $blog->title }}</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $blog->title }} </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Container  -->
    <section class="page-section padding-30">
        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-md-9">
                    <div class="blog-listing">
                        <article>
                            <img class="img-thumbnail" src="{{ route('get-asset', ['blog', $blog->asset]) }}" alt="{{ $blog->title }}">
                            <h2>{{ $blog->title }}</h2>
                            <hr class="title-underline">
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i>{{ \App\Http\Controllers\HelperController::changeDateFormat($blog->publish_date, 'Y-m-d') }}</span>
                                <span><i class="fa fa-user"></i> By <a href="#">{{ $blog->author }}</a> </span>
                                <?php $tags = \App\Http\Controllers\HelperController::getTagCloud($blog->tags); ?>
                                @if(count($tags))
                                    <span><i class="fa fa-tag"></i> 
                                        @foreach($tags as $t)
                                            <a href="{{ route('blogs') }}?{{urlencode('search[tags]')}}={{ $t }}">{{ $t }}</a>&nbsp;&nbsp; 
                                        @endforeach
                                    </span>
                                @endif
                            </div>
                            <h3>{{ $blog->sub_title }}</h3>
                            {!! $blog->long_description !!}
                        </article>
                    </div>
                </div>
                @include('core-modules.blog.frontend.include.blog-side')
            </div>
        </div>
    </section>
@stop