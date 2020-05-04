@inject('categoryPresenter', 'App\Presenters\CategoryPresenter')
@php
    $categories = $categoryPresenter->categoryList();
@endphp
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-list text-warning"></i>
            共 {{ count($categories) }} 个分类
        </h3>
    </div>
    <div class="card-body">
        <ul class="list-inline">
            @forelse ($categories as $category)
                <li class="list-inline-item badge badge-pill badge-{{ $colorList[$loop->index % 8] }}">
                    <a href="{{ route('category', ['id' => $category->id]) }}" class="category-item">{{ $category->name }}</a>
                </li>
            @empty
                <p class="card-text">暂无分类！</p>
            @endforelse
        </ul>
    </div>
</div>