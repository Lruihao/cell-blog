@inject('systemPresenter', 'App\Presenters\SystemPresenter')

@extends('layouts.app')

@section('title', $systemPresenter->getKeyValue('title'))

@section('description', $systemPresenter->getKeyValue('description'))

@section('keywords', $systemPresenter->getKeyValue('keywords'))

@section('header-text')
    <p class="lead fadeInUp animated">{{ $systemPresenter->getKeyValue('motto') }}</p>
@endsection

@section('content')
    @include('default.article')
@endsection
