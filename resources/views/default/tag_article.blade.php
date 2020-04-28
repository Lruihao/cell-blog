@inject('systemPresenter', 'App\Presenters\SystemPresenter')

@extends('layouts.app')

@section('title', $tag->name)

@section('description', $systemPresenter->getKeyValue('description'))

@section('keywords', $systemPresenter->getKeyValue('keywords'))

@section('header-text')
    <div class="text-inner">
        <div class="row">
            <div class="col-md-12">
                <h3 class="to-animate fadeInUp animated color-white">
                    <i class="glyphicon glyphicon-tags"></i>
                    &nbsp;{{ $tag->name }}
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('default.article')
@endsection
