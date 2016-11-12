<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_format extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get($params=array()){
        $params['start'] = (int) isset($params['start'])?$params['start']:0;
        $params['limit'] = (int) isset($params['limit'])?$params['limit']:25;
        $res = $this->db->limit($params['start'], $params['limit']);
        $res = $this->db->get('MASTER_FORMAT');
        return $res;
    }

    function add($params=array()){
        $res = $this->db->insert('MASTER_FORMAT',$params);
        return $res;
    }

    function upd($params=array()){
        if(isset($params['FORMAT_ID'])){
            $this->db->where('FORMAT_ID',$params['FORMAT_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->update('MASTER_FORMAT',$params);
        return $res;
    }

    function del($params=array()){
       if(isset($params['FORMAT_ID'])){
            $this->db->where('FORMAT_ID',$params['FORMAT_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->delete('MASTER_FORMAT');
        return $res;
    }
}