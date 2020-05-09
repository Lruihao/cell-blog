<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('title', config('blog.title')).' | 相册' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('title', config('blog.title')).'的个人相册，使用腾讯cos桶储存，Github@cos-album' }}" />
    <meta name="keywords" content="{{ config('title', config('blog.title')).'的个人相册,cos-album' }}"/>
    <meta name="github-link" content="https://github.com/Lruihao/cos-album"/>
    <meta name="author" content="Lruihao"/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="icon" href="{{ asset('/favicon.ico') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/libs/bootstrap4.3/css/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('/libs/fontawesome5.11.2/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libs/fontawesome5.11.2/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libs/fontawesome5.11.2/css/brands.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cos-album.css') }}"/>

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

<!-- 腾讯cos桶相册 -->
<!-- 教程：https://lruihao.cn/posts/cos-album.html -->
<div class="cos-album"></div>
@if(config('cos-album', config('blog.cos-album')))
    <script>
        //需要解析的騰訊云COS桶XML鏈接
        let xmlLink = '{{ config('cos-album', config('blog.cos-album')) }}';
    </script>
    <script src="{{ asset('/js/cos-album.js') }}"></script>
@else
    <div class="container">
        <div class="row">
            <div class="col-md-12 alert alert-danger rounded">
                请先去后台配置 <code>cos-album</code> 参数再次尝试！！
                cos-album 教程：https://lruihao.cn/posts/cos-album.html
            </div>
        </div>
    </div>
@endif

<!-- 评论插件 -->
<div class="container">
    <div class="row">
        <div class="col-md-12 comments rounded" id="comments"></div>
        @include('default.comments.index')
    </div>
</div>

<footer class="footer text-center my-4">
    <div class="container">
        @include('default.analytics.busuanzi')
        <div class="row">
            <div class="col-md-12">
                <span class="copyright">
                    Copyright
                    <span class="copyright-icon">&copy;</span>
                    <span class="copyright-year" itemprop="copyrightYear">@php echo(date('Y')) @endphp</span>
                    <span class="author" itemprop="copyrightHolder">{{ config('copyright_holder', config('blog.copyright_holder')) }}. </span>
                </span>
                @if(config('icp_info', config('blog.icp_info')))
                    <span class="icp-info">
                        <a href="http://www.beian.miit.gov.cn" target="_blank" rel="external nofollow noopener noreferrer">
                        {{ config('icp_info', config('blog.icp_info')) }}
                        </a>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <strong>Powered by <a href="https://lruihao.cn" target="_blank">Cell Blog</a></strong>
                <a href='https://github.com/Lruihao/cell-blog' target="_blank" rel="external nofollow noopener noreferrer">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top fa-stack d-none">
    <i class="fas fa-circle fa-stack-2x"></i>
    <i class="fas fa-arrow-up fa-stack-1x fa-inverse"></i>
</div>

<script type="text/javascript" src="{{ asset('/libs/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/libs/bootstrap4.3/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/love.min.js') }}" async defer></script>
<script type="text/javascript" src="{{ asset('/js/index.js') }}" async defer></script>
<script type="text/javascript" src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js" async></script>
<script type="text/javascript" src="{{ asset('/js/snowfall.jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/sakura.js') }}"></script>


{{--自定义脚本--}}
{!! config('custom_script', config('blog.custom_script')) !!}

</body>
</html>
