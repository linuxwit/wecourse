<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Document</title>
    <link rel="stylesheet" href="app/mobile/css/main.css">
    <style>
        .indicator{
            position: fixed;
            right: 10px;
            top: 50%;
            margin-top: -40px;
        }
        .indicator li{
            margin-top: 10px;
            width: 10px;
            height: 10px;
            border-radius: 100px;
            background: rgba(0,0,0,0.5);
            text-indent: -9999px;
            list-style: none;
        }
        .indicator li.cur{
            background: rgba(255,255,255,0.5);
        }
    </style>
</head>
<body>
    <div class="wp">
        <div class="wp-inner">
            <div class="page page1">1</div>
            <div class="page page2">2</div>
            <div class="page page3">3</div>
            <div class="page page4">4</div>
        </div>
        <ul class="indicator">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
    </div>
    <span class="start"><b></b></span>
    <script src="app/mobile/js/zepto.min.js"></script>
    <script src="app/mobile/js/zepto.fullpage.js"></script>
    <script>
        $('.wp-inner').fullpage({
            change: function (e) {
                console.log('change', e.next, e.cur);
                $('.indicator li').removeClass('cur').eq(e.next).addClass('cur');
            },
            beforeChange: function (e) {
                console.log('beforeChange', e.next, e.cur);
            },
            afterChange: function (e) {
                console.log('afterChange', e.next, e.cur);
            }
        });
    </script>
</body>
</html>