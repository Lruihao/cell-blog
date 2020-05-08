@inject('userPresenter', 'App\Presenters\UserPresenter')
@php
    $author = isset($user->id) ? $user : $userPresenter->getUserInfo();
@endphp
<div class="card author">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-address-card text-primary"></i>
            {{ $author->name }}
        </h3>
    </div>
    <div class="card-body text-center">
        @if($author->avatar)
            <img src="{{ '/storage/system/'.$author->avatar }}" class="author-avatar mx-auto d-block rounded-circle" alt="author avatar">
        @else
            <img src="{{ url('/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg') }}" class="author-avatar mx-auto d-block rounded-circle" alt="author avatar">
        @endif
        <div class="motto"></div>
    </div>
    <div class="card-footer text-center">
        @if (config('github_url', config('blog.github_url')) != "")
            <span title="{{ config('github_url', config('blog.github_url')) }}" data-toggle="tooltip" data-placement="bottom" class="social-item">
                <a href="{{ config('github_url', config('blog.github_url')) }}" target="_blank" class="social-link" rel="external nofollow noopener noreferrer">
                    <i class="fab fa-github"></i>
                    Github
                </a>
            </span>
        @endif
        @if (config('weibo_url', config('blog.weibo_url')) != "")
            <span title="{{ config('weibo_url', config('blog.weibo_url')) }}" data-toggle="tooltip" data-placement="bottom" class="social-item">
                <a href="{{ config('weibo_url', config('blog.weibo_url')) }}" target="_blank" class="social-link" rel="external nofollow noopener noreferrer">
                    <i class="fab fa-weibo"></i>
                    Weibo
                </a>
            </span>
        @endif
    </div>
</div>