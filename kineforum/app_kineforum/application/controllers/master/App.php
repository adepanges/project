<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class App extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	function index(){
		// $this->template->display('',$data);
	}
}