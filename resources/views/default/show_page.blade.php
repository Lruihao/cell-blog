@extends('layouts.page')

@section('title', config('title', config('blog.title')).' | '.$page->title)

@section('description', $page->description ?? config('description', config('blog.description')))

@section('keywords', $page->keywords ?? config('keywords', config('blog.keywords')))

@section('style')
    @include('default.common.style')
@endsection

@section('header-text')
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-5 mb-3">
                {{ $page->title }}
            </h1>
            <div class="row article-info my-2 justify-content-center">
                <span>
                    <i class="fas fa-calendar"></i>
                    创建于 <span>{{ $page->created_at }}</span>
                </span>
                @if($page->updated_at != $page->created_at)
                    <span class="mx-2 text-secondary">|</span>
                    <span>
                        <i class="fas fa-calendar-check"></i>
                        更新于 <span>{{ $page->updated_at }}</span>
                    </span>
                @endif
                <span class="mx-2 text-secondary">|</span>
                <span id="{{ $page->link_alias == ('about' || 'guestbook') ? '/'.$page->link_alias : '/page/'.$page->link_alias }}"
                      class="leancloud_visitors" data-flag-title="{{ $page->title }}">
                    <i class="fas fa-eye"></i>
                    @if($page->comments && config('comment_plugin', config('blog.comment_plugin')) == 'valine'  && config('valine_app_id', config('blog.valine_app_id')) && config('valine_app_id', config('blog.valine_app_id')))
                        访问量: <span class="leancloud-visitors-count"></span>
                    @else
                        访问量: <span id="busuanzi_value_page_pv"></span>
                    @endif
                </span>
            </div>
            <div class="row my-2 justify-content-center">
                <p class="lead page-description text-dark">{{ $page->description }}</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="article-content m-1 m-sm-3 py-2">
        {!! $page->html !!}
    </div>

    <div id="share" class="social-share mx-1 mx-sm-3 mb-4 text-center"></div>
    @if($page->comments)
        <hr class="mb-4"/>
        <!-- 评论插件 -->
        <div class="comments mx-1 mx-sm-3 mb-4 rounded" id="comments"></div>
        @include('default.comments.index')
    @endif
@endsection

@section('script')
    @include('default.common.script')
@endsection