<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        session_start();

        if(!isset($_SESSION['guest']))
        {
            if(array_key_exists('guest', $_GET))
            {
                $guest_name = $_GET['guest'];
                $_SESSION['guest'] = $guest_name;
            }
        }
        else
        {

        }

        if(array_key_exists('city', $_GET))
        {
            $city = $_GET['city'];
            $_SESSION['city'] = $city;
        }

        // login count
        if(isset($_SESSION['guest']))
        {
            $this->load->model("Guestmodel");
            $this->Guestmodel->add_login_time($_SESSION['guest']);
        }

        $this->load->model("Commonmodel");
        $this->Commonmodel->open_welcome_page();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */