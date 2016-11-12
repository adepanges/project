<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Format extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('master/film/m_format');
	}

	function index(){
		$data = array();
		$data['data_menu'] = $this->menu_app();
		$data['data_title'] = 'Database Film<small>Data Format Film</small>';

		$this->template->display('inc/master/film/format',$data);
	}

	function get(){
		$res = $this->m_format->get();

		$out = array(
			'draw' => ifunsetempty($_POST,'draw', 1),
			'data' => $res->result(),
			'TotalRecords' => (int) $res->num_rows(),
			'TotalDisplayRecords' => 1000,
		);

		echo json_encode($out);
	}


	function simpan(){
        	$d = date('d/m/Y');

		$params = array(
			'FORMAT_ID' => (int) ifunsetempty($_POST,'FORMAT_ID', 0),
			'NAMA' => ifunsetempty($_POST,'NAMA', ''),
			'KETERANGAN' => ifunsetempty($_POST,'KETERANGAN', ''),
			'STATUS' => ifunsetempty($_POST,'STATUS', 1),
		);

		if($params['FORMAT_ID']==0){
			$res = $this->m_format->add($params);
		} else {
			$res = $this->m_format->upd($params);
		}

        	if($res){
			$out = array('success' => true);
        	} else {
        		$out = array('success' => false);
        	}

        	echo json_encode($out);
	}

	function del(){
		$params = array(
			'FORMAT_ID' => ifunsetempty($_POST, 'FORMAT_ID', '')
		);

		$res = $this->m_format->del($params);
		if ($res) {
			$out = array(
				'success' => true,
				'msg' => 'success'
			);
		} else {
			$out = array(
				'success' => false,
				'msg' => 'failed'
			);
		}

		echo json_encode($out);
    }
}