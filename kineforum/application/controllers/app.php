<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $url = base_url().'kineforum.php';
        redirect($url);
    }

	public function index()
	{	
		
	}
}