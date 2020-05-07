<?php


class Sortant_model extends MY_Model
{
	private $errors = array('validation' => '');
	protected $validError = array();
	protected $table = 'vente';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_mod', 'validations');
	}

	public function add_produit_sortant()
	{
		$valid = $this->validations->validateSortantForm();

		if ($valid == TRUE) {
			extract($this->input->post());
			$data = array(
				'vente_date' => $vente_date,
				'vente_marque' => $vente_marque,
				'vente_model' => $vente_model,
				'vente_num_serie' => $vente_num_serie,
				'vente_descript' => $vente_descript,
				'vente_type' => $vente_type,
				'vente_quantite' => $vente_quantite
			);
			$this->create($data);

			$this->openTrans();
			$this->setTable('stock');

			$stock = $this->input->post('vente_model');
			$list_stock = $this->readLine(null, "stock_model = '$stock'");
			if (!empty($list_stock)) {
				if ($list_stock != false) {
					$qtt = $list_stock->stock_quantite;
				}
				$data = array(
					'stock_marque' => $this->input->post('vente_marque'),
					'stock_model' => $this->input->post('vente_model'),
					'stock_type' => $this->input->post('vente_type'),
					'stock_quantite' => ($qtt - $this->input->post('vente_quantite'))
				);
				$this->update($data, "stock_model = '$stock'");
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

	public function listSortant()
	{
		$query = $this->readAll();
		return $query;
	}


	public function getId($id_vente = null)
	{
		if ($id_vente != null) {
			return $this->readLine(null, array('id_vente' => $id_vente));
		} else {
			return null;
		}
	}

	public function edit_produit_sortant()
	{
		$id_vente = $this->input->post('id_vente');
		$data = array(
			'vente_num_serie' => $this->input->post('vente_num_serie'),
			'vente_descript' => $this->input->post('vente_descript')
		);
		$update = $this->update($data, "id_vente = $id_vente");

		return $update;
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
