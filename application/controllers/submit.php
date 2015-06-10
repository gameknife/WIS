<?php

class Submit extends CI_Controller
{
    function index()
    {
        session_start();

        $array = array();
        if(isset($_SESSION['guest']))
        {
            $this->load->model("Wordsmodel");
            $words = $this->Wordsmodel->get_words($_SESSION['guest']);
            $array['words'] = $words;
        }
        $data['data'] = $array;
        $this->load->view('commit',$data);
    }
	
	function view_one_form($id)
	{
		$this->load->model("Wordsmodel");
		$QUERY_RESULT = $this->Wordsmodel->get_form( $id );
		if($QUERY_RESULT != null)
		{
			//$QUERY_RESULT["webRoot"] = "http://".$_SERVER ['HTTP_HOST'];
			$this->load->view("committed", $QUERY_RESULT);
		}
		else
		{
			echo "提交失败!";
		}
	}
	
	function submit_form()
	{
        // submit here, can update session now
        session_start();
        if(!isset($_SESSION['guest']))
        {
            $_SESSION['guest'] = $_POST['name'];
        }

	
		$this->load->model("Wordsmodel");
		$id = $this->Wordsmodel->insert_new_form( $_POST );

		$this->view_one_form($id);
	}

    function submit_video()
    {
        $this->load->model("Wordsmodel");
        $cmd = $this->Wordsmodel->insert_new_video( $_POST );

        // jump to success page
        //echo ("<script>window.location.href='".$this->config->site_url()."'</script>");
        // stop client, server continue ffmpeg

        // add a jump button
        //$this->load->view("uploaded");

        print <<<EOT

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

<div class="sidebar">
    <div class="container sidebar-sticky">
        <div class="sidebar-about" style="text-shadow: 0 2px 3px rgba(0,0,0,0.3),0 1px 18px rgba(0,0,0,0.3);">
            <h1>
                短片上传成功
            </h1>
            <p class="lead" style="text-shadow: 0 2px 3px rgba(0,0,0,0.3),0 1px 18px rgba(0,0,0,0.3);">易恺铭 & 徐凯的婚礼邀请</p>
        </div>

        <p style="font-size:75%; text-shadow: 0 2px 3px rgba(0,0,0,0.3),0 1px 18px rgba(0,0,0,0.3);">©K&K Studio 2015. All rights reserved.</p>
    </div>
</div>


<div class="content container">
    <div class="posts">

            <h3 class="post-title">感谢！<br>我们已经收到您的短片！</h3>
            <hr>
            <p style="font-size: 75%">温馨提醒<br>短片已经成功上传，在首页您的祝福条目中可以看到。</p>
            <hr>
            <a class="post-date" href="/" style="text-align: center;">返回首页</a>
    </div>
</div>



</body></html>

EOT;


        //fastcgi_finish_request();

        // execute object format -> mp4
        if($cmd != null)
        {
            exec($cmd, $status);
            //echo($cmd);
        }

    }
}

?>