@php
$commentPlugin = config('comment_plugin', config('blog.comment_plugin'));
$appId = config($commentPlugin.'_app_id', config('blog'.$commentPlugin.'_app_id'));
$appKey = config($commentPlugin.'_app_key', config('blog'.$commentPlugin.'_app_key'));
@endphp
@if($commentPlugin && $appId && $appKey)
    @if($commentPlugin == 'valine')
        @include('default.comments.valine')
    @endif
@endif