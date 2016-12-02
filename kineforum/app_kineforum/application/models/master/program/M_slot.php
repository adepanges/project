<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_slot extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get($params=array()){
        $this->db->where('PROGRAM_ID', $params['PROGRAM_ID']);
        $res = $this->db->get('DATA_SLOT');
        return $res;
    }

    function add($params=array()){
        $res = $this->db->insert('DATA_SLOT',$params);
        return $res;
    }

    function upd($params=array()){
        if(isset($params['SLOT_ID'])){
            $this->db->where('SLOT_ID',$params['SLOT_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->update('DATA_SLOT',$params);
        return $res;
    }

    function del($params=array()){
       if(isset($params['SLOT_ID'])){
            $this->db->where('SLOT_ID',$params['SLOT_ID']);
        } else {
            return false;
            exit;
        }
        $this->del_film($params);
        $res = $this->db->delete('DATA_SLOT');
        return $res;
    }

    function del_film($params){
        if(isset($params['SLOT_ID'])){
            $this->db->where('SLOT_ID',$params['SLOT_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->delete('DATA_SLOT_FILM');
        return $res;
    }
}