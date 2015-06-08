<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-us">
<head>
  <link href="http://gmpg.org/xfn/11" rel="profile">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta charset="utf-8">
  <!-- Enable responsiveness on mobile devices-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

  <title>
      估价查勘表 - 提交结果
  </title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/style.css">
  <link rel="stylesheet" href="/public/css/poole.css">
  <link rel="stylesheet" href="/public/css/syntax.css">
  <link rel="stylesheet" href="/public/css/hyde.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700|Abril+Fatface">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/apple-touch-icon-144-precomposed.png">
</head>


  <body>

    <div class="sidebar">
  <div class="container sidebar-sticky">
  
    <div class="sidebar-about">
      <h1>
        <a href="/">
          估价查勘表
        </a>
      </h1>
      <p class="lead">表单结果</p>
    </div>
    
    <nav>
    <a class="sidebar-nav-item" href="/index.php/welcome">提交表单</a>
    <a class="sidebar-nav-item" href="/index.php/listform">查询表单</a>
    <br>
    </nav>

    <p>©Vistandard 2015. All rights reserved.</p>
  </div>
</div>


    <div class="content container">
      <div class="posts">
	
	<h3 class="post-title">所有房产查勘表单</h3>
<hr>
	
	<?php 
	$id = 0;
	foreach ( $QUERY_RESULT as $value)
	{
		$avalue = (array)$value;
		$id = $avalue['id'];
	?>
	
  <div class="post" style="margin: 0 0 1em 0;">
	<li class="post-date" style="display: initial;">项目<?php echo $id ?> &nbsp|&nbsp&nbsp</li>
	<a class="post-title" href="<?php echo('submit/view_one_form/'.$id) ?>">
	<?php 
	echo( $avalue['proj_name']); ?>
	</a>
  </div>
  	<?php 
	
	}
	?>
	
</div>
    </div>

  

</body></html>