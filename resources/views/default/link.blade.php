@inject('linkPresenter', 'App\Presenters\LinkPresenter')
@php
    $links = $linkPresenter->linkList()
@endphp
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-users text-dark"></i>
            友情链接
        </h3>
    </div>
    <div class="card-body">
        <!-- List group -->
        <ul class="list-inline link-list">
            @forelse ($links as $link)
                @if($loop->index == 20)
                    <a class="btn btn-light text-center d-block mt-2" href="{{ url('/') }}">更多友链</a>
                    @break
                @endif
                <li class="list-inline-item">
                    <i class="fas fa-link"></i>
                    <a href="{{ $link->url }}" target="_blank"
                       rel="external nofollow noopener noreferrer">{{ $link->name }}</a>
                </li>
            @empty
                <p class="card-text">暂无友情链接！</p>
            @endforelse
        </ul>
    </div>
</div>