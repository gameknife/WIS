<?php

class ListForm extends CI_Controller
{
	function index()
	{
		$this->load->model("FormModel");
		$QUERY_RESULT = $this->FormModel->get_all_forms();	
		$data['QUERY_RESULT'] = $QUERY_RESULT;
		$data['value'] = null;
		$this->load->view('listform', $data);
	}
}

?>