@if(count($articles))
    <ul class="article-list list-unstyled px-sm-2">
        @foreach ($articles as $article)
            <li class="mb-1 mb-sm-3 p-4 rounded">
                <h1 class='title font-weight-bold'>
                    @if($loop->first and $article->sort)
                        <i class="fas fa-thumbtack sticky-flag" data-toggle="tooltip" data-placement="top" title="置顶"></i>
                    @endif
                    <a href="{{ route('article',['id' => $article->id]) }}" class="title-link">
                        {{ $article->title }}
                    </a>
                </h1>
                <p class="info">
                    <span>
                        <i class="fas fa-calendar" data-toggle="tooltip" data-placement="right"
                           title="{{ date('Y-m-d H:i:s', strtotime($article->created_at)) }}"></i>
                        <span>{{ date('Y-m-d', strtotime($article->created_at)) }}</span>
                    </span>
                    @if($article->category)
                    <span class="mx-1">|</span>
                    <span>
                        <i class="fas fa-folder" data-toggle="tooltip" data-placement="right" title="分类"></i>
                        <a href="{{ route('category', ['id' => $article->category_id]) }}">
                            {{ $article->category->name }}
                        </a>
                    </span>
                    @endif
                    <span class="mx-1">|</span>
                    <span>
                        <i class="fas fa-eye" data-toggle="tooltip" data-placement="right" title="阅读数"></i>
                        {{ $article->views }} views
                    </span>
                </p>
                <p class="description my-2">
                    {{ $article->description }}
                </p>
                <div class="text-right article-btn">
                    <a class="btn btn-light" href="{{ route('article',['id' => $article->id]) }}">阅读全文 »</a>
                </div>
            </li>
        @endforeach
    </ul>
    {!! $articles->links() !!}
@else
    <div class="content mx-sm-2 p-4 rounded">
        <p class="alert alert-warning mb-0">
            <i class="fas fa-exclamation-triangle"></i>
            还没有文章哟，请去 <a href="/admin">后台</a> 创建文章吧！！！
        </p>
    </div>
@endif
