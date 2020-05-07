<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->set_template('base');

		$this->load->section('navbar', 'section/navbar');
		$this->load->section('footer', 'section/footer');

		$this->load->css('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css');
		$this->load->css('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css');
		$this->load->css('assets/adminlte/bower_components/Ionicons/css/ionicons.min.css');
		$this->load->css('assets/adminlte/bower_components/morris.js/morris.css');
		$this->load->css('assets/adminlte/bower_components/jvectormap/jquery-jvectormap.css');
		$this->load->css('assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
		$this->load->css('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css');
		$this->load->css('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
		$this->load->css('assets/adminlte/dist/css/AdminLTE.min.css');
		$this->load->css('assets/adminlte/dist/css/skins/_all-skins.min.css');
		$this->load->css('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
		$this->load->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic');

		$this->load->js('assets/adminlte/bower_components/jquery/dist/jquery.min.js');
		$this->load->js('assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js');
		$this->load->js('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');
		$this->load->js('assets/adminlte/bower_components/raphael/raphael.min.js');
		$this->load->js('assets/adminlte/bower_components/morris.js/morris.min.js');
		$this->load->js('assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');
		$this->load->js('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
		$this->load->js('assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
		$this->load->js('assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js');
		$this->load->js('assets/adminlte/bower_components/moment/min/moment.min.js');
		$this->load->js('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js');
		$this->load->js('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
		$this->load->js('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
		$this->load->js('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');
		$this->load->js('assets/adminlte/bower_components/fastclick/lib/fastclick.js');
		$this->load->js('assets/adminlte/dist/js/adminlte.min.js');
		$this->load->js('assets/adminlte/dist/js/all.js');
		$this->load->js('assets/adminlte/dist/js/demo.js');
		$this->load->js('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js');
		$this->load->js('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
		$this->load->js('assets/adminlte/dev/js/tableau.js');
		$this->load->js('assets/adminlte/dev/js/entrant.js');
		$this->load->js('assets/adminlte/dev/js/sortant.js');
		$this->load->js('assets/adminlte/dev/js/admin.js');
	}

}
