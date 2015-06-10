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
        echo ("<script>window.location.href='".$this->config->site_url()."'</script>");
        // stop client, server continue ffmpeg
        fastcgi_finish_request();

        // execute object format -> mp4
        if($cmd != null)
        {
            exec($cmd, $status);
            echo($cmd);
        }

    }
}

?>