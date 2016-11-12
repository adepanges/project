<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class App extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		// $this->root_check_access();
	}

	function index(){
		$data = array();
		$data['data_menu'] = $this->menu_app();

		$this->template->display('',$data);
	}
}