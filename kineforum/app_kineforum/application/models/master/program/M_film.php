<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_film extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get($params=array()){
        $sql = "SELECT
                DSF.SLOT_FILM_ID, DSF.FILM_ID, DSF.NOURUT, DSF.SLOT_ID,
                MF.JUDUL, MF.SUTRADARA, MF.DURASI
            FROM DATA_SLOT_FILM DSF
            LEFT JOIN MASTER_FILM MF ON DSF.FILM_ID = MF.FILM_ID

            WHERE DSF.SLOT_ID = ?";
        $res = $this->db->query($sql, $params);

        return $res;
    }

    function add($params=array()){
        $res = $this->db->insert('DATA_SLOT_FILM',$params);
        return $res;
    }

    function del($params=array()){
       if(isset($params['SLOT_FILM_ID'])){
            $this->db->where('SLOT_FILM_ID',$params['SLOT_FILM_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->delete('DATA_SLOT_FILM');
        return $res;
    }
}