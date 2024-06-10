<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$login_salah = '';

		if($this->session->has_userdata('username')) {
			redirect('backend/dashboard');
		}

		if($this->input->post()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
	
			$user = \Orm\User::first();
			if($username == $user->username && $password == $user->password){
				$userdata = [
					'username' => $user->username,
				];
				$this->session->set_userdata($userdata);
				redirect('backend/dashboard');
			}else {
				$login_salah = 'kombinasi username & password salah';
	
			}	
		}

		view('login' , ['login_salah' => $login_salah]);
	}	

	public function logout (){
		$this->session->sess_destroy();
		redirect('login');
	}
}

