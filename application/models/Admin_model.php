<?php


class Admin_model extends MY_Model
{
	private $errors = array('validation' => '');
	protected $validError = array();
	protected $table = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_mod', 'validations');
	}

	public function addUser()
	{
		$valid = $this->validations->validateUserForm();

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

			$insert = $this->create($data);
			return $insert;
		} else {
			$errors = $this->validations->getErrors();
			$this->validError = $errors;
			return false;
		}
	}

	public function listUser()
	{
		$query = $this->readAll();
		return $query;
	}

	public function getId($id_user = null)
	{
		if ($id_user != null) {
			return $this->readLine(null, array('id_user' => $id_user));
		} else {
			return null;
		}
	}

	public function edit_user()
	{
		$valid = $this->validations->validateUserForm();

		if ($valid == TRUE) {
			$id_user = $this->input->post('id_user');
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

			$update = $this->update($data, "id_user = $id_user");
			return $update;
		} else {
			$errors = $this->validations->getErrors();
			$this->validError = $errors;
			return false;
		}

	}

	public function select_username($username = null) //Savoir si le nom d'utilisateur existe déjà
	{
		if ($username != null) {
			return $this->read('username', array('username' => $username));
		} else {
			return null;
		}
	}

	public function select_cin($cin = null) //Savoir si le N° CIN existe déjà
	{
		if ($cin != null) {
			return $this->read('cin', array('cin' => $cin));
		} else {
			return null;
		}
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
