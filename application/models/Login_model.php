<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model
{
	protected $table = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function checkuserlogin($username)
	{
		//$user = $this->readLine(null, array('username'=>$username));
		//return $user;

		$user_details = $this->db->select('*')
			->from('users')
			->where('username', $username)
			->get()
			->row();
		return $user_details;
	}
}
