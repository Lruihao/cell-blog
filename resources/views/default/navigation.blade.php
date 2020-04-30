@inject('navPresenter', 'App\Presenters\NavigationPresenter')
@php
    $navigations = $navPresenter->simpleNavList();
@endphp
<div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
        @if ($navigations)
            @foreach ($navigations as $navigation)
                <li class="nav-item">
                    <a class="nav-link" href="{{ $navigation->url }}"
                       target="{{ $navigation->target ? '_blank': '_self' }}">
                        <i class="fas fa-{{ $navigation->icon }}"></i>
                        {{ $navigation->name }}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get">
        <input class="form-control mr-sm-2" type="search" value="" name="keyword" placeholder="Search" aria-label="Search">
    </form>
    <a class="btn btn-light" href="{{ url('/admin') }}" target="_blank">登录</a>
</div>