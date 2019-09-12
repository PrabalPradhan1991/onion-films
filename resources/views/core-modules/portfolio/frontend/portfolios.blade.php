@extends('frontend.main')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                       

                        <li>Portfolio</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Portfolio</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="filter-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">

                    <h1>Our Portfolio</h1>

                    <div class="filter-container isotopeFilters">
                        <ul class="list-inline filter">
                            <li class="active"><a href="#" data-filter="*">All </a><span>/</span></li>
                            <li><a href="#" data-filter=".uncategorized">Uncategorized </a><span>/</span></li>
                            @foreach($services as $s)
                                <li><a href="#" data-filter=".category-{{ $s->id }}">{{ $s->service }}</a><span>/</span></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- 4 Column Portfolio -->
    <section class="portfolio-section port-col">
        <div class="container">
            <div class="row">
                <div class="isotopeContainer">
                        @foreach($data as $p)
                        <div class="col-md-6 isotopeSelector @if(count($p->getCategories)) 
                                @foreach($p->getCategories as $c)
                                    category-{{ $c->service_id }}
                                @endforeach
                            @else uncategorized @endif">
                            <article class="">
                                <figure>
                                    @if(count($p->getAssets))
                                        @foreach($p->getAssets as $index => $a)
                                            @if($index == 0)
                                                @if(is_null($a->mime))
                                                    <div class="embed-responsive embed-responsive-16by9" style="padding: 36%">
                                                        <iframe src="{{ $a->asset }}" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width=625px></iframe>
                                                    </div>
                                                @else
                                                    <img src="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}" alt="{{ $a->title }}">
                                                @endif
                                            @endif
                                            <div class="overlay-background">
                                                <div class="inner"></div>
                                            </div>
                                        @endforeach
                                    @else
                                        <img src="no-image.jpg" alt="No image">
                                        <div class="overlay-background">
                                            <div class="inner"></div>
                                        </div>
                                    @endif
                                    <div class="overlay">
                                        <div class="inner-overlay">
                                            <div class="row margin-0 project-content">
                                                <div class="col-md-12 info-head">
                                                    <h3>{{ $p->title }}</h3>
                                                </div>
                                                <div class="col-md-12 info">
                                                    <p>{{ $p->short_description }}</p>
                                                    <p><a title="{{ $p->title }}"
                                                        @if(count($p->getAssets))
                                                            @foreach($p->getAssets as $index => $a)
                                                                @if($index == 0)
                                                                    @if(is_null($a->mime))
                                                                        class="fancybox-pop fancybox.iframe"
                                                                        data-fancybox="" data-type="iframe"      
                                                                        href="{{ $a->asset }}"
                                                                    @else
                                                                        class="fancybox-pop fancybox.image"
                                                                        href="{{ route('get-asset', ['portfolio-asset', $a->asset]) }}"
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif><i class="fa fa-search fa-border fa-2x"></i></a>
                                                        <a title="{{ $p->title }}" href="{{ route('portfolio', $p->id) }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <div class="container">
        {{ $data->links() }}
    </div>
            
@stop