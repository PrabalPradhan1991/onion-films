@extends('frontend.main')

@section('content')d
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

                    <h1>4 Column Portfolio</h1>

                    <div class="filter-container isotopeFilters">
                        <ul class="list-inline filter">
                            <li class="active"><a href="#" data-filter="*">All </a><span>/</span></li>
                            <li><a href="#" data-filter=".illustrations">Illustrations</a><span>/</span></li>
                            <li><a href="#" data-filter=".photography">Photography</a><span>/</span></li>
                            <li><a href="#" data-filter=".websites">Websites</a><span>/</span></li>
                            <li><a href="#" data-filter=".art">Art</a></li>
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
                    <div class="col-md-6 isotopeSelector art">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector illustrations">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector websites">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector photography">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector photography">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector art">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector photography">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector photography websites">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector photography art">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector illustrations">
                        <article class="">
                            <figure>
                                
                                <div class="embed-responsive embed-responsive-16by9" style="padding: 36%">
                                    <iframe src="https://www.youtube.com/embed/PozYTvmgcVE" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width=625px></iframe>
                                </div>
                                
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector art websites">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-md-6 isotopeSelector websites">
                        <article class="">
                            <figure>
                                <img src="http://placehold.it/625x450" alt="">
                                <div class="overlay-background">
                                    <div class="inner"></div>
                                </div>
                                <div class="overlay">
                                    <div class="inner-overlay">
                                        <div class="row margin-0 project-content">
                                            <div class="col-md-12 info-head">
                                                <h3>Project Title</h3>
                                                <h4>Category</h4>
                                            </div>
                                            <div class="col-md-12 info">
                                                <p>Lorem ipsum dolor...</p>
                                                <p><a title="Project Image" class="fancybox-pop fancybox.image" href="http://placehold.it/625x450"><i class="fa fa-search fa-border fa-2x"></i></a>
                                                    <a title="Project Link" href="{{ route('portfolio-item') }}"><i class="fa fa-link fa-border fa-2x"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            <h3p>Title</h3>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container">
        <ul class="pagination pagination-lg">
            <li><a href="#">«</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
            
@stop