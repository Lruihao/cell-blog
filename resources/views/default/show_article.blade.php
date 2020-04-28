@inject('systemPresenter', 'App\Presenters\SystemPresenter')

@extends('layouts.app')

@section('title', $systemPresenter->checkReturnValue('title', $article->title))

@section('description', $systemPresenter->checkReturnValue('description', $article->desc))

@section('keywords', $systemPresenter->checkReturnValue('keywords', $article->keyword))

@section('style')
    <link rel="stylesheet" href="{{ asset('share.js/css/share.min.css') }}">
@endsection

@section('header-text')
    <div class="text-inner">
        <div class="row">
            <div class="col-md-12 to-animate fadeInUp animated">
                <h3 class="color-white">
                    {{ $article->title }}
                </h3>

                <p class=" m-t-25 color-white">
                    <i class="glyphicon glyphicon-calendar"></i>{{ $article->created_at }}
                    &nbsp;
                    @if($article->category)
                        <i class="glyphicon glyphicon-th-list"></i>
                        <a href="{{ route('category', ['id' => $article->category_id]) }}">
                            {{ $article->category->name }}
                        </a>
                    @endif
                </p>
                <p class="color-white">
                    <i class="glyphicon glyphicon-tags"></i>&nbsp;
                    @foreach ($article->tags as $tag)
                        <a href="{{ route('tag', ['id' => $tag->id]) }}">
                            {{ $tag->name }}
                        </a>
                        &nbsp;
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="markdown-preview">
        {!! $article->html !!}
    </div>

    <div id="share" class="social-share m-t-25"></div>
    <!-- 评论插件 -->
    @include('default.comment.index', [
        'commentId' => $article->id,
        'commentTitle' => $article->title,
        'commentUrl' => Request::getUri()
    ])
@endsection

@section('script')
    <script src="{{ asset('share.js/js/jquery.share.min.js') }}"></script>

    <script>
        $(function(){
            $('#share').share({sites: ['qzone', 'qq', 'weibo','wechat']});
        });
    </script>

@endsection
