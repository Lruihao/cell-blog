@php
$commentPlugin = $systemPresenter->getKeyValue('comment_plugin');
$appId = $systemPresenter->getKeyValue($commentPlugin.'_app_id');
$appKey = $systemPresenter->getKeyValue($commentPlugin.'_app_key');
@endphp
@if($commentPlugin !='' && $appId != '' && $appKey!='')
    @if($commentPlugin == 'valine')
        @include('default.comment.valine')
    @endif
@endif