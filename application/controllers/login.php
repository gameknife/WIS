<?php

class Login extends CI_Controller
{
	function web_test()
	{
		$this->load->view("login");
	}
	
	function login_direct( $user_data )
	{
		$this->load->library("session");
		$this->load->model("UserModel");
		
		// not log in
		$session_req = array( "uid" => $user_data["id"]);
		$this->session->set_userdata( $session_req );
		$this->UserModel->update_login_info($user_data["id"],  $user_data, $this->session->all_userdata());
		
		$user_data = $this->UserModel->get_user( $_POST["username"] );
		
		echo json_encode($user_data);
	}
	
	function test_userdata()
	{
		$this->load->library("session");
		var_dump( $this->session->all_userdata() );
	}
	
	function check_login()
	{
		$this->load->library("session");
		$this->load->model("UserModel");
		$user_data = $this->UserModel->get_user( $_POST["username"] );
		
		if( $user_data )
		{
			
			if( $user_data["password"] == $_POST["password"])
			{
				// check user status
				if( $user_data["logstatus"] == 0 )
				{
					$this->login_direct( $user_data );
				}
				else 
				{
					// 使用session来判断是否已经下线
					if( $this->session->userdata("uid") )
					{
						// 确实在线
						echo "\$error|client already online";
					}
					else
					{
						// 可能意外退出了, 检查一下时间
						echo "\$error|client already online";
						
						//$this->login_direct( $user_data );
					}
				}
			}
			else 
			{
				echo "\$error|password incorrect.";
			}
			
		}
		else
		{
			echo "\$error|user not exist.";
		}
	}
	
	function check_session()
	{
		$this->load->library("session");
		if( $this->session->userdata("uid") )
		{
			echo "user online.";
		}
		else
		{
			echo "user offline.";
		}
	}
	
	function logout()
	{
		$token = $_GET["token"];
		
		$this->load->library("session");
		$this->load->model("UserModel");
		
		if( $this->UserModel->update_login_out($token) )
		{
			echo "logout ok";
		}
		else
		{
			echo "\$error|user not login.";
		}
		
		$this->session->unset_userdata("uid");
		
		
	}
}

?>