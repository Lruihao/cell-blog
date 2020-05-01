$(function(){
    $('[align="center"]').addClass('text-center');
    $('[align="left"]').addClass('text-left');
    $('[align="right"]').addClass('text-right');
    $('#share').share({sites: ['qzone', 'qq', 'weibo','wechat']});
    emojify.setConfig({img_dir : '../images/emojis'});
    emojify.run();
    hljs.initHighlightingOnLoad();
});