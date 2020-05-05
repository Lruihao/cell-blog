@extends('layouts.app')

@section('title', request('wd'))

@section('description', request('wd'))

@section('keywords', request('wd'))

@section('header-text')
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-5 mb-3">
                <i class="fas fa-search header-icon" title="搜索: {{ request('wd') }}" data-toggle="tooltip" data-placement="left"></i>
                {{ request('wd') }}
                <span class="header-badge badge badge-pill badge-secondary">{{ count($articles) }}</span>
            </h1>
        </div>
    </div>
@endsection

@section('content')
    @include('default.article')
@endsection
