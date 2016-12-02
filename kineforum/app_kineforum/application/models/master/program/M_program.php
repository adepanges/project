<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_program extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get($params=array()){
        $whr = array();
        $where = 'WHERE ';
        $whr_str = '';
        $order_by = 'ORDER BY ';

        $order_field = array();
        $order_type = array();

        $order_field[0] = 'P.PROGRAM_ID';
        $order_field[1] = 'P.PROGRAM';
        $order_field[2] = 'P.DATE_MULAI';
        $order_field[3] = 'P.DATE_SELESAI';
        $order_field[4] = 'P.STATUSID';


        $order_type[1] = 'ASC';
        $order_type[2] = 'DESC';

        if(!empty($params['PROGRAM'])){
            $whr[] = "LOWER(P.PROGRAM) LIKE LOWER('%".$params['PROGRAM']."%')";
        }

        if(!empty($params['DATE_MULAI']) && !empty($params['DATE_SELESAI'])){
            $whr_str .= '(';
            $whr_str .= "(P.DATE_MULAI >= '".$params['DATE_MULAI']."' AND P.DATE_SELESAI <= '".$params['DATE_SELESAI']."')";
            $whr_str .= "OR (P.DATE_MULAI >= '".$params['DATE_MULAI']."' AND P.DATE_MULAI <= '".$params['DATE_SELESAI']."')";
            $whr_str .= "OR (P.DATE_SELESAI >= '".$params['DATE_MULAI']."' AND P.DATE_SELESAI <= '".$params['DATE_SELESAI']."')";
            $whr_str .= ')';

             $whr[] = $whr_str;
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
            P.PROGRAM_ID,
            P.MEMBER_ID,
            P.PROGRAM,
            P.KETERANGAN,
            P.DATE_MULAI,
            P.DATE_SELESAI,
            P.STATUSID,
            P.COLOR,
            TS.TOTAL_SLOT

            FROM DATA_PROGRAM P
            LEFT JOIN (
                SELECT PROGRAM_ID, COUNT(SLOT_ID) AS TOTAL_SLOT FROM DATA_SLOT GROUP BY PROGRAM_ID
            ) TS ON P.PROGRAM_ID = TS.PROGRAM_ID

            $where

            $order_by

            LIMIT ".$params['start'].", ".$params['limit'];

        $res = $this->db->query($sql);
        // echo $this->db->last_query();
        // exit;

        return $res;
    }

    function add($params=array()){
        $res = $this->db->insert('DATA_PROGRAM',$params);
        return $res;
    }

    function upd($params=array()){
        if(isset($params['PROGRAM_ID'])){
            $this->db->where('PROGRAM_ID',$params['PROGRAM_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->update('DATA_PROGRAM',$params);
        return $res;
    }

    function del($params=array()){
       if(isset($params['PROGRAM_ID'])){
            $this->db->where('PROGRAM_ID',$params['PROGRAM_ID']);
        } else {
            return false;
            exit;
        }
        $res = $this->db->delete('DATA_PROGRAM');
        return $res;
    }
}