<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('title', config('blog.title')) }} | 404页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html,body {
            margin: 0;
            height:100%;
            display: flex;
            justify-content: center;
        }
        .box {
            margin: auto;
            width: auto;
            display: flex;
            padding: 1rem;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: space-between;
            align-content: space-between;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 10px 10px 5px #888;
        }
        p {
            margin: 1rem;
            text-align: center;
        }
        #mes {
            font-size: 2rem;
            color: red;
        }
        .hint{
            font-size: 0.82rem;
            color: #888;
        }
        a {
            text-decoration: none;
        }
    </style>
    <script>
        let time = 10;
        let intervalid;
        intervalid = setInterval(function() {
            document.getElementById("mes").innerHTML = time;
            time--;
            if (time == 0) {
                window.location.href = "/";
                clearInterval(intervalid);
            }
        }, 1000);

    </script>
</head>
<body>
<div class="box">
    <img src="{{ asset('/images/404.png') }}" alt="404">
    <p>将在 <span id="mes"></span> 秒钟后返回 <a href="{{ url('/') }}">{{ config('blog_name', config('blog.blog_name')) }}</a> 首页</p>
    <p class="hint">非常抱歉 - 您可能输入了错误的网址，或者该网页已删除或移动</p>
</div>
</body>
</html>
