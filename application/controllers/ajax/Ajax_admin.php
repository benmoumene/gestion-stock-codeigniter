<?php


class Ajax_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->username)) {
			redirect('Login');
		}
		$this->load->model('Admin_model');
	}

	public function user_id()
	{
		$id_user = $this->input->post('num');
		$data = $this->Admin_model->getID($id_user);
		echo json_encode($data);
	}

	public function get_username()
	{
		$username = $this->input->post('username');
		$data = $this->Admin_model->select_username($username);
		echo json_encode(array('status' => $data));
	}

	public function get_cin()
	{
		$cin = $this->input->post('cin');
		$data = $this->Admin_model->select_cin($cin);
		echo json_encode(array('status' => $data));
	}
}
