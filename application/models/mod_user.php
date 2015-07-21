<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mod_user extends CI_Model {

    public function __Construct() {
        //parent::__construct();
    }

    function selectdata() {
        $query = $this
                 ->db
                 ->select('*')
                 ->from('tbl_users')
                 ->join('tbl_group','tbl_group.gro_id = tbl_users.gro_id')
                 ->join('tbl_roles','tbl_roles.role_id = tbl_users.rol_id')
                 ->join('tbl_staffs','tbl_staffs.sta_id = tbl_users.sta_id')
                // ->where('user_id',$serialize(value)ssion_id)
                 ->order_by('use_id','DESC')
                 ->get();

               
        return $query;
    }
    public function add_new_staff($filename,$document) {
        $data = array(
            'family_name' => $this->input->post("txt_fname"),
            'given_name' => $this->input->post("txt_gname"),
            'gender' => $this->input->post("txt_gender"),
            'dob' => $this->input->post("txt_dob"),
            'phone' => $this->input->post("txt_phone"),
            'address' => $this->input->post("txt_add"),
            'cur_address' => $this->input->post("txt_cur_add"),
            'photo' => $filename,
            'related_file' => $document,
            'work_start' => $this->input->post("txt_swd"),
            'use_id'=>3,
            'created_date'=>'08-02-14',
            'sal_id'=>1
        );
//        $this->db->trans_start();
        $this->db->insert("tbl_staffs", $data);
    }
    // Attendent Management
    public function getAttendent(){
        $query = $this->db->select('*')
                ->order_by('att_id','DESC')
                ->get('tbl_attendant');
        return $query;
    }
    function deleteUser($id) {
        try {
            $this->db->trans_start(TRUE);
            $this->db->where('use_id', $id);
            $update = $this->db->delete('tbl_users');
            if ($update) {
                $this->db->trans_complete();
                return TRUE;
            } else {
                $this->db->trans_rollback();
                return FALSE;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

