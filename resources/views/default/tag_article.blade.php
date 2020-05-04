@extends('layouts.app')

@section('title', config('title', config('blog.title')).' | '.'标签: '.$tag->name)

@section('description', $tag->description ?? config('description', config('blog.description')))

@section('keywords', $tag->keywords ?? config('keywords', config('blog.keywords')))

@section('header-text')
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-5 mb-3">
                <i class="fas fa-tag header-icon" title="标签: {{ $tag->name }}" data-toggle="tooltip" data-placement="left"></i>
                {{ $tag->name }}
                <span class="header-badge badge badge-pill badge-secondary">{{ count($tag->articles) }}</span>
            </h1>
            <div class="row article-info my-2 justify-content-center">
                <span>
                    <i class="fas fa-calendar"></i>
                    创建于 <span>{{ $tag->created_at }}</span>
                </span>
                @if($tag->updated_at != $tag->created_at)
                    <span class="mx-2">|</span>
                    <span>
                        <i class="fas fa-calendar-check"></i>
                        更新于 <span>{{ $tag->updated_at }}</span>
                    </span>
                @endif
            </div>
            <div class="row my-2 justify-content-center">
                <p class="lead page-description text-dark">{{ $tag->description }}</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('default.article')
@endsection
