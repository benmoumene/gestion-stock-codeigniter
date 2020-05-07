<?php


class Ajax_gestion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->username)) {
			redirect('Login');
		}
		$this->load->model('Entrant_model');
		$this->load->model('Sortant_model');
		$this->load->model('Stock_model');
	}

	/**
	 * PRODUIT ENTRANTS
	 */

	public function produit_entrant_id()
	{
		$id_achat = $this->input->post('num');
		$data = $this->Entrant_model->getId($id_achat);
		echo json_encode($data);
	}

	/**************************************************** X ************************************************/

	/**
	 * PRODUIT SORTANT
	 */

	public function produit_sortant_id()
	{
		$id_vente = $this->input->post('num');
		$data = $this->Sortant_model->getId($id_vente);
		echo json_encode($data);
	}

	public function get_produit_descript()
	{
		$vente_num_serie = $this->input->post('vente_num_serie');
		$data = $this->Entrant_model->select_produit_descript($vente_num_serie);
		//echo json_encode(array('status'=>$data));
		echo json_encode($data);
	}

	/**************************************************** X ************************************************/

	/**
	 * PRODUIT EN STOCK
	 */

	public function produit_stock_model()
	{
		$stock_marque = $this->input->post('vente_marque');
		$data = $this->Stock_model->produit_stock_model($stock_marque);
		echo json_encode($data);
	}

	public function produit_stock_qtt()
	{
		$stock_model = $this->input->post('vente_model');
		$data = $this->Stock_model->produit_stock_qtt($stock_model);
		echo json_encode($data);
	}

	/**************************************************** X ************************************************/

}

