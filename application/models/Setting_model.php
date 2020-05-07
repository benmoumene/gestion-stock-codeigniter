<?php


class Setting_model extends MY_Model
{
	private $errors = array('validation' => '');
	protected $validError = array();
	protected $table = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_mod', 'validations');
	}

	public function getUser()
	{
		$user = $this->readLine(null, array('username' => $this->session->username));
		return $user;
	}

	public function updateUser()
	{
		$id = $this->input->post('id_user');
		$valid = $this->validations->validateParamUserForm();

		if ($valid == TRUE) {
			extract($this->input->post());
			$data = array(
				'nom' => $nom,
				'prenom' => $prenom,
				'adresse' => $adresse,
				'cin' => $cin,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'type' => $type
			);

			$update = $this->update($data, "id_user = $id");
			return $update;
		} else {
			$errors = $this->validations->getErrors();
			$this->validError = $errors;
			return false;
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
