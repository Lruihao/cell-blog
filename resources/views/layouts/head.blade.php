<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>@yield('title') </title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="description" content="@yield('description')"/>
<meta name="keywords" content="@yield('keywords')"/>
<meta name="author" content="Lruihao"/>

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="icon" href="{{ asset('/favicon.ico') }}"/>
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('/libs/bootstrap4.3/css/bootstrap.min.css') }}"/>
<!-- FontAwesome -->
<link rel="stylesheet" href="{{ asset('/libs/fontawesome5.11.2/css/fontawesome.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('/libs/fontawesome5.11.2/css/solid.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('/libs/fontawesome5.11.2/css/brands.min.css') }}"/>
<!-- Animate.css -->
<link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('/css/index.css') }}"/>

@yield('style')