<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-us">
<head>
  <link href="http://gmpg.org/xfn/11" rel="profile">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta charset="utf-8">
  <!-- Enable responsiveness on mobile devices-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

  <title>
      易恺铭 & 徐凯的婚礼邀请
  </title>

  <!-- CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="/style.css"> -->
    <link rel="stylesheet" href="/public/css/poole.css">
    <link rel="stylesheet" href="/public/css/syntax.css">
    <link rel="stylesheet" href="/public/css/hyde.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700|Abril+Fatface">


    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/apple-touch-icon-144-precomposed.png">

  </head>


    <body class="theme-base-0d">
    <audio src="/images/card/bgm1.mp3" autoplay="autoplay" loop="loop" id="autoplay"></audio>
      <div class="sidebar">
    <div class="container sidebar-sticky">
        <div class="sidebar-about">
            <img src="/images/static/title320.png" alt="Kaiming Yi" style="margin: auto auto 2rem auto;">
        </div>
      <div class="sidebar-about">
        <h1>
          <a href="/">
              易恺铭 & 徐凯
          </a>
        </h1>
        <p class="lead">我们的婚礼邀请</p>
      </div>
      <nav>
      <a class="sidebar-nav-item" href="/index.php/submit">> 给我们祝福的话语 <</a>
      <a class="sidebar-nav-item" href="/index.php/showreel">> 看我们的照片 <</a>
      <br>
      </nav>
      <p>©K&K Studio 2015. All rights reserved.</p>
    </div>
  </div>


      <div class="content container">
        <div class="posts">

            <h3 class="post-title">谨定于<span style="color: #6a9fb5">2015年7月18日</span></h3>
            <h3 class="post-title">农历<span style="color: #6a9fb5">六月初三星期六</span></h3>
            <h3 class="post-title">中午12点</h3>
            <h3 class="post-title">举行结婚喜宴</h3>

            <!-- Pattern Hr -->
          <br/><img style="max-height:35px; max-width:60%;" src="/images/static/divider.png" /><br/>


          <h3 class="post-title">新郎：易恺铭</h3>
          <h3 class="post-title">新娘：徐凯</h3>
          <br><br>

          <h3 class="post-title">我们诚挚的邀请您及家人为我们祝福！</h3>

          <!-- Pattern Hr -->
          <br/><img style="max-height:35px; max-width:60%;" src="/images/static/divider.png" /><br/>

          <h4 class="post-title">地点</h4>
          <br>
          <h3 class="post-date">&nbsp;&nbsp;呈祥东馆（南苑店）</h3>
          <p>成都市高新区益州大道锦城公园东门</p>
          <br>

          <p>驾车：益州大道锦城公园东门进入园区<br>
              公交：益州大道锦悦西路口站：<br>
              26路; 84路; 115路; 162路; 236路; 801路; 805路; 815a路; 815路<br>
              地铁：地铁一号线锦城广场站，到站后绕环球中心向西步行20分钟</p>
          <!-- Baidu URI Api-->
          <a href='http://api.map.baidu.com/geocoder?address=呈祥东馆(南苑店)&output=html' target='_blank'> <img style="max-width:50%" src="
          /images/static/map.png" /></a>
          <br>

          <!-- Pattern Hr -->
          <br><img style="max-height:35px; max-width:60%;" src="/images/static/divider.png" /><br>
          <br>
            <a class="post-date" href="/index.php/submit" style="text-align: center">>点击给我们祝福的话语<</a>

              <!-- Pattern Hr -->
              <br><img style="max-height:35px; max-width:60%;" src="/images/static/divider.png" /><br>

              <h4 class="post-title">收到的祝福</h4>
                <p><?php echo(count($QUERY_RESULT)) ?>份</p>
                <hr>
              <?php
              $id = 0;

              //$QUERY_RESULT = array_reverse($QUERY_RESULT);
              if( count($QUERY_RESULT) > 0)
              {


              foreach ( $QUERY_RESULT as $value) {
                  $avalue = (array)$value;
                  $name = $avalue['name'];
                  $words = $avalue['words'];
                  ?>

                  <div class="post">
                      <li class="post-date" style="text-align: center;"><?php echo $name ?>说:</li>
                      <p class="post-title">
                          <?php
                          echo($words); ?>
                      </p>

                      <?php
                      if($avalue['video'] != null)
                      {
                      ?>

                      <a class="post-date" style="text-align: center;" href="<?php echo("index.php/showcomment/showid/".$avalue['id'])?>">祝福短片  >>></a>

                      <?php
                      }
                      ?>
                  </div>
                  <hr>

              <?php
              }
              }
              ?>
      </div>
    </div>

  

</body></html>