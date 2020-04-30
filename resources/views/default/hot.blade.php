@inject('hotArticle', 'App\Presenters\ArticlePresenter')
@php
    $hotArticleList = $hotArticle->hotArticleList();
@endphp
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-fire-alt text-danger"></i>
            热门文章
        </h3>
    </div>
    <!-- List group -->
    <ul class="list-group hot-list">
        @if ($hotArticleList)
            @foreach ($hotArticleList as $hal)
                <li class="d-flex justify-content-between align-items-center list-group-item list-group-item-action list-group-item-{{ $colorList[$loop->index % 8] }}">
                    <a href="{{ route('article', ['id' => $hal->id]) }}">
                        <i class="fas fa-link text-{{ $colorList[$loop->index % 6] }}"></i>
                        {{ $hotArticle->formatTitle($hal->title) }}
                    </a>
                    <span class="badge badge-pill badge-secondary">{{ $hal->views }}</span>
                </li>
            @endforeach
        @endif
    </ul>
</div>