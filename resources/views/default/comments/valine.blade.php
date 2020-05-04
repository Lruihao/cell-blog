<script src='//unpkg.com/valine/dist/Valine.min.js'></script>
<script>
    new Valine({
        el: '#comments',
        appId: '{{ $appId }}',
        appKey: '{{ $appKey }}',
        placeholder: 'ヾﾉ≧∀≦)o~ 有事请留言！\n评论功能以邮件作为通知方式！\n如有必要请填写正确邮箱！',
        avatar: 'wavatar',
        pageSize: 10,
        visitor: true,
        enableQQ: true,
        requiredFields: ['mail']
    });
</script>
