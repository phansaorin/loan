<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mod_take_leave extends CI_Model {

    public function __Construct() {
        //parent::__construct();
    }

	public function select_staff(){
		$this->db->select("sta_id, family_name, given_name");
		$this->db->from("tbl_staffs");
		return $this->db->get();
	}
    public function add_take_leave($arr_str) {
		$this->db->insert('tbl_takeleave',$arr_str);
	}
	public function select_take_leave(){
		$this->db->select("*");
		$this->db->from("tbl_takeleave");
		$this->db->join("tbl_staffs","tbl_takeleave.sta_id = tbl_staffs.sta_id");
		return $this->db->get();
	}
	public function approve_take_leave($leave_id){
		$this->db->where('tak_id', $leave_id);
		$this->db->update("tbl_takeleave", array("approved" => "1"));
	}
	public function select_take_leave_update($id){
		$this->db->select("*");
		$this->db->from("tbl_takeleave");
		$this->db->join("tbl_staffs","tbl_takeleave.sta_id = tbl_staffs.sta_id");
		$this->db->where("tak_id", $id);
		return $this->db->get();
	}
	public function do_update($arr_str, $id){
		$this->db->where('tak_id', $id);
		$this->db->update("tbl_takeleave", $arr_str);
	}
	public function delete($id){
		$this->db->where('tak_id', $id);
		$this->db->delete("tbl_takeleave");
	}
}

 
