<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->set_template('base');


		$this->load->css('assets/Login_v17/vendor/bootstrap/css/bootstrap.min.css');
		$this->load->css('assets/Login_v17/vendor/css-hamburgers/hamburgers.min.css');
		$this->load->css('assets/Login_v17/vendor/animsition/css/animsition.min.css');
		$this->load->css('assets/Login_v17/vendor/select2/select2.min.css');
		$this->load->css('assets/Login_v17/vendor/daterangepicker/daterangepicker.css');
		$this->load->css('assets/Login_v17/css/util.css');
		$this->load->css('assets/Login_v17/css/main.css');

		$this->load->js('assets/Login_v17/vendor/jquery/jquery-3.2.1.min.js');
		$this->load->js('assets/Login_v17/vendor/animsition/js/animsition.min.js');
		$this->load->js('assets/Login_v17/vendor/bootstrap/js/popper.js');
		$this->load->js('assets/Login_v17/vendor/bootstrap/js/bootstrap.min.js');
		$this->load->js('assets/Login_v17/vendor/select2/select2.min.js');
		$this->load->js('assets/Login_v17/vendor/daterangepicker/moment.min.js');
		$this->load->js('assets/Login_v17/vendor/daterangepicker/daterangepicker.js');
		$this->load->js('assets/Login_v17/vendor/countdowntime/countdowntime.js');
		$this->load->js('assets/Login_v17/js/main.js');

		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function login()
	{
		$error = array();

		$username = $this->input->post('username', TRUE);
		$pass = $this->input->post('pass', TRUE);

		$user_detail = $this->login_model->checkuserlogin($username);
		if ($pass = $user_detail->password) {
			$session_data['id'] = $user_detail->id;
			$session_data['username'] = $user_detail->username;
			$session_data['password'] = $user_detail->password;
			$session_data['type'] = $user_detail->type;
			$session_data['nom'] = $user_detail->nom;
			$session_data['prenom'] = $user_detail->prenom;

			if ($user_detail->type == 'admin') {
				$this->session->set_userdata($session_data);
				redirect('Admin');
			} elseif ($user_detail->type == 'gestionnaire') {
				$this->session->set_userdata($session_data);
				redirect('Gestion');
			}

		} else {
			redirect('login/login_error');
		}

		/*if(password_verify($pass,$user_detail->password))
		{
			if ($user_detail->status == 1)
			{
				$session_data['']	=	$user_detail->id;
				$session_data['']	=	$user_detail->username;
				$session_data['']	=	$user_detail->password;
				$session_data['']	=	$user_detail->type;
				$session_data['']	=	$user_detail->status;

				$this->session->set_userdata($session_data);
				redirect('welcome');
			}
			else {
				$error['error_msg'] = "Votre compte n'est pas encore activé";
				$this->load->view('Login', $error);
			}
		}
		else{
			redirect('login/login_error');
		}*/
	}

	public function login_error()
	{
		$error['error_msg'] = "Nom d'utilisateur ou mots de passe invalide";
		$this->load->view('Login', $error);
	}

	public function adminlogout()
	{
		$this->session->sess_destroy();
		$data['success_message'] = "Déconnexion réussi !";
		$this->load->view('login', $data);
	}
}
