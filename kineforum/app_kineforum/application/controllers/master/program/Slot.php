<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Slot extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('master/program/m_slot');
	}

	function get(){
		$params = array(
			'PROGRAM_ID' => (int) ifunsetempty($_POST,'PROGRAM_ID',0),
			'start' => (int) ifunsetempty($_POST,'start',0),
			'limit' => (int) ifunsetempty($_POST,'limit',0)
		);

		$res = $this->m_slot->get($params);

		$out = array(
			'draw' => ifunsetempty($_POST,'draw', 1),
			'data' => $res->result(),
			'TotalRecords' => (int) $res->num_rows(),
			'TotalDisplayRecords' => $params['limit'],
			'params' => $params
		);

		echo json_encode($out);
	}

	function simpan(){
		$params = array(
			'SLOT_ID' => (int) ifunsetempty($_POST,'SLOT_ID',0),
			'PROGRAM_ID' => (int) ifunsetempty($_POST,'PROGRAM_ID',0),
			'NAMA' => ifunsetempty($_POST,'NAMA',''),
			'KETERANGAN' => ifunsetempty($_POST,'KETERANGAN','')
		);

		if($params['SLOT_ID']==0){
			unset($params['SLOT_ID']);
			$res = $this->m_slot->add($params);
		} else {
			$res = $this->m_slot->upd($params);
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
			'SLOT_ID' => (int) ifunsetempty($_POST,'SLOT_ID',0),
		);

		$res = FALSE;
		if($params['SLOT_ID'] != 0){
			$res = $this->m_slot->del($params);
		}

		if($res){
			$out = array('success'=>true);
		} else {
			$out = array('success'=>false, 'msg' => 'Gagal menghapus slot');
		}

		echo json_encode($out);
	}
}