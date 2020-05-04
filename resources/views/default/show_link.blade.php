@extends('layouts.page')

@section('title', config('title', config('blog.title')).' | 友情链接')

@section('description', config('title', config('blog.title')).'的友情链接页面，欢迎互换友链！')

@section('keywords', config('keywords', config('blog.keywords')).'友情链接')

@section('style')
    @include('default.common.style')
    <link rel="stylesheet" href="{{ asset('/css/link.css') }}"/>
@endsection

@section('header-text')
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-5 mb-3">友情链接</h1>
            <div class="row article-info my-2 justify-content-center">
                <span id="/links" class="leancloud_visitors" data-flag-title="{{ config('title', config('blog.title')).' | 友情链接' }}">
                    <i class="fas fa-eye"></i>
                    @if(config('comment_plugin', config('blog.comment_plugin')) == 'valine'  && config('valine_app_id', config('blog.valine_app_id')) && config('valine_app_id', config('blog.valine_app_id')))
                        访问量: <span class="leancloud-visitors-count"></span>
                    @else
                        访问量: <span id="busuanzi_value_page_pv"></span>
                    @endif
                </span>
            </div>
            <div class="row my-2 justify-content-center">
                <ol class="text-left alert alert-danger pl-5">
                    <li>互换友链请在评论留言，<strong>仅限个人非商业博客 / 网站</strong>，最好加上你网站的描述，以便区分。</li>
                    <li><strong>站点失效、停止维护、内容不当都可能被取消链接！</strong></li>
                    <li><strong>那些不尊重他人劳动成果，转载不加出处的，或恶意行为的站点，还请您不要来进行交换了。</strong></li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if(count($links))
        <div class="links-list">
            @foreach ($links as $link)
                <div class="card-box" title="{{ $link->description }}" data-toggle="tooltip" data-placement="top">
                    <a href="{{ url($link->url) }}" target="_blank" rel="external nofollow noopener noreferrer">
                        @if($link->avatar)
                            <img class="card-avatar" src="{{ url($link->avatar) }}" alt="{{ $link->name }}"/>
                        @else
                            <svg class="card-avatar" aria-hidden="true">
                                <use xlink:href="#icon-{{ $loop->index + 1 }}"></use>
                            </svg>
                        @endif
                        <span title="{{ $link->name }}">
                            <i class="fas fa-link"></i>
                            {{ $link->name }}
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-4">
            {!! $links->links() !!}
        </div>
    @else
        <div class="mx-sm-2 p-4 rounded">
            <p class="alert alert-warning mb-0">
                <i class="fas fa-exclamation-triangle"></i>
                暂无友情链接,欢迎互换添加！！！
            </p>
        </div>
    @endif

    <div id="share" class="social-share mx-1 mx-sm-3 mb-4 text-center"></div>
    <hr class="mb-4"/>
    <!-- 评论插件 -->
    <div class="comments mx-1 mx-sm-3 mb-4 rounded" id="comments"></div>
    @include('default.comments.index')
@endsection

@section('script')
    @include('default.common.script')
@endsection

