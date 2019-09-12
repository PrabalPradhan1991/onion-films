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
                        <li>Blog Single Post </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog Single Post </h1>
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
                            <img class="img-thumbnail" src="{{ asset('onion/img/single-blog.webp') }}">
                            <h2>Single Blog Post</h2>
                            <hr class="title-underline">
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> Aug 17, 2016 - 6:53</span>
                                <span><i class="fa fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                            </div>
                            <h3>Second Headline</h3>
                            <p>In the last year alone, Getty Images has noticed a spike in interest for pictures that defy tired clichés we’re used to seeing in advertising. Searches for “women leaders,” “real people,” “strong women,” and “diverse women” have more than doubled, with increases of 202%, 192%, 187%, and 168%, respectively.“Brands are finally being called out for their use of classic, overused tropes,” Paul Friesen, Director of Content at 500px, tells us. “Female strength and empowerment once meant seeing a woman in boxing gloves, and career-driven women were once represented as multitasking octo-woman with multiple arms. I’m glad to see that this is no longer acceptable in mainstream marketing.”We started to see this particular change in around 2014, when Getty introduced the Lean In collection in collaboration with Sheryl Sandberg’s non-profit—a concerted effort to change the way women were seen in ads and the media.In 2017, women seen in advertising became active and embraced their strength, but they were still mostly white, thin, and non-disabled.</p>
                            <blockquote>Last year, Claire Cain Miller from The New York Times tackled another elephant in the room: representation of non-binary and transgender people in stock photography just wasn’t up to par. Sure, there were plenty of photos of the transgender pride symbol, but few showed faces. When they did, we rarely saw trans people going about their everyday lives; usually, they just stood in front of a blank wall. Where were the pictures of trans people working, pursuing their passions, spending time with loved ones?</blockquote>
                            <p>Diverse representation is good, but it’s not enough by itself. It also has to be a fair and accurate representation. Images that portray minorities shouldn’t focus solely on the fact that they’re minorities; instead, we should see them in the same authentic, real-life situations we see cis white people in. Great photos are multi-dimensional, just like the people they represent.</p>
                            <p> <img class="pull-right" width="150" src="{{ asset('onion/img/pull-right.webp') }}" alt="iPhone"> There’s no place for harmful stereotypes on TV, and there’s no place for them in stock photography either.You might be surprised to learn that even so-called “positive” stereotypes—such as ‘African Americans make better athletes’ or ‘Asian Americans are smarter’—are damaging. That’s because we’re aware enough now to root out and question negative stereotypes, but we’re more likely to accept “positive ones” at face value. And once we buy into these seemingly “innocuous” stereotypes, we end up opening ourselves up to the bad ones.Stock photography, perhaps more than any other genre, reflects the issues that matter most to the public.</p>
                            <p> To some extent, that’s what it’s all about: giving people what they want. But while Licensing Contributors will often respond to and illustrate topics we see in the news and on social media, it’s never a one-way street. Stock photography reveals what we already care about, but beyond that, it can teach us what we should care about going forward.Photos of relatable, everyday people should be the norm, not the exception, and thankfully, more artists, agencies, and brands are helping to turn the tides.What’s more, the individuals pictured have taken on an active role by choosing the search descriptions for their own photos. </p>
                        </article>
                    </div>
                </div>
                @include('frontend.include.blog-side-widget')
            </div>
        </div>
    </section>
@stop