<?php

class Submit extends CI_Controller
{
    function index()
    {
        $this->load->view('commit');
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
		// testing
		// echo var_dump( $_POST );
		// return;
	
		$this->load->model("Wordsmodel");
		$id = $this->Wordsmodel->insert_new_form( $_POST );

		$this->view_one_form($id);
	}

    function submit_video()
    {
        $this->load->model("Wordsmodel");
        $this->Wordsmodel->insert_new_video( $_POST );

        $this->load->model("Commonmodel");
        $this->Commonmodel->open_welcome_page();
    }
}

?>