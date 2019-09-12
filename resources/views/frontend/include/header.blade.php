<!-- Navigation -->
    <script type="text/javascript" src="{{ asset('onion/js/menu.js') }}"></script>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('index') }}"><img class="logo" src="{{ asset('onion/img/logo.webp') }}" alt="Logo"></a>
            </div>
            <nav class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li @if(url()->current() == route('index')) class="active" @endif><a href="{{ route('index') }}">Home</a></li>
                    <li @if(url()->current() == route('about-us')) class="active" @endif><a href="{{ route('about-us') }}">About Us</a></li>
                    <li  @if(url()->current() == route('portfolios')) class="active" @endif><a href="{{ route('portfolios') }}">Portfolio</a></li>
                    <li  @if(url()->current() == route('events')) class="active" @endif><a href="{{ route('events') }}">Events</a></li>
                    <li  @if(url()->current() == route('our-team')) class="active" @endif><a href="{{ route('our-team') }}">Our Team</a></li>
                    <li  @if(url()->current() == route('blogs')) class="active" @endif><a href="{{ route('blogs') }}">Blog</a></li>
                    <li  @if(url()->current() == route('contact-us')) class="active" @endif><a href="{{ route('contact-us') }}">Contact</a></li>
                </ul>
            </nav>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </div>