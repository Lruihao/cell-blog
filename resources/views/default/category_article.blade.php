@inject('systemPresenter', 'App\Presenters\SystemPresenter')

@extends('layouts.app')

@section('title', $systemPresenter->getKeyValue('title').' | '.'标签: '.$category->name)

@section('description', $systemPresenter->checkReturnValue('description', $category->description))

@section('keywords', $systemPresenter->checkReturnValue('keywords', $category->keywords))

@section('header-text')
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-5 mb-3">
                <i class="fas fa-list category-icon"></i>
                {{ $category->name }}
                <span class="category-badge badge badge-pill badge-secondary">{{ count($category->articles) }}</span>
            </h1>
            <div class="row article-info my-2 justify-content-center">
                <span>
                    <i class="fas fa-calendar"></i>
                    创建于 <span>{{ $category->created_at }}</span>
                </span>
                @if($category->updated_at != $category->created_at)
                    <span class="mx-2"> | </span>
                    <span>
                        <i class="fas fa-calendar-check"></i>
                        更新于 <span>{{ $category->updated_at }}</span>
                    </span>
                @endif
            </div>
            <div class="row my-2 justify-content-center">
                <p class="lead page-description text-dark">{{ $category->description }}</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('default.article')
@endsection
