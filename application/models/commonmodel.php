<?php
class Commonmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    public function open_welcome_page()
    {
        $this->load->model("Wordsmodel");
        $QUERY_RESULT = $this->Wordsmodel->get_all_forms();
        $data['QUERY_RESULT'] = $QUERY_RESULT;
        $data['value'] = null;
        $this->load->view('welcome_message', $data);
    }
}
?>