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
        $data['use_ty'] = false;
        $this->load->view('welcome_message', $data);
    }

    public function open_comment_page($id)
    {
        //$data['id'] = $id;

        $this->load->model("Wordsmodel");
        $comment = $this->Wordsmodel->get_form($id);

        $data['comment'] = $comment;

        $this->load->view('oneword',$data);
    }
}
?>