<?php

class Generateurl extends CI_Controller
{
	function index()
	{
		$this->load->model("Guestmodel");
		$names = $this->Guestmodel->get_all_name();
        //var_dump($names);

        foreach( $names as $name )
        {
            $arr = (array)($name);
            echo $arr['name'].' | '.'http://112.74.127.44?guest='.urlencode($arr['name']);
            echo "<br>";
        }
	}
}

?>