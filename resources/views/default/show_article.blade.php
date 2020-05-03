@extends('layouts.app')

@section('title', config('title', config('blog.title')).' | '.$article->title)

@section('description', $article->description ?? config('description', config('blog.description')))

@section('keywords', $article->keywords ?? config('keywords', config('blog.keywords')))

@section('style')
    <link rel="stylesheet" href="{{ asset('/libs/share.js/css/share.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libs/emojify.js/css/emojify.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/libs/highlight.js/css/tomorrow-night-eighties.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/article.css') }}"/>
@endsection

@section('header-text')
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-5 mb-3">
                {{ $article->title }}
            </h1>
            <div class="row article-info my-2 justify-content-center">
                <span>
                    <i class="fas fa-calendar"></i>
                    发表于 <span>{{ $article->created_at }}</span>
                </span>
                @if($article->category)
                    <span class="mx-2">|</span>
                    <span>
                        <i class="fas fa-folder"></i>
                        分类于
                        <a href="{{ route('category', ['id' => $article->category_id]) }}">
                            {{ $article->category->name }}
                        </a>
                    </span>
                @endif
                <span class="mx-2">|</span>
                <span>
                    <i class="fas fa-eye"></i>
                    阅读数: {{ $article->views }}
                </span>
            </div>
            @if(count($article->tags))
                <div class="row my-2 justify-content-center">
                    <ul class="list-inline">
                        @foreach ($article->tags as $tag)
                            <li class="list-inline-item badge badge-pill badge-light">
                                <i class="fas fa-tag"></i>
                                <a href="{{ route('tag', ['id' => $tag->id]) }}" class="article-tag">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('content')
    <div class="article-content m-1 m-sm-3 py-2">
        {!! $article->html !!}
    </div>
    <!-- article-copyright -->
    <ul class="article-copyright text-dark alert alert-light rounded list-unstyled mx-1 mx-sm-3 my-3">
        <li class="article-copyright-author">
            <strong>本文作者： </strong>{{ $article->user->name }}
        </li>
        <li class="article-updated">
            <strong>修改时间： </strong>{{ $article->updated_at }}
        </li>
        <li class="article-copyright-link">
            <strong> 本文链接：</strong>
            <a href="{{ env('APP_URL').'/article/'.$article->id }}" title="{{ $article->title }}">
                {{ env('APP_URL').'/article/'.$article->id }}
            </a>
        </li>
        <li class="article-copyright-license">
            <strong>版权声明： </strong>本博客所有文章除特别声明外，均采用
            <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" rel="external nofollow noopener noreferrer"
               target="_blank">
                <i class="fab fa-creative-commons"></i> BY-NC-SA 4.0
            </a> 许可协议。转载请注明出处！
        </li>
    </ul>
    <div id="share" class="social-share mx-1 mx-sm-3 mb-4 text-center"></div>
    @if($article->comments)
        <hr class="mb-4"/>
        <!-- 评论插件 -->
        <div class="comments mx-1 mx-sm-3 mb-4 rounded" id="comments"></div>
        @include('default.comment.index')
    @endif
@endsection

@section('script')
    <script src="{{ asset('/libs/share.js/js/jquery.share.min.js') }}"></script>
    <script src="{{ asset('/libs/emojify.js/js/emojify.min.js') }}"></script>
    <script src="{{ asset('/libs/highlight.js/js/highlight.min.js') }}"></script>
    <script src="{{ asset('/js/article.js') }}"></script>
    <script src="{{ asset('/js/activate-power-mode.js') }}"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection
