<!DOCTYPE html>
<head>
    @include('layouts.head')
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark position-sticky sticky-top">
    <div class="container">
        <a class="navbar-brand animated fast rubberBand" href="{{ url('/') }}">
            <img src="{{ url('images/brand.svg') }}" width="30" height="30" class="d-inline-block align-top" alt="Cell-Blog">
            {{ config('blog_name', config('blog.blog_name')) }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        @include('default.navigation')
    </div>
</nav>

<div class="container main p-1 p-sm-3 rounded">
    <div class="jumbotron text-center mb-0">
        <div class="container animated fast bounceInDown">
            @yield('header-text')
        </div>
    </div>
    <div class='row mx-0 mt-1 mt-sm-3'>
        <div class='col-md-12 px-0 my-1'>
            <div class="content p-1 pt-4 rounded animated fast fadeIn">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

</body>
</html>
