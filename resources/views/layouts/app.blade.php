<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/thirdparty/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/grayscale.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/encloud.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>

    @stack('styles')
</head>
<body>
<div id="app" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="{{ url('/home') }}">
                    <i class="fa fa-play-circle"></i> <span class="light">En</span>Cloud
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="{{ url('/home') }}"></a>
                    </li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href="{{ url('/upload') }}">Upload</a></li>
                        <li><a href="{{ url('/files') }}">Files</a></li>
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="content">
        @yield('content')

    </div>
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy; Ray Winkelman. All Rights Reserved.</span>
    </div>
</footer>

<!-- Scripts -->
<script src="/thirdparty/jquery/jquery-3.1.1.min.js"></script>
<script src="/thirdparty/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/grayscale.js"></script>
@stack('scripts')

</body>
</html>
