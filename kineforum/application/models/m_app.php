<?php

class M_App extends CI_Model{
	function __construct(){
		$this->load->database();
	}

	function do_login($params=array())
	{
		$this->db->select('mu.*, mug.*');
		$this->db->join('master_users mu', 'uug.userid = mu.userid', 'inner');
		$this->db->join('master_usergroup mug', 'uug.usergroupid = mug.usergroupid', 'inner');
		$this->db->where('mu.namalogin', $params['namalogin']);
		$this->db->where('mu.userpassword', md5($params['userpassword']));
		$res = $this->db->get('user_usergroup uug');

		return $res;
	}
}