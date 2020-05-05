@extends('layouts.app')

@section('title', config('title', config('blog.title')).' | '.$article->title)

@section('description', $article->description ?? config('description', config('blog.description')))

@section('keywords', $article->keywords ?? config('keywords', config('blog.keywords')))

@section('style')
    @include('default.common.style')
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
                            <li class="list-inline-item badge badge-pill badge-light shadow-sm py-2">
                                <a href="{{ route('tag', ['id' => $tag->id]) }}" class="article-tag py-2">
                                    <i class="fas fa-tag"></i>
                                    {{ $tag->name }}
                                </a>
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
    <div id="share" class="social-share mx-1 mx-sm-3 my-3 text-center"></div>
    <ul class="nav-prev-next list-inline d-flex justify-content-between mx-1 mx-sm-3 my-3 p-2 rounded shadow-sm">
        <li class="next list-inline-item">
            @if(!is_null($next))
                <a href="{{ url('/articles/'.$next->id) }}">
                    <i class="fas fa-chevron-left"></i>
                    {{ $next->title }}
                </a>
            @endif
        </li>
        <li class="prev list-inline-item text-right">
            @if(!is_null($prev))
                <a href="{{ url('/articles/'.$prev->id) }}">
                    {{ $prev->title }}
                    <i class="fas fa-chevron-right"></i>
                </a>
            @endif
        </li>
    </ul>
    @if($article->comments)
        <hr class="mb-4"/>
        <!-- 评论插件 -->
        <div class="comments mx-1 mx-sm-3 mb-4 rounded" id="comments"></div>
        @include('default.comments.index')
    @endif
@endsection

@section('script')
    @include('default.common.script')
@endsection
