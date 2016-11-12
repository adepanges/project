<?php

class MY_Controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	function data(){
		$data = array();
		$data['data'] = array(
			'site_url' => site_url(),
			'base_url' => base_url()
		);

		return $data;
	}

	function menu_app(){
		$this->load->model('m_app');
		$data = $this->m_app->menu_recursive();
		return $data;
	}
}