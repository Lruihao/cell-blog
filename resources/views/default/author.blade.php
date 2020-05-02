@inject('userPresenter', 'App\Presenters\UserPresenter')
@php
    $author = isset($user->id) ? $user : $userPresenter->getUserInfo();
    $github_url = $systemPresenter->getKeyValue('github_url');
    $weibo_url = $systemPresenter->getKeyValue('weibo_url');
@endphp
<div class="card author">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-address-card text-primary"></i>
            {{ $author->name }}
        </h3>
    </div>
    <div class="card-body text-center">
        <img src="{{ '/storage/system/'.$author->avatar }}" class="author-avatar mx-auto d-block rounded-circle" alt="author avatar">
    </div>
    <div class="card-footer text-center">
        @if ($github_url != "")
            <span title="{{ $github_url }}" data-toggle="tooltip" data-placement="bottom" class="social-item">
                <a href="{{ $github_url }}" target="_blank" class="social-link" rel="external nofollow noopener noreferrer">
                    <i class="fab fa-github"></i>
                    Github
                </a>
            </span>
        @endif
        @if ($weibo_url != "")
            <span title="{{ $weibo_url }}" data-toggle="tooltip" data-placement="bottom" class="social-item">
                <a href="{{ $weibo_url }}" target="_blank" class="social-link" rel="external nofollow noopener noreferrer">
                    <i class="fab fa-weibo"></i>
                    Weibo
                </a>
            </span>
        @endif
    </div>
</div>