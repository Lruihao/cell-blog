$(function(){
    $('[align="center"]').addClass('text-center');
    $('[align="left"]').addClass('text-left');
    $('[align="right"]').addClass('text-right');
    $('li > :checkbox').parents('ul,li').addClass('list-unstyled');
    $('#share').share({sites: ['qzone', 'qq', 'weibo','wechat']});
    emojify.setConfig({img_dir : '../images/emojis'});
    emojify.run();
    // input特效
    POWERMODE.colorful = true; // make power mode colorful
    POWERMODE.shake = false; // turn off shake
    document.body.addEventListener('input', POWERMODE);
});