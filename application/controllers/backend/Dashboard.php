<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
	public function index()
	{
		view('backend/Dashboard/index');
	}
	public function table(){
		$user = \Orm\User::all();
		view('backend/Dashboard/table', ['user'=> $user]);
	}
}
