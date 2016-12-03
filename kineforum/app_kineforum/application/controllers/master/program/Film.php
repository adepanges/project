<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Film extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('master/program/m_film');
	}

	function get(){
		$params = array(
			'SLOT_ID' => (int) ifunsetempty($_POST,'SLOT_ID',0)
		);

		$res = $this->m_film->get($params);

		$out = array(
			'draw' => ifunsetempty($_POST,'draw', 1),
			'data' => $res->result(),
			'TotalRecords' => (int) $res->num_rows(),
			'TotalDisplayRecords' => -1,
			'params' => $params
		);

		echo json_encode($out);
	}

	function simpan(){
		$params = array(
			'SLOT_ID' => (int) ifunsetempty($_POST,'SLOT_ID',0),
			'FILM_ID' =>  ifunsetempty($_POST,'FILM_ID','[]')
		);

		$film = json_decode($params['FILM_ID']);

		foreach ($film as $key => $value) {
			$params['FILM_ID'] = $value;
			$res = $this->m_film->add($params);
		}

		if($res){
			$out = array('success'=>true);
		} else {
			$out = array('success'=>false, 'msg' => 'Gagal menyimpan program');
		}

		echo json_encode($out);
	}

	function del(){
		$params = array(
			'SLOT_FILM_ID' => (int) ifunsetempty($_POST,'SLOT_FILM_ID',0),
		);

		$res = FALSE;
		if($params['SLOT_FILM_ID'] != 0){
			$res = $this->m_film->del($params);
		}

		if($res){
			$out = array('success'=>true);
		} else {
			$out = array('success'=>false, 'msg' => 'Gagal menghapus slot');
		}

		echo json_encode($out);
	}
}