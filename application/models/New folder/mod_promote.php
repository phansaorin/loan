<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mod_promote extends CI_Model {

    public function __Construct() {
        //parent::__construct();
    }

    public function add_promotion($arr_str) {
		$this->db->insert('tbl_salarypromote',$arr_str);
	}
        public function update_promotion($arr_str,$id) {
            $this->db->where('pro_id',$id);
		$this->db->update('tbl_salarypromote',$arr_str);
	}
	public function select_salary_promote(){
		$this->db->select("*");
		$this->db->from("tbl_salarypromote");
		$this->db->join("tbl_staffs","tbl_salarypromote.sta_id = tbl_staffs.sta_id");
		$this->db->join("tbl_users","tbl_salarypromote.use_id = tbl_users.use_id");
		return $this->db->get();
	}
	public function select_promote_update($id){
		$this->db->select("*");
		$this->db->from("tbl_salarypromote");
		$this->db->join("tbl_staffs","tbl_salarypromote.sta_id = tbl_staffs.sta_id");
		$this->db->where("pro_id", $id);
		return $this->db->get();
	}
	public function do_update_promote($arr_str, $id){
		$this->db->where('pro_id', $id);
		$this->db->update("tbl_salarypromote", $arr_str);
	}
	public function delete($id){
		$this->db->where('pro_id', $id);
		$this->db->delete("tbl_salarypromote");
	}
        public function approved($data_ar, $id){
		$this->db->where('pro_id', $id);
		$this->db->update("tbl_salarypromote", $data_ar);
	}
}

 
 
