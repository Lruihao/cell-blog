@inject('navPresenter', 'App\Presenters\NavigationPresenter')
@php
    $navigations = $navPresenter->simpleNavList();
@endphp
<div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="fas fa-home"></i>
                首页
            </a>
        </li>
        @if ($navigations)
            @foreach ($navigations as $navigation)
                @if($loop->index == 6)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">更多</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ $navigation->url }}"
                               target="{{ $navigation->target ? '_blank': '_self' }}">
                                <i class="fas fa-{{ $navigation->icon }}"></i>
                                {{ $navigation->name }}
                            </a>
                            @continue
                @endif
                @if($loop->index > 6)
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ $navigation->url }}"
                       target="{{ $navigation->target ? '_blank': '_self' }}">
                        <i class="fas fa-{{ $navigation->icon }}"></i>
                        {{ $navigation->name }}
                    </a>
                    @continue
                @endif
                @if($loop->index > 6 && $loop->last)
                        </div>
                    </li>
                @endif
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
        <input class="form-control mr-sm-2" type="search" value="" name="wd" placeholder="Search..." aria-label="Search">
        <button class="btn btn-light my-2 my-sm-0" type="submit">搜索</button>
    </form>
</div>