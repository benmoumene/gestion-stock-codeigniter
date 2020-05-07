<?php


class Type_model extends MY_Model
{
	private $errors = array('validation' => '');
	protected $validError = array();
	protected $table = 'type';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_mod', 'validations');
	}

	public function addType()
	{
		$valid = $this->validations->validateTypeForm();

		if ($valid == TRUE) {
			extract($this->input->post());
			$data = array(
				'type_date' => $type_date,
				'type_name' => $type_name
			);

			$insert = $this->create($data);
			return $insert;
		} else {
			$errors = $this->validations->getErrors();
			$this->validError = $errors;
			return false;
		}
	}

	public function listType()
	{
		$query = $this->readAll();
		return $query;
	}

	public function deleteType($id) // Supprimer stock = 0
	{

		$delete = $this->delete("id = $id");
		return $delete;
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
}
