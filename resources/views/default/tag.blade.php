@inject('tagPresenter', 'App\Presenters\TagPresenter')
@php
    $tags = $tagPresenter->tagList();
@endphp
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-tags text-success"></i>
            共 {{ count($tags) }} 个标签
        </h3>
    </div>
    <div class="card-body">
        <ul class="list-inline">
            @forelse ($tags as $tag)
                <li class="list-inline-item badge badge-pill badge-{{ $colorList[$loop->index % 8] }}">
                    <a href="{{ route('tag', ['id' => $tag->id]) }}" class="tag-item">{{ $tag->name }}</a>
                </li>
            @empty
                <p class="card-text">暂无标签！</p>
            @endforelse
        </ul>
    </div>
</div>