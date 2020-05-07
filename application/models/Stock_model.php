<?php


class Stock_model extends MY_Model
{
	protected $table = 'stock';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_mod', 'validations');
	}

	/**
	 * STOCK
	 */

	public function produit_stock()
	{
		$query = $this->readAll();
		return $query;
	}

	public function deleteStock($id_stock) // Supprimer stock = 0
	{

		$delete = $this->delete("id_stock = $id_stock");
		return $delete;
	}

	/**************************************************** X ************************************************/

	/**
	 * AFFICHER LES MARQUES / MODELS / Qtt DES PRODUITS STOCKÉS DANS FORMULAIRE PRODUIT SORTANT
	 */
	public function produit_stock_marque()
	{
		$query = $this->read('stock_marque', null, 'stock_marque');
		return $query;
	}

	public function produit_stock_model($stock_marque)
	{
		$select = $this->read('stock_model', "stock_marque = '$stock_marque' and stock_quantite > '0' ");
		return $select;
	}

	public function produit_stock_qtt($stock_model)
	{
		$select = $this->read('stock_quantite, stock_type', "stock_model = '$stock_model'", 'stock_type');
		return $select;
	}

	/**************************************************** X ************************************************/


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
}
