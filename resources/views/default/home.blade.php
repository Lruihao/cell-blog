@extends('layouts.app')

@section('title', config('title', config('blog.title')))

@section('description', config('description', config('blog.description')))

@section('keywords', config('keywords', config('blog.keywords')))

@section('header-text')
    <p class="lead welcome">{{ config('welcome_words', config('blog.welcome_words')) }}</p>
@endsection

@section('content')
    @include('default.article')
@endsection
