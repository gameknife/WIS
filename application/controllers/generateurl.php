<?php

class Generateurl extends CI_Controller
{
    function index()
    {
        $this->load->model("Guestmodel");
        $names = $this->Guestmodel->get_all_name();
        //var_dump($names);


        echo '<head><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="content-type" content="text/html; charset=utf-8"><meta charset="utf-8">' .
            '</head>';

        echo '<body>';

        echo '<p>'. '普通成都 | ' . 'http://112.74.127.44?city='. urlencode('成都') .'</p>';
        echo '<p>'. '普通太原 | ' . 'http://112.74.127.44?city='. urlencode('太原') .'</p>';

        $counter = 0;

        foreach ($names as $name) {
            $arr = (array)($name);
            echo '<p>' . $arr['name'] . ' | ' . 'http://112.74.127.44?guest=' . urlencode($arr['name']) . '&city=' . urlencode($arr['city']) . '</p>';

            if($counter++ > 20)
            {
                echo '<hr>';
                $counter = 0;
            }

        }
        echo '</body > ';
    }
}

?>