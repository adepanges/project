<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_status_program extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get($params=array()){
        $res = $this->db->get('MASTER_STATUS_PROGRAM');
        return $res;
    }
}