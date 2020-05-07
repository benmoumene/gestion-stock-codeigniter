<?php


class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->username)) {
			redirect('Login');
		}
		$this->load->model('Admin_model');
		$this->load->model('Entrant_model');
		$this->load->model('Sortant_model');
		$this->load->model('Stock_model');
		$this->load->model('Type_model');
	}

	public function index()
	{
		$data = $this->session->username;
		$this->load->view('content/home', $data);
	}

	public function user()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$action = $this->input->post('action_user');
			if ($action == 'ajout') {
				$this->Admin_model->addUser();
				$this->data['success_message'] = "Enregistrement éffectué";
			} elseif ($action == 'modifier') {
				$this->Admin_model->edit_user();
				$this->data['success_message'] = "Modification éffectué";
			}

		}

		$this->data['user'] = $this->Admin_model->listUser();
		$this->load->view('content/admin/user', $this->data);
	}

	public function product()
	{
		$this->data['list_achat'] = $this->Entrant_model->listEntrant();
		$this->data['list_sortant'] = $this->Sortant_model->listSortant();
		$this->data['stock'] = $this->Stock_model->produit_stock();
		$this->load->view('content/admin/product', $this->data);
	}

	public function delete($id_stock)
	{
		$this->Stock_model->deleteStock($id_stock);
		redirect('admin/product');
	}

	public function add_type()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$this->Type_model->addType();
		}

		redirect('admin/list_type');
	}

	public function list_type()
	{

		$this->data['type_liste'] = $this->Type_model->listType();
		$this->load->view('content/admin/type_produit', $this->data);
	}


	public function delete_type($id)
	{
		$this->Type_model->deleteType($id);
		redirect('admin/list_type');
	}
}
