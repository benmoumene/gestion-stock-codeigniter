<?php


class Form_mod extends MY_Model
{
	protected $errors = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function validateUserForm()
	{
		$this->form_validation->set_rules("cin", "CIN", "trim|required|integer",
			array("integer" => "Veuillez saisir que des chiffres"));
		$this->form_validation->set_rules("username", "Nom d'utilisateur", "required");
		$this->form_validation->set_rules("password", "Mots de passe", "required");

		$valid = $this->form_validation->run();
		$this->errors = $this->form_validation->error_array();
		return $valid;
	}

	public function validateParamUserForm()
	{
		$this->form_validation->set_rules("cin", "CIN", "trim|required|integer",
			array("integer" => "Veuillez saisir que des chiffres"));
		$this->form_validation->set_rules("username", "Nom d'utilisateur", "required");
		$this->form_validation->set_rules("password", "Mots de passe", "required");

		$valid = $this->form_validation->run();
		$this->errors = $this->form_validation->error_array();
		return $valid;
	}

	public function validateEntrantForm()
	{
		$this->form_validation->set_rules("achat_model", "", "trim|required",
			array("required" => "Le champ model est requis."));
		$this->form_validation->set_rules("achat_quantite", "", "trim|required|integer",
			array("integer" => "Veuillez saisir que des chiffres", "required" => "Le champ quantité est requis."));

		$valid = $this->form_validation->run();
		$this->errors = $this->form_validation->error_array();
		return $valid;
	}

	public function validateSortantForm()
	{
		$this->form_validation->set_rules("vente_model", "", "trim|required",
			array("required" => "Le champ model est requis."));
		$this->form_validation->set_rules("vente_quantite", "", "trim|required|integer",
			array("integer" => "Veuillez saisir que des chiffres", "required" => "Le champ quantité est requis."));

		$valid = $this->form_validation->run();
		$this->errors = $this->form_validation->error_array();
		return $valid;
	}

	public function validateTypeForm()
	{
		$this->form_validation->set_rules("type_name", "", "required",
			array("required" => "Le champ type est requis."));

		$valid = $this->form_validation->run();
		$this->errors = $this->form_validation->error_array();
		return $valid;
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
