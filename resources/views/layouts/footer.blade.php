<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="my-4">
                    <strong>Powered by <a href="https://lruihao.cn" target="_blank">Cell Blog</a></strong>
                    <a href='https://github.com/Lruihao/cell-blog' target="_blank" rel="external nofollow noopener noreferrer">
                        <i class="fab fa-github"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('/libs/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/libs/bootstrap4.3/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/love.min.js') }}" async defer></script>
<script src="{{ asset('/js/index.js') }}" async defer></script>
<script src="//at.alicdn.com/t/font_578712_g26jo2kbzd5qm2t9.js" async defer></script>

@yield('script')

{{--自定义脚本--}}
{!! config('custom_script', config('blog.custom_script')) !!}