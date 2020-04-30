<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="Lruihao" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('libs/bootstrap4.3/css/bootstrap.min.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('libs/fontawesome5.11.2/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/fontawesome5.11.2/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/fontawesome5.11.2/css/brands.min.css') }}">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/default/animate.css') }}">

    @yield('style')

    <link rel="stylesheet" href="{{ asset('css/default/index.css') }}">

</head>

<body>
@inject('systemPresenter', 'App\Presenters\SystemPresenter')
<nav class="navbar navbar-expand-md navbar-dark bg-dark position-sticky sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('images/brand.svg') }}" width="30" height="30" class="d-inline-block align-top" alt="Cell-Blog">
            {{ $systemPresenter->getKeyValue('blog_name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        @include('default.navigation')
    </div>
</nav>

<div class="container main p-1 p-sm-3 rounded">
    <div class="jumbotron text-center mb-0">
        <div class="container">
            @yield('header-text')
        </div>
    </div>
    <div class='row mx-0 mt-1 mt-sm-3'>
        <div class='col-md-8 px-0 my-1'>
            <div class="content mr-sm-2 p-1 pt-4 rounded">
                @yield('content')
            </div>
        </div>
        <div class='col-md-4 px-0 my-1'>
            <div class="sidebar ml-sm-2 p-1 p-sm-2 rounded">
                @php
                    $colorList = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
                @endphp
                @include('default.author')
                @include('default.category')
                @include('default.tag')
                @include('default.hot')
                @include('default.link')
            </div>
        </div>
    </div>
</div>

@include('default.footer')

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('libs/bootstrap4.3/js/bootstrap.bundle.min.js') }}"></script>

<script>
  $('[data-toggle="tooltip"]').tooltip();
</script>

@yield('script')
</body>
</html>
