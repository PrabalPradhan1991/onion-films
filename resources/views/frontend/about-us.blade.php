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
                        <h2 class="title-section"><span class="title-regular">ONION FILMS</span><br/>NEPAL</h2>
                        <hr class="title-underline" />
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            
                          
                                <p>Onion Films was founded in 2012 as a service digital media production company. How was the company first started is also a sign of the times in this digital age. It's founder organised a film making workshop through Facebook page named 'Onion Films' and collected a certain amount of money through crowd-funding Rs.500,000 was their authorised capital. "No seed capital was needed to start the company.But it was established using 'sweat capital'. We didn't spend more money, rather a lot of hardwork and sweat was used to kickstart the new venture," says<strong> Govinda Siwakoti</strong>, Co-founder of Onion Films."The main idea to uncover stories people have in every layer of their lives"</p>
                                <p>This company provides its services to small and medium enterprises, educationa institutions along with non-profit organisations, NGOs and INGOs.Similarly, it ia also involved with foreign televisions that are reporting the news from Nepal.Nevertheless, Onion Films has become stable in terms of revenue generation. "We decided to turn our passion for movies into profession and so established the company" says<strong> Surath Giri</strong>,also Co-founder of Onion Films.</p>
                            
                            
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-4 col-md-pull-8 ">
                    <img class="img-responsive" src="{{ asset('onion/img/about.webp') }} " alt="About Us" />
                </div>
            </div>
        </div>
    </section>
@stop