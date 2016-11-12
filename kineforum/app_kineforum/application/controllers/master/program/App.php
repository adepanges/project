<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class App extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('master/program/m_program');
	}

	function index(){
		$this->load->model(array('master/film/m_jenis','master/film/m_format'));

		$data = array();
		$data['data_menu'] = $this->menu_app();

		$this->template->display('inc/master/program/program',$data);
	}

	function get(){
		$params = array(
			'PROGRAM' => ifunsetempty($_POST,'PROGRAM',''),
			'DATE_MULAI' => date('Y-m-d',date2unix(ifunsetempty($_POST,'DATE_MULAI',date('01/m/Y')))),
			'DATE_SELESAI' => date('Y-m-d',date2unix(ifunsetempty($_POST,'DATE_SELESAI',date('t/m/Y')))),
			'start' => (int) ifunsetempty($_POST,'start',0),
			'limit' => (int) ifunsetempty($_POST,'limit',25),
			'ORDER' => array(
				'FIELD' => ifunsetempty($_POST,'ORDER_FIELD',1),
				'TYPE' => ifunsetempty($_POST,'ORDER_TYPE',1),
			),
		);
		$res = $this->m_program->get($params);

		$data = array();
		foreach ($res->result() as $key => $value) {
			$time_mulai = strtotime($value->DATE_MULAI);
			$time_selesai = strtotime($value->DATE_SELESAI);

			$value->DATE_MULAI = date('d/m/Y',$time_mulai);
			$value->DATE_SELESAI = date('d/m/Y',$time_selesai);
			$value->TANGGAL_MULAI = tanggal_surat($time_mulai,true);
			$value->TANGGAL_SELESAI = tanggal_surat($time_selesai,true);
			$data[] = $value;
		}

		$out = array(
			'draw' => ifunsetempty($_POST,'draw', 1),
			'data' => $data,
			'TotalRecords' => (int) $res->num_rows(),
			'TotalDisplayRecords' => $params['limit'],
			'params' => $params
		);

		echo json_encode($out);
	}

	function simpan(){
		$params = array(
			'PROGRAM_ID' => (int) ifunsetempty($_POST,'PROGRAM_ID',0),
			'PROGRAM' => ifunsetempty($_POST,'PROGRAM',''),
			'KETERANGAN' => ifunsetempty($_POST,'KETERANGAN',''),
			'DATE_MULAI' => date('Y-m-d',date2unix(ifunsetempty($_POST,'DATE_MULAI',''))),
			'DATE_SELESAI' => date('Y-m-d',date2unix(ifunsetempty($_POST,'DATE_SELESAI',''))),
		);

		if($params['PROGRAM_ID']==0){
			$res = $this->m_program->add($params);
		} else {
			$res = $this->m_program->upd($params);
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
			'PROGRAM_ID' => (int) ifunsetempty($_POST,'PROGRAM_ID',0),
		);

		$res = FALSE;

		if($params['PROGRAM_ID'] != 0){
			$res = $this->m_program->del($params);
		}

		if($res){
			$out = array('success'=>true);
		} else {
			$out = array('success'=>false, 'msg' => 'Gagal menghapus program');
		}

		echo json_encode($out);
	}
}