<footer class="footer text-center my-4">
    <div class="container">
        @include('default.analytics.busuanzi')
        <div class="row">
            <div class="col-md-12">
                <span class="copyright">
                    Copyright
                    <span class="copyright-icon">&copy;</span>
                    <span class="copyright-year" itemprop="copyrightYear">@php echo(date('Y')) @endphp</span>
                    <span class="author" itemprop="copyrightHolder">{{ config('copyright_holder', config('blog.copyright_holder')) }}. </span>
                </span>
                @if(config('icp_info', config('blog.icp_info')))
                    <span class="icp-info">
                        <a href="http://www.beian.miit.gov.cn" target="_blank" rel="external nofollow noopener noreferrer">
                        {{ config('icp_info', config('blog.icp_info')) }}
                        </a>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <strong>Powered by <a href="https://lruihao.cn" target="_blank">Cell Blog</a></strong>
                <a href="https://github.com/Lruihao/cell-blog" target="_blank"
                   rel="external nofollow noopener noreferrer" aria-label="Star on GitHub">
                </a>
                <iframe class="github-star" frameborder="0" scrolling="0" src="https://ghbtns.com/github-btn.html?user=Lruihao&amp;repo=cell-blog&amp;type=star&amp;count=true">
                </iframe>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top fa-stack d-none">
    <i class="fas fa-circle fa-stack-2x"></i>
    <i class="fas fa-arrow-up fa-stack-1x fa-inverse"></i>
</div>

<script type="text/javascript" src="{{ asset('/libs/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/libs/bootstrap4.3/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/love.min.js') }}" async defer></script>
<script type="text/javascript" src="{{ asset('/js/index.js') }}" async defer></script>
<script type="text/javascript" src="//at.alicdn.com/t/font_578712_g26jo2kbzd5qm2t9.js" async></script>
<script type="text/javascript" src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js" async></script>

@yield('script')

{{--自定义脚本--}}
{!! config('custom_script', config('blog.custom_script')) !!}