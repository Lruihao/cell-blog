/**
 * @Name: index.css
 * @Description: 博客首页js
 * @Author: 李瑞豪
 * @Update: 2020-5-6 23:54
 */

/**
 * 文档载入完成
 */
$(function () {

    $('[data-toggle="tooltip"]').tooltip();
    b2t();
    crashCheat();
    getRandomMotto();
    $('.motto').on('click',function () {
        getRandomMotto();
    });

    console.log("\n`              @@#``@@@@@@@@@@@@@@@@@@##,`   \n`              @@#`;@@@@@@@@@@@@@@@@@@@':'   \n`              @@#`@@@@@@@@@@@@@@@@@@@#+#;`  \n`              @@#`@@@@@@@@@@@@@@@@@@###@'.  \n`              @@+.@@@@@@@@@@@@@@@@@@@@@##,  \n`              @@#,@@@@@@@@@@@@@@@@@@@@@@#,  \n`              #@#:@@@@@@@@@@@@@@@@@@@@@@@,  \n`              #@#'@@@@@@@@@@@@@@@@@@@@@@@.  \n`              +@#;@@@@@@@@@@@@@@@@@@@@@@#   \n`          `;: ;@#'@@@@@@@@@@@@@@@@@@+'+@'   \n`    `,,;';'+';'@@+:@@@@@@@@@@@@##@#',.:#;   \n,, ``    ``..,:;@@#'@@@@@@@@#####@@@@#:`:.   \n`       `````:++@@@@@@@@@@@@@###@@@@#+,..    \n        ``````.#@@@@@@@@@@@@@@#@@@#++#'``    \n`    ```.,,:,.`:@@@@@@@@@@@@@###@@@##'.`     \n``..`````..,::;+@@@@@@@@@@@@#+`::+##'`.      \n`      ````.```,@@@@@@@@@@@##;``.,';` `      \n``.;@@@@@@@@@@@@@@@@@@@@@@###;``..``````     \n#@@@@@@@@@@@@@@@@@@@@@@@@##@#;``,``,.``      \n@@@@@@@@@@@@@@@@@@@.`````..``.. +` `:`       \n@+''++#####@@#`.@@@``````` ` `,```  ``       \n';;;;'+##+'+.`;+@@@,..```` `` :,.            \n;::,,:;+#++``,,#@@@'..``````` ,`.``          \n;,,,,...'#.,,..#@@@#,,.`````` .````          \n:,,,,....`,::;''+#@#;,..`````````.``         \n:,,,.....'##++''';:+':,.`..,,...`            \n:,,,...#####+'+#@@@'.';+:.  ` ``             \n;,,.`'####'#,`.`+@@@+'``` `.`                \n;,.`#@@@#+:'+++##+@##@,,,,`                  \n',.#@@###'''';:,.```,+#.                     \n+,#@@@####;,,..```````````````         `.:,::\n+@@@@###+;,,..``````````````````          `.,\n#@@@##+',,,........``````````````            \n@@@@#+:,,,,`........``````````               \n@@@#+:,,,,.`````.....``````````           `` \n@@##':,......`````....```  `````          ```\n@@@#':,....,..``````..````    ```         ```\n@@@#',....,,,..```````````     ```         ..\n@@@#,.....,,,,.``  ````````   ``````         \n@@@+....,,,,,..`````````````   ``````````    \n@@@:....,,,,.LiRuihao````````  ```````````` \n#@@,....,,,,.Always Be Yourself !````````````\n,##,,...,::,.````````````..``````   `......``\n,'#,,..,,:::.`````````........``````   `.,,..\n");
    console.log("%c Cell-Blog | QQ:1074627678 %c https://lruihao.cn %c \n\n您好！\n欢迎来到李瑞豪的个人博客，\n如有问题请多多指教。\n", "color: #FF0000; background: #4bffba; padding:5px 0; border-radius: 5px 5px 5px 5px;", "background: #fadfa3; padding:5px 0; border-radius: 5px 5px 5px 5px;","");

});

/**
 * back-to-top 功能
 */
function b2t(){
    $(document).scrollTop() == 0 ? $('.back-to-top').addClass('d-none') : $('.back-to-top').removeClass('d-none');
    $(window).scroll(function () {
        $(document).scrollTop() == 0 ? $('.back-to-top').addClass('d-none') : $('.back-to-top').removeClass('d-none');
    });
    $('.back-to-top').on('click',function () {
        $('html,body').animate({scrollTop: '0'}, 'slow');
    });
}

/**
 * 网页标题崩溃欺骗
 */
function crashCheat() {
    let oldTitle = document.title;
    let titleTime; //標題恢復計時器
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
            $('[rel="icon"]').attr('href', '/images/icons/crash.png');
            document.title = "網站崩潰了！";
            clearTimeout(titleTime);
        } else {
            document.title = '其實並沒有！';
            $('[rel="icon"]').attr('href', '/favicon.ico');
            titleTime = setTimeout(function () {
                document.title = oldTitle;
            }, 1000);
        }
    });
}

/**
 * 异步获取随机格言
 */
function getRandomMotto() {
    $.ajax({
        'url': '/api/motto',
        'method': 'GET',
        'success': function (response) {
            $('.motto').text(response.motto);
        },'error': function () {
            $('.motto').text('格言加载失败！');
        }
    })
}