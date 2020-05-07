<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/***********************************************************************************************************************************************************
 *    To run your queries using transactions you will use the $this->db->trans_start() and $this->db->trans_complete() functions as follows:
 *
 *    $this->db->trans_start();
 *    $this->db->query('AN SQL QUERY...');
 *    $this->db->query('ANOTHER QUERY...');
 *    $this->db->query('AND YET ANOTHER QUERY...');
 *    $this->db->trans_complete();
 *
 *    You can run as many queries as you want between the start/complete functions and they will all be committed or rolled back based on success or failure
 *     of any given query.
 *
 * =========================================================================================================================================================
 *
 *    If you would like to run transactions manually you can do so as follows:
 *
 *    $this->db->trans_begin();
 *
 *    $this->db->query('AN SQL QUERY...');
 *    $this->db->query('ANOTHER QUERY...');
 *    $this->db->query('AND YET ANOTHER QUERY...');
 *
 *    if ($this->db->trans_status() === FALSE)
 *    {
 *            $this->db->trans_rollback();
 *    }
 *    else
 *    {
 *            $this->db->trans_commit();
 *    }
 *
 *
 *************************************************************************************************************************************************************/
// -----------------------------------------------------------------------------


class MY_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		header('Content-Type: text/html; charset=utf-8');
	}

	/*
    * LANCER UNE TRANSACTION MANUELLE
    */
	public function beginTrans()
	{
		$this->db->trans_begin();
	}


	/*
    * OUVRIR UNE TRANSACTION AUTOMATISEE
    */
	public function openTrans($Mode = null)
	{

		// $Mode = TRUE  ==>  transaction en mode test.
		if ($Mode != null) {

			$this->db->trans_start($Mode);

		} else {
			// transaction en mode normale.
			$this->db->trans_start();
		}

	}

	/*
    * EXECUTE LA TRANSACTION
    */
	public function complete()
	{

		$this->db->trans_complete();
	}


	/**
	 * Commiter les données
	 */
	public function commit()
	{
		$this->db->trans_commit();
	}


	/**
	 * STATUT de la TRANSACTION  : TRUE / FALSE
	 */
	public function status()
	{

		return $this->db->trans_status();
	}


	/**
	 * ACTIVER l'AUTO_COMMIT et IGNORER L'ACTION D'APPEL DU TRANSACTION.
	 */
	public function skip_trans()
	{
		$this->db->trans_off();
	}


	public function rollBack()
	{
		$this->db->trans_rollback();
	}


	/**
	 * FORMER LES VALEURS A AJOUTER OU A METTRE A JOUR DANS LA BASE.
	 */
	public function set_data($datas)
	{
		foreach ($datas as $key => $value) {
			if (strtoupper(substr($value, 0, 7)) == 'TO_DATE' || strtoupper(substr($value, 0, 7)) == 'TO_CHAR') {
				$this->db->set($key, $value, false);
			} else {
				$this->db->set($key, $value);
			}
		}
	}


	/**
	 * RETOURNE LA DERNIERE REQUETE EXECUTE PAR LE MODEL.
	 */
	public function str_query()
	{

		$this->query_string = $this->db->last_query();

	}


	public function exec($sql, $mode = null)
	{
		$query = $this->db->query($sql);
		if ($mode == 1) {
			return $query->row();
		} else {
			return $query->result();
		}
	}


	/**
	 *  Insère une nouvelle ligne dans la base de données.
	 */
	public function create($array_datas)
	{
		$this->set_data($array_datas);
		$insert = $this->db->insert($this->table);
		return $insert;
	}


	/**
	 *  Récupère des données dans la base de données.
	 */
	public function read($select = null, $condition = null, $distinct = null, $array_order = null)
	{
		if ($distinct == TRUE) {
			$this->db->distinct();
		}

		if (is_string($select)) {

			$this->db->select($select);

		} else {
			$this->db->select('*');
		}

		if ($condition != null && is_array($condition)) {
			foreach ($condition as $key => $value) {
				$this->db->where($key, $value);
			}
		} elseif ($condition != null && !is_array($condition)) {
			$this->db->where($condition);
		}

		if ($array_order != null) {
			$this->db->order_by($array_order[0], $array_order[1]);
		}


		$liste = $this->db->get($this->table);

		return $liste->result();
	}

	/**
	 *  Récupère toutes des données dans la base de données.
	 */
	public function readAll($select = null, $condition = null, $distinct = null, $array_order = null)
	{
		if ($distinct == TRUE) {
			$this->db->distinct();
		}

		if (is_string($select)) {

			$this->db->select($select);

		} else {
			$this->db->select('*');
		}

		if ($condition != null && is_array($condition)) {
			$this->setParams($condition);
		} elseif ($condition != null && !is_array($condition)) {
			$this->db->where($condition);
		}

		if ($array_order != null) {
			$this->db->order_by($array_order[0], $array_order[1]);
		}


		$liste = $this->db->get($this->table);

		return $liste->result();
	}


	/**
	 *  Récupère des données dans la base de données.
	 */
	public function readLine($select = null, $condition = null, $array_order = null)
	{

		if (is_array($select)) {

			$this->set_value($select);

		} elseif (is_string($select)) {

			$this->db->select($select);

		} else {
			$this->db->select('*');
		}

		if ($condition != null && is_array($condition)) {
			foreach ($condition as $key => $value) {
				$this->db->where($key, $value);
			}
		} elseif ($condition != null && !is_array($condition)) {
			$this->db->where($condition);
		}

		if ($array_order != null) {
			$this->db->order_by($array_order[0], $array_order[1]);
		}


		$liste = $this->db->get($this->table);

		return $liste->row();
	}


	/**
	 *  Modifie une ou plusieurs lignes dans la base de données.
	 */

	public function update($datas, $condition)
	{

		$this->set_data($datas);
		$this->db->where($condition);
		$update = $this->db->update($this->table);

		return $update;
	}


	/**
	 *  Supprime une ou plusieurs lignes de la base de données.
	 */
	public function delete($conditions)
	{
		if ($conditions != null && is_array($conditions)) {
			foreach ($conditions as $key => $value) {
				$this->db->where($key, $value);
			}
			$delete = $this->db->delete($this->table);
		} elseif ($conditions != null && !is_array($conditions)) {
			$this->db->where($conditions);
			$delete = $this->db->delete($this->table);
		} else {
			$delete = false;
		}
		return $delete;
	}


	/**
	 *  Retourne le nombre de résultats.
	 */
	public function count($conditions = null)
	{
		if (is_array($conditions) && !empty($conditions)) {

			foreach ($conditions as $key => $param) {
				$this->db->where($key, $param);
			}

			$this->db->from($this->table);
			return $this->db->count_all_results();

		} elseif ($conditions != null && is_string($conditions)) {

			$this->db->where($conditions);
			$this->db->from($this->table);
			return $this->db->count_all_results();

		} else {
			return $this->db->count_all($this->table);
		}
	}


	public function empty_table($mode = null)
	{
		if ($mode == null || $mode == 0) {
			return $this->db->empty_table($this->table);
		} else {
			return $this->db->truncate($this->table);
		}
	}


	protected function set_value($params)
	{
		foreach ($params as $key => $values) {
			$param = explode(':', $values);
			if ($key == 'select') {
				$this->db->select($param);
			}
			if ($key == 'where') {
				if (is_array($param)) {
					$this->db->where($param[0], $param[1]);
				} else {
					$this->db->where($param);
				}
			}
			if ($key == 'or_where') {
				if (is_array($param)) {
					$this->db->or_where($param[0], $param[1]);
				} else {
					$this->db->or_where($param);
				}
			}
			if ($key == 'like') {
				$this->db->like($param[0], $param[1]);
			}
			if ($key == 'not_like') {
				$this->db->not_like($param[0], $param[1]);
			}
			if ($key == 'or_like') {
				$this->db->or_like($param[0], $param[1]);
			}
			if ($key == 'distinct') {
				$this->db->distinct();
			}
			if ($key == 'order') {
				$this->db->order_by($param[0], $param[1]);
			}
			if ($key == 'group') {
				$this->db->group_by($param);
			}

		}
	}


	function setParams($params)
	{
		if (is_array($params)) {
			foreach ($params as $type => $conditions) {
				if (is_array($conditions)) {
					foreach ($conditions as $key => $value) {
						$this->db->$type($key, $value);
					}
				} else {
					$this->db->where($conditions);
				}
			}
		}
	}


	/**
	 * Obtenir la valeur maximun d'un champ
	 * @param $field
	 * @param $alias
	 * @return mixed
	 */
	public function max($field, $alias)
	{
		$this->db->select_max($field, $alias);
		$nombre = $this->db->get($this->table);
		return $nombre->row();
	}

}


/* End of file MY_Model.php */

/* Location: ./system/application/core/MY_Model.php */
