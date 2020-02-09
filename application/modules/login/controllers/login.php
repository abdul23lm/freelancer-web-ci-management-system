<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$this->load->view($GLOBALS['site_theme']."/login/login");
		}
		else
		{
			redirect("dashboard");
		}
	}
	
	function act()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$dt['username'] = $_POST['username'];
 			$dt['password'] = $_POST['password'];
			$this->app_user_login_model->cekUserLogin($dt);
		}
		else
		{
			redirect("dashboard");
		}
	}
}
