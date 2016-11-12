<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_film extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get($params=array()){
        $whr = array();
        $where = 'WHERE ';
        $order_by = 'ORDER BY ';

        $order_field = array();
        $order_type = array();

        $order_field[0] = 'MF.FILM_ID';
        $order_field[1] = 'MF.JUDUL';
        $order_field[2] = 'MF.SUTRADARA';
        $order_field[3] = 'MFF.NAMA';
        $order_field[4] = 'MJF.NAMA';

        $order_type[1] = 'ASC';
        $order_type[2] = 'DESC';

        if(!empty($params['JUDUL'])){
            $whr[] = "LOWER(MF.JUDUL) LIKE LOWER('%".$params['JUDUL']."%')";
        }

        if(!empty($params['SUTRADARA'])){
            $whr[] = "LOWER(MF.SUTRADARA) LIKE LOWER('%".$params['SUTRADARA']."%')";
        }

        if(!empty($params['FORMAT_ID']) && $params['FORMAT_ID']!=0){
            $whr[] = "MF.FORMAT_ID = ".$params['FORMAT_ID'];
        }

        if(!empty($params['JENIS_FILM_ID']) && $params['JENIS_FILM_ID']!=0){
            $whr[] = "MF.JENIS_FILM_ID = ".$params['JENIS_FILM_ID'];
        }

        if(count($whr)>0){
            $where .= implode(' AND ', $whr);
        } else {
            $where .= "1 = 1";
        }

        $params['start'] = (int) isset($params['start'])?$params['start']:0;
        $params['limit'] = (int) isset($params['limit'])?$params['limit']:25;

        if(isset($params['ORDER'])){
            $order_by .= $order_field[$params['ORDER']['FIELD']].' '.$order_type[$params['ORDER']['TYPE']];
        }

        $sql = "SELECT
            MF.FILM_ID,
            MJF.NAMA AS JENIS_FILM,
            MF.JENIS_FILM_ID,
            MFF.NAMA AS FORMAT,
            MF.FORMAT_ID,
            MF.JUDUL,
            MF.SUTRADARA,
            MF.PRODUSER,
            MF.DURASI,
            MF.TAHUN,
            MF.RUMAH_PRODUKSI,
            MF.SINOPSIS,
            MF.KETERANGAN,
            MF.POSTER,
            MF.NEGARA,
            MF.BAHASA,
            MF.SUBTEKS,
            MF.KONTAK_EMAIL,
            MF.KONTAK_HP,
            MF.KONTAK_ALAMAT,
            MF.STATUS

            FROM MASTER_FILM MF
            LEFT JOIN MASTER_JENIS_FILM MJF ON MF.JENIS_FILM_ID = MJF.JENIS_FILM_ID
            LEFT JOIN MASTER_FORMAT MFF ON MF.FORMAT_ID = MFF.FORMAT_ID

            $where

            $order_by

            LIMIT ".$params['start'].", ".$params['limit'];

        $res = $this->db->query($sql);

        return $res;
    }

    function add($params=array()){
        $res = $this->db->insert('MASTER_FILM',$params);
        return $res;
    }

    function upd($params=array()){
        if(isset($params['FILM_ID'])){
            $this->db->where('FILM_ID',$params['FILM_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->update('MASTER_FILM',$params);
        return $res;
    }

    function del($params=array()){
       if(isset($params['FILM_ID'])){
            $this->db->where('FILM_ID',$params['FILM_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->delete('MASTER_FILM');
        return $res;
    }
}