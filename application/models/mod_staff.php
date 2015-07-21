<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mod_staff extends CI_Model {

    public function __Construct() {
        //parent::__construct();
    }

    function getStaff() {
        $query = $this->db->select('*')
                ->from('tbl_staffs AS s')
                ->join('tbl_position AS p', 'p.pos_id=s.pos_id')
                ->order_by('sta_id', 'DESC')
                ->get();

        return $query;
    }
function getStaffUser() {
        $query = $this->db->select('*')
                ->from('tbl_staffs AS s')
                 ->join('tbl_position AS p', 'p.pos_id=s.pos_id')
                ->where('s.pos_id >',1)
                ->order_by('sta_id', 'DESC')
                ->get();

        return $query;
    }
    function getStaffEdit($id) {
        $query = $this->db->select('*')
                ->where('sta_id', $id)
                ->get('tbl_staffs');

//       if ($query->num_rows() == 1) {
        return $query->row();

//        }
    }

    function getStaffhr($id) {
        $query = $this->db->select('*')
                ->where('main_id', $id)
                ->get('tbl_staffs');
        return $query;

//        }
    }
  function getPostion() {
        $query = $this->db->select('*')
                ->get('tbl_position');
        return $query;

//        }
    }
    function getUsers() {
        $query = $this->db->select('*')
                ->order_by('sta_id', 'DESC')
                ->where('pos_id >', 1)
                ->get('tbl_staffs');

        return $query;
    }
  function getUserEdit($id) {
        $query = $this->db->select('*')
                ->where('use_id ', $id)
                ->get('tbl_users');

        return $query->row();
    }
    function getStaffAtt($id) {
        $query = $this->db->select('*')
                ->order_by('sta_id', 'DESC')
                ->where('main_id ', $id)
                ->get('tbl_staffs');

        return $query;
    }

    public function add_new_staff($filename, $document) {
        $date = new DateTime($this->input->post("txt_swd"));
        $dobs = new DateTime($this->input->post("txt_dob"));
        $dob = $dobs->format('Y-m-d');
        $start_date = $date->format('Y-m-d');
        $data = array(
            'family_name' => $this->input->post("txt_fname"),
            'given_name' => $this->input->post("txt_gname"),
            'gender' => $this->input->post("txt_gender"),
            'dob' => $dob,
            'phone' => $this->input->post("txt_phone"),
            'address' => $this->input->post("txt_add"),
            'cur_address' => $this->input->post("txt_cur_add"),
            'photo' => $filename,
            'related_file' => $document,
            'work_start' => $start_date,
            'main_id' => $this->input->post('use_id'),
            'created_date' => date("Y-m-d"),
            'sal_id' => $this->input->post("txt_sal"),
            'pos_id' => $this->input->post("pos_id"),
        );
//        $this->db->trans_start();
        $this->db->insert("tbl_staffs", $data);
    }

    public function add_edite_staff($filename, $document, $id) {
        $date = new DateTime($this->input->post("txt_swd"));
        $dobs = new DateTime($this->input->post("txt_dob"));
        $dob = $dobs->format('Y-m-d');
        $start_date = $date->format('Y-m-d');
        $data = array(
            'family_name' => $this->input->post("txt_fname"),
            'given_name' => $this->input->post("txt_gname"),
            'gender' => $this->input->post("txt_gender"),
            'dob' => $dob,
            'phone' => $this->input->post("txt_phone"),
            'address' => $this->input->post("txt_add"),
            'cur_address' => $this->input->post("txt_cur_add"),
            'photo' => $filename,
            'related_file' => $document,
            'work_start' => $start_date,
            'main_id' => $this->input->post('use_id'),
            'created_date' => date("Y-m-d"),
            'sal_id' => $this->input->post("txt_sal"),
            'pos_id' => $this->input->post("pos_id"),
        );
//        $this->db->trans_start();
        $this->db->where('sta_id', $id);
        $this->db->update("tbl_staffs", $data);
    }

    function deleteStaff($id) {
        try {
            $this->db->trans_start(TRUE);
            $this->db->where('sta_id', $id);
            $update = $this->db->delete('tbl_staffs');
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

    /* Group Management Stat */

    public function add_new_group() {
        $data = array(
            'gro_name' => $this->input->post("txt_group"),
            'created_date' => date("Y-m-d")
        );
        $this->db->insert("tbl_group", $data);
    }

    function getGroup() {
        $query = $this->db->select('*')
                ->order_by('gro_id', 'DESC')
                ->get('tbl_group');

        return $query;
    }

    function deleteGroup($id) {
        try {
            $this->db->trans_start(TRUE);
            $this->db->where('gro_id', $id);
            $update = $this->db->delete('tbl_group');
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

    function getGroupEdit($id) {
        $query = $this->db->select('*')
                ->where('gro_id', $id)
                ->get('tbl_group');

        return $query->row();
    }

    public function add_update_group($id) {
        $data = array(
            'gro_name' => $this->input->post("txt_group"),
            'created_date' => date("Y-m-d")
        );
        $this->db->where("gro_id", $id);
        $this->db->update("tbl_group", $data);
    }

    /* Salary Management */

    function getSalary() {
        $query = $this->db->select('*')
                ->order_by('sal_id', 'DESC')
                ->get('tbl_salary');

        return $query;
    }
    function getPosition() {
        $query = $this->db->select('*')
                ->order_by('pos_id', 'DESC')
                ->get('tbl_position');

        return $query;
    }
    function getRole() {
        $query = $this->db->select('*')
                ->order_by('role_id', 'DESC')
                ->get('tbl_roles');

        return $query;
    }
    public function add_new_salary() {
        $data = array(
            'amount' => $this->input->post("txt_sal"),
            'description' => $this->input->post("txt_des"),
            'created_date' => date("Y-m-d")
        );
        $this->db->insert("tbl_salary", $data);
    }

    function deleteSalary($id) {
        try {
            $this->db->trans_start(TRUE);
            $this->db->where('sal_id', $id);
            $update = $this->db->delete('tbl_salary');
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

    function getSalaryEdit($id) {
        $query = $this->db->select('*')
                ->where('sal_id', $id)
                ->get('tbl_salary');

        return $query->row();
    }

    public function add_update_salary($id) {
        $data = array(
            'amount' => $this->input->post("txt_sal"),
            'description' => $this->input->post("txt_des"),
            'created_date' => date("Y-m-d")
        );
        $this->db->where("sal_id", $id);
        $this->db->update("tbl_salary", $data);
    }

    function add_attendent($id, $att) {
        foreach ($id['sta_id']as $key => $value) {
            $add_user_permission = array(
                'sta_id' => $id['sta_id'][$key],
                'attendant' => $att['txt_att'][$key],
                'check_date' => date('Y-m-d')
            );
            $this->db->insert('tbl_attendant', $add_user_permission);
        }
    }

    function getAtt() {
        $query = $this->db->select("*")
                ->from('tbl_attendant as at')
                ->limit(1)
                ->order_by('att_id', 'DESC')
                ->get();
        return $query->row();
    }

    function getAttendantStaff($id) {
        $query = $this->db->select("*")
                ->from('tbl_attendant as at')
                ->join('tbl_staffs as s', 's.sta_id = at.sta_id')
                ->where('`s`.`main_id`', $id)
                ->group_by('at.sta_id')
                ->order_by('at.att_id', 'DESC')
                ->get();

        return $query;
    }

    function count_att($id) {
        $this->db->select("count(*) as total_row_count, check_date");
        $this->db->from('tbl_attendant');
        $this->db->where('sta_id', $id);
        $this->db->where('attendant', 1);
        $result = $this->db->get();
        return $result->row('total_row_count');
    }

    function count_att_no($id) {
        $this->db->select("count(*) as total_row_count");
        $this->db->from('tbl_attendant');
        $this->db->where('sta_id', $id);
        $this->db->where('attendant', 2);
        $result = $this->db->get();
        return $result->row('total_row_count');
    }
    // user management
    public function add_new_user() {
        $data = array(
            'username' => $this->input->post("txt_username"),
            'password' => $this->input->post("txt_password") ,
            'status' => 1 ,
            'rol_id' => $this->input->post("txt_role"),
            'gro_id' => $this->input->post("txt_group")  ,
            'sta_id' => $this->input->post("sta_id") 
        );
        $this->db->insert("tbl_users", $data);
    }
    public function getProject(){
      $query = $this->db->select('*')
                ->join('tbl_users','tbl_users.use_id = tbl_project.use_id')
                //->join('tbl_users', 'tbl_users.use_id=tbl_staffs.use_id')
                ->order_by('pro_id', 'DESC')
                ->get('tbl_project');

        return $query;
    }
    public function getuserType(){
        $query = $this->db->select('*')
                //->where('rol_id',2)
               // $this->db->where("(FirstName='Tove' OR FirstName='Ola' OR Gender='M' OR Country='India')", NULL, FALSE);
                ->where('rol_id',3)
                ->order_by('use_id', 'DESC')
                ->get('tbl_users');
        return $query;
    }
    public function add_new_project() {
        $date_start = new DateTime($this->input->post("txt_start"));
        $date_end = new DateTime($this->input->post("txt_end"));
        $start = $date_start->format('Y-m-d');
        $end = $date_end->format('Y-m-d');
        $data = array(
            'pro_name' => $this->input->post("txt_project"),
            'company' => $this->input->post("txt_com"),
            'description' => $this->input->post("txt_des"),
            'start_date' => $start,
            'end_date'=>$end,
            'use_id' => $this->input->post("txt_usertype"),  
            'status'=>1
        );
        $this->db->insert("tbl_project", $data);
    }
    function delete_Project($id) {
        try {
            $this->db->trans_start(TRUE);
            $this->db->where('pro_id', $id);
            $update = $this->db->delete('tbl_project');
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

    function getProjectEdit($id) {
        $query = $this->db->select('*')
                ->where('pro_id', $id)
                ->get('tbl_project');

        return $query->row();
    }
    public function update_project($id) {
        $date_start = new DateTime($this->input->post("txt_start"));
        $date_end = new DateTime($this->input->post("txt_end"));
        $start = $date_start->format('Y-m-d');
        $end = $date_end->format('Y-m-d');
        $data = array(
            'pro_name' => $this->input->post("txt_project"),
            'company' => $this->input->post("txt_com"),
            'description' => $this->input->post("txt_des"),
            'start_date' => $start,
            'end_date'=>$end,
            'use_id' => $this->input->post("txt_usertype"),  
        );
        $this->db->where("pro_id", $id);
        $this->db->update("tbl_project", $data);
    }
   // end management
 public function updateUser() {
        $data = array(
            'username' => $this->input->post("txt_username"),
            'password' => $this->input->post("txt_password") ,
            'rol_id' => $this->input->post("txt_role"),
            'gro_id' => $this->input->post("txt_group"),
            'sta_id' => $this->input->post("sta_id")
        );
        $this->db->where('sta_id',$this->input->post("sta_id"));
        $this->db->update("tbl_users", $data);
    }
}

