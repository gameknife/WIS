<?php

class Showcomment extends CI_Controller
{
    function index()
    {
        $this->load->model("Commonmodel");
        $this->Commonmodel->open_comment_page(23);
    }

    function showid($id)
    {
        $this->load->model("Commonmodel");
        $this->Commonmodel->open_comment_page($id);
    }
}

?>