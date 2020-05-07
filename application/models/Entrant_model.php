<?php


class Entrant_model extends MY_Model
{
	private $errors = array('validation' => '');
	protected $validError = array();
	protected $table = 'achat';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_mod', 'validations');
	}

	public function add_produit_entrant()
	{
		$valid = $this->validations->validateEntrantForm();

		if ($valid == TRUE) {
			extract($this->input->post());
			$data = array(
				'achat_date' => $achat_date,
				'achat_marque' => $achat_marque,
				'achat_model' => $achat_model,
				'achat_num_serie' => $achat_num_serie,
				'achat_descript' => $achat_descript,
				'achat_type' => $achat_type,
				'achat_quantite' => $achat_quantite
			);
			$this->create($data);

			$this->openTrans();
			$this->setTable('stock');

			$stock = $this->input->post('achat_model');
			$list_stock = $this->readLine(null, "stock_model = '$stock'");
			if (!empty($list_stock)) {
				if ($list_stock != false) {
					$qtt = $list_stock->stock_quantite;
				}
				$data = array(
					'stock_marque' => $this->input->post('achat_marque'),
					'stock_model' => $this->input->post('achat_model'),
					'stock_type' => $this->input->post('achat_type'),
					'stock_quantite' => ($qtt + $this->input->post('achat_quantite'))
				);
				$this->update($data, "stock_model = '$stock'");
			} else {
				$data = array(
					'stock_marque' => $this->input->post('achat_marque'),
					'stock_model' => $this->input->post('achat_model'),
					'stock_type' => $this->input->post('achat_type'),
					'stock_quantite' => $this->input->post('achat_quantite')
				);
				$this->create($data);
			}


			$this->complete();
			$add = $this->status();
			$this->resetTable();
			return $add;
		} else {
			$errors = $this->validations->getErrors();
			$this->validError = $errors;
			return false;
		}
	}

	public function listEntrant()
	{
		$query = $this->readAll();
		return $query;
	}

	public function getId($id_achat = null)
	{
		if ($id_achat != null) {
			return $this->readLine(null, array('id_achat' => $id_achat));
		} else {
			return null;
		}
	}

	public function edit_produit_entrant()
	{
		$id_achat = $this->input->post('id_achat');
		extract($this->input->post());
		$data = array(
			'achat_marque' => $achat_marque,
			'achat_model' => $achat_model,
			'achat_num_serie' => $achat_num_serie,
			'achat_descript' => $achat_descript,
			'achat_type' => $achat_type
		);
		$update = $this->update($data, "id_achat = $id_achat");

		return $update;
	}

	public function select_produit_descript($vente_num_serie = null)
	{
		if ($vente_num_serie != null) {
			return $this->read('achat_descript', array('achat_num_serie' => $vente_num_serie));
		} else {
			return null;
		}
	}


	/**
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * @param array $errors
	 */
	public function setErrors($errors)
	{
		$this->errors = $errors;
	}

	/**
	 * @return string
	 */
	public function getTable()
	{
		return $this->table;
	}

	/**
	 * @param string $table
	 */
	public function setTable($table)
	{
		$this->table = $table;
	}

	public function resetTable()
	{
		$this->table = 'users';
	}
}
