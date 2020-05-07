<?php


class Gestion extends MY_Controller
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
		$this->load->model('Type_model');
	}

	public function index()
	{
		$data = $this->session->username;
		$this->load->view('content/home', $data);
	}

	/**
	 * PRODUIT ENTRANTS
	 */

	public function produit_entrant()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$action = $this->input->post('action_achat');
			if ($action == 'ajout') {
				$this->Entrant_model->add_produit_entrant();
			} else {
				$this->Entrant_model->edit_produit_entrant();
			}
		}
		redirect('Gestion/produit_entrant_list');
	}

	public function produit_entrant_list()
	{
		$this->data['type_liste'] = $this->Type_model->listType();
		$this->data['list_entrant'] = $this->Entrant_model->listEntrant();
		$this->load->view('content/gestion/produit_entrant', $this->data);
	}

	/**************************************************** X ************************************************/

	/**
	 * PRODUIT SORTANTS
	 */

	public function produit_sortant()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$action = $this->input->post('action_vente');
			if ($action == 'ajout') {
				$this->Sortant_model->add_produit_sortant();
			} elseif ($action == 'modifier') {
				$this->Sortant_model->edit_produit_sortant();
			}

		}
		redirect('Gestion/produit_sortant_list');
	}

	public function produit_sortant_list()
	{
		$this->data['produit_stock_marque'] = $this->Stock_model->produit_stock_marque();
		$this->data['list_sortant'] = $this->Sortant_model->listSortant();
		$this->load->view('content/gestion/produit_sortant', $this->data);
	}

	/**************************************************** X ************************************************/

	/**
	 * PRODUIT EN STOCK
	 */

	public function stock()
	{
		$this->data['stock'] = $this->Stock_model->produit_stock();
		$this->load->view('content/gestion/produit_stock', $this->data);
	}

	/**************************************************** X ************************************************/

	/**
	 *    HTML TO PDF
	 */

	// Produit entrant //
	public function entrantPDF()
	{
		/**
		 *    CREER UN BTN DANS LA VUE CORRESPONDANT POUR CHARGER LA FONCT°
		 */

		$this->data['list_entrant'] = $this->Entrant_model->listEntrant();
		$this->load->view('pdf/pdf_produit', $this->data);


		// Get output html
		$html = $this->output->get_output();

		// Load pdf library
		$this->load->library('pdf');

		// Load HTML content
		$this->dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream("Produit_entrant.pdf", array("Attachment" => 0));
	}
}
