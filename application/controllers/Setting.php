<?php


class Setting extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->username)) {
			redirect('Login');
		}
		$this->load->model('Setting_model');
	}


	public function parametre()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$this->Setting_model->updateUser();
			$data['success_message'] = "Modification réussi";
		}

		$data['user_param'] = $this->Setting_model->getUser();
		$this->load->view('content/parametre', $data);
	}
}
