<?php

class Generateurl extends CI_Controller
{
	function index()
	{
		$this->load->model("Guestmodel");
		$names = $this->Guestmodel->get_all_name();
        //var_dump($names);


        echo '<head><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="content-type" content="text/html; charset=utf-8"><meta charset="utf-8"></head>';

        echo '<body>';
        foreach( $names as $name )
        {
            $arr = (array)($name);
            echo '<p>'.$arr['name'].' | '.'http://112.74.127.44?guest='.urlencode($arr['name']).'</p>';
        }
        echo '</body>';
	}
}

?>