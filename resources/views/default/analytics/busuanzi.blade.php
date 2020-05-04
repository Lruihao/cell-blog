@if(config('busuanzi_count', config('blog.busuanzi_count')))
    <div class="busuanzi-count row">
        <div class="col-md-12">
            <span id="busuanzi_container_site_uv" title="访客数" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-user-secret"></i>
                <span id="busuanzi_value_site_uv"><i class="fas fa-spinner fa-spin"></i></span> 人次
            </span>
            @if(config('run_time', config('blog.run_time')))
                <span class="divider">|</span>
                <span class="run-times" title="网站运行时间" data-toggle="tooltip" data-placement="top">载入天数时分秒...</span>
            @endif
            <span class="divider">|</span>
            <span id="busuanzi_container_site_pv" title="访问量" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-eye"></i>
                <span id="busuanzi_value_site_pv"><i class="fas fa-spinner fa-spin"></i></span> 次
            </span>
        </div>
    </div>
@endif

@if(config('run_time', config('blog.run_time')))
<script>
    function createTime() {
        let now = new Date();
        let run = new Date("{{ config('run_time', config('blog.run_time')) }}");
        //總的秒數
        let runTime = (now - run) / 1000,
            days = Math.floor(runTime / 60 / 60 / 24),
            hours = Math.floor(runTime / 60 / 60 - (24 * days)),
            minutes = Math.floor(runTime / 60 - (24 * 60 * days) - (60 * hours)),
            seconds = Math.floor((now - run) / 1000 - (24 * 60 * 60 * days) - (60 * 60 * hours) - (60 * minutes));
        //前置零
        if (String(hours).length === 1) {
            hours = "0" + hours;
        }
        if (String(minutes).length === 1) {
            minutes = "0" + minutes;
        }
        if (String(seconds).length === 1) {
            seconds = "0" + seconds;
        }
        document.querySelector(".run-times").innerHTML = days + "&thinsp;天&thinsp;" + hours
            + "&thinsp;时&thinsp;" + minutes + "&thinsp;分&thinsp;" + seconds + "&thinsp;秒";
    }
    if (!document.hidden) {
        let siteTime = setInterval("createTime()", 500);
    } else {
        clearInterval(siteTime);
    }
</script>
@endif