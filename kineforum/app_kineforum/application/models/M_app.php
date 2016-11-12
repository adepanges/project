<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_app extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function menu_recursive($parent_id=0){
		$parent_id = (int) $parent_id;
		$this->db->where('PARENT_ID',$parent_id);
		$this->db->where('MODUL_ID',1);
		$this->db->where('STATUS',1);
		$res = $this->db->get('RBAC_MODUL_MENU');
		$data = array();
		foreach ($res->result() as $key => $value) {
			$value->CHILD = $this->menu_recursive($value->menu_id);
			$data[] = $value;
		}
		return $data;
	}
}