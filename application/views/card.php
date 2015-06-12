<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"/>
    <link rel="stylesheet" href="/public/css/poole.css">
    <link rel="stylesheet" href="/public/css/hyde.css">
    <link href="/public/css/islider.css" rel="stylesheet">
    <link href="/public/css/floatbutton.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #202020;
            overflow: hidden;
        }

        /*ul wrapper*/
    </style>
</head>

<?php
function readimgs($filedir)
{
    $result = array();
    $dir = @ dir($filedir);
    if ($dir != null) {
        while (($file = $dir->read()) !== false) {
            if (is_dir($filedir . "/" . $file) AND ($file != ".") AND ($file != "..")) {
                showDir($filedir . "/" . $file);
            } else if (($file != ".") AND ($file != "..")) {
                array_push($result, '{\'content\': \'<img src="/' . $filedir . "/" . $file . '" />\'}');
            }
        }
        $dir->close();
    }

    return $result;
}

?>

<body>
<!-- Outer Canvas 外层画布 -->
<div id="iSlider-wrapper"></div>
<aside class="media-wrap">
    <span id="musicBtnTxt" style="display: none;"></span>
    <i id="musicBtn" class="music-btn on"></i>
</aside>

<aside class="media-wrap1">
    <i id="homeBtn" class="home-btn"></i>
</aside>

<aside class="media-wrap2">
    <i id="autoBtn" class="auto-btn"></i>
</aside>

<audio src="/images/card/bgm1.mp3" autoplay="autoplay" loop="loop" id="autoplay"></audio>
<div id="iSlider-arrow"></div>
<script src="/public/js/islider.js"></script>

<script>
    // php construct files
    var list = [
        { 'content' : '<div>' +
        '<h5 style="color:#777777">< 操作说明 ></h5>' +
        '<h4 style="color:#aaaaaa">垂直拖拽滑动切换照片</h4>' +
        '<h4 style="color:#aaaaaa">键盘上下键切换照片</h4>' +
        '<h4 style="color:#aaaaaa">快速双击图片放大</h4><br>' +
        '<img width=25em src="/images/card/music-icon-on.png"/><p style="color:#aaaaaa">&nbsp&nbsp播放/暂停音乐</p>' +
        '<img width=25em src="/images/card/auto-icon.png"/><p style="color:#aaaaaa">&nbsp&nbsp幻灯片播放</p>' +
        '<img width=25em src="/images/card/back-icon.png"/><p style="color:#aaaaaa">&nbsp&nbsp返回首页</p>' +
        '<h4 style="color:#777777; font-size: 50%">您第一次加载消耗800KB流量，将所有照片看完仅需3MB流量，可在数据网络下放心滑动~</h4>' +
        '</div>'},
        <?php
            $files = readimgs('images/card/photos');
            foreach( $files as $file )
            {
            ?>
            <?php echo $file . ',';?>
            <?php
            }
        ?>
            ];

    var islider = new iSlider(
        {


            type: 'dom',
            data: list,
            dom: document.getElementById("iSlider-wrapper"),
            isVertical: true,
            isLooping: true,
            animateType: 'default',
            useZoom: true,
            onslidechange: function (idx) {

                if (this.isLooping === false) {
                    if (idx === this.data.length - 1) {
                        document.getElementById('iSlider-arrow').style.display = 'none';
                    }
                    else {
                        document.getElementById('iSlider-arrow').style.display = 'block';
                    }
                }
            }
        });

    var audio = document.getElementById('autoplay');
    var controller = document.getElementById('musicBtn');
    var controllerHint = document.getElementById('musicBtnTxt');
    var autocontroller = document.getElementById('autoBtn');
    function toggle_music() {

        if (audio.paused === true) {
            audio.play();
            controller.className = 'music-btn on';
        } else {
            audio.pause();
            controller.className = 'music-btn';
        }

    }

    function back_home() {
        window.location.href = '/';
    }

    function auto_play() {
        if (islider.isAutoplay === true) {
            autocontroller.className = 'auto-btn';
            islider.isAutoplay = false;
            islider.pause();

        }
        else {
            autocontroller.className = 'auto-btn on';
            islider.isAutoplay = true;
            islider.play();
        }
    }

    function prev()
    {
        islider.slideTo(islider.slideIndex - 1);
    }

    function next()
    {
        islider.slideTo(islider.slideIndex + 1);
    }

    function fnKeydown(event){

        if(event.keyCode == 38)
        {
            prev();
        }

        if(event.keyCode == 40) {
            next();
        }
    }

    document.getElementById('musicBtn').addEventListener('click', toggle_music, false);
    document.getElementById('homeBtn').addEventListener('click', back_home, false);
    document.getElementById('autoBtn').addEventListener('click', auto_play, false);
    document.addEventListener("keydown",fnKeydown,true);

</script>
</body>
</html>
