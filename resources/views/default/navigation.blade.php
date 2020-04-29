<div class="collapse navbar-collapse" id="navbar">
    @inject('navPresenter', 'App\Presenters\NavigationPresenter')
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-th"></i>
                分类
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-tags"></i>
                标签
            </a>
        </li>
        <?php $navigations = $navPresenter->simpleNavList(); ?>
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
</div>