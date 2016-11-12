<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Jenis extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('master/film/m_jenis');
	}

	function index(){
		$data = array();
		$data['data_menu'] = $this->menu_app();

		$this->template->display('inc/master/film/jenis_film',$data);
	}

	function get(){
		$res = $this->m_jenis->get();

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
			'JENIS_FILM_ID' => (int) ifunsetempty($_POST,'JENIS_FILM_ID', 0),
			'NAMA' => ifunsetempty($_POST,'NAMA', ''),
			'KETERANGAN' => ifunsetempty($_POST,'KETERANGAN', ''),
			'STATUS' => ifunsetempty($_POST,'STATUS', 1)
		);

		if($params['JENIS_FILM_ID']==0){
			$res = $this->m_jenis->add($params);
		} else {
			$res = $this->m_jenis->upd($params);
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
			'JENIS_FILM_ID' => ifunsetempty($_POST, 'JENIS_FILM_ID', '')
		);

		$res = $this->m_jenis->del($params);
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