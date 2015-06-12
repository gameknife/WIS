<?php

class Backend extends CI_Controller
{
    function index()
    {
        $this->load->model("Guestmodel");
        $names = $this->Guestmodel->get_all_name();

        $data['datas'] = $names;

        $this->load->view('backend', $data);
    }
}

?>