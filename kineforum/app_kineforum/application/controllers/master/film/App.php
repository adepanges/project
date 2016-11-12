<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class App extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('master/film/m_film');
	}

	function index(){
		$this->load->model(array('master/film/m_jenis','master/film/m_format'));

		$data = array();
		$data['data_menu'] = $this->menu_app();
		$data['data_jenis_film'] = $this->m_jenis->get()->result();
		$data['data_format'] = $this->m_format->get()->result();

		$this->template->display('inc/master/film/film',$data);
	}

	function get(){
		$params = array(
			'JUDUL' => ifunsetempty($_POST,'JUDUL',0),
			'SUTRADARA' => ifunsetempty($_POST,'SUTRADARA',0),
			'FORMAT_ID' => (int) ifunsetempty($_POST,'FORMAT_ID',0),
			'JENIS_FILM_ID' => (int) ifunsetempty($_POST,'JENIS_FILM_ID',0),
			'start' => (int) ifunsetempty($_POST,'start',0),
			'limit' => (int) ifunsetempty($_POST,'limit',25),
			'ORDER' => array(
				'FIELD' => ifunsetempty($_POST,'ORDER_FIELD',0),
				'TYPE' => ifunsetempty($_POST,'ORDER_TYPE',2),
			),
		);
		$res = $this->m_film->get($params);

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
			"JENIS_FILM_ID" => (int) ifunsetempty($_POST,'JENIS_FILM_ID',0),
			"FORMAT_ID" => (int) ifunsetempty($_POST,'FORMAT_ID',0),
			"JUDUL" => ifunsetempty($_POST,'JUDUL',''),
			"SUTRADARA" => ifunsetempty($_POST,'SUTRADARA',''),
			"PRODUSER" => ifunsetempty($_POST,'PRODUSER',''),
			"DURASI" => ifunsetempty($_POST,'DURASI',''),
			"TAHUN" => ifunsetempty($_POST,'TAHUN',''),
			"RUMAH_PRODUKSI" => ifunsetempty($_POST,'RUMAH_PRODUKSI',''),
			"SINOPSIS" => ifunsetempty($_POST,'SINOPSIS',''),
			"KETERANGAN" => ifunsetempty($_POST,'KETERANGAN',''),
			"POSTER" => ifunsetempty($_POST,'POSTER',''),
			"NEGARA" => ifunsetempty($_POST,'NEGARA',''),
			"BAHASA" => ifunsetempty($_POST,'BAHASA',''),
			"SUBTEKS" => ifunsetempty($_POST,'SUBTEKS',''),
			"KONTAK_EMAIL" => ifunsetempty($_POST,'KONTAK_EMAIL',''),
			"KONTAK_HP" => ifunsetempty($_POST,'KONTAK_HP',''),
			"KONTAK_ALAMAT" => ifunsetempty($_POST,'KONTAK_ALAMAT',''),
			"STATUS" => ifunsetempty($_POST,'STATUS',''),
			"FILM_ID" => (int) ifunsetempty($_POST,'FILM_ID',0)
		);

		if($params['FILM_ID']==0){
			$res = $this->m_film->add($params);
		} else {
			$res = $this->m_film->upd($params);
		}

		if($res){
			$out = array('success'=>true);
		} else {
			$out = array('success'=>false, 'msg' => 'Gagal menambahkan film');
		}

		echo json_encode($out);
	}

	function del(){
		$params = array(
			"FILM_ID" => (int) ifunsetempty($_POST,'FILM_ID',0),
		);

		$res = FALSE;

		if($params['FILM_ID'] != 0){
			$res = $this->m_film->del($params);
		}

		if($res){
			$out = array('success'=>true);
		} else {
			$out = array('success'=>false, 'msg' => 'Gagal menghapus film');
		}

		echo json_encode($out);
	}
}