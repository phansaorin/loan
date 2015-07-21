<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Admin extends CI_Controller {

        public function __Construct() {
                parent::__Construct();
                //$this->load->model(array());
        }
        public function records(){
             //if ($this->check_session()) {
            if ($this->session->userdata('use_type')) {
                $data['title'] = "Admin management";
    //            $session_id = $this->session->userdata('hr');
                $data['get_user'] = $this->mod_user->selectdata();
                $this->load->view('layout.php', $data);
            } else {
                redirect('login/');
            }
        } // END FUNCTION

         function deleteUser(){
//        if($this->check_session()){
//            if($this->uri->segment(3)){
                $user_id = $this->uri->segment(3);
                if($this->mod_user->deleteUser($user_id)){
                    $this->session->set_flashdata("success_entry_add", "<div id='entry_add_success' style='color:blue;padding:2px 5px 2px 5px;background-color:#A6A8E8;width:980px;font-style:italic;text-align:left;overflow:hidden;font-size:14px;z-index:9999 !important;'><img src='".base_url()."images/success.png' align= 'left' style='margin-top:-1px;width:30px;' /><p style='border: 0px solid #000000;margin: 5px auto auto;width: 765px;'>".$this->lang->line("tv_delete_record")."</p></div>");
                    redirect(base_url().'admin/records');
                }
//            }else{
//                redirect(base_url().'income/process');
//            }
//        }else{
//            redirect("content/defaults");
//        }
    } // END FUNCTION
    public function adduser(){

         $data['title'] = "Hr management";
        $data['manager'] = $this->mod_staff->getUsers();
        $data['salary'] = $this->mod_staff->getsalary();
   
        if ($this->input->post("btn_submit")) {
        }
      $this->load->view('layout.php', $data);
    } // END FUNCTION

     function attendant() {
        $data['title'] = "Attendent Management";
        $data['get_att']= $this->mod_admin->getAtt();
        $data['get_staff'] = $this->mod_admin->getAttendantStaff($this->session->userdata('id_user'));
        $this->load->view('layout.php', $data);
    } // END FUNCTION

    function addattendant(){
    $data['title'] = "Check Attentdent";
          $data['get_staff'] = $this->mod_staff->getStaffhr($this->session->userdata('id_user'));
           if ($this->input->post('btn_submit')) {
            $id['sta_id'] = $this->input->post('til_id');
             $att['txt_att'] = $this->input->post('txt_att');
//             $check_d['txt_date'] = date("Y-m-d");
            $this->mod_staff->add_attendent($id,$att);
           redirect('admin/attendant');
        }
        $this->load->view('layout.php', $data); 
    } // END FUNCTION

     /* Group Management */

    function group() {

        $data['title'] = "Group management";
        $data['get_group'] = $this->mod_admin->getGroup();
        $this->load->view('layout.php', $data);
    }

    public function addgroup() {

        $data['title'] = "New Group";
        if ($this->input->post("btn_submit")) {

            $this->form_validation->set_rules('txt_group', 'Group', 'trim|required|');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'New Group';
                $this->load->view("layout.php", $data);
            } else {
                $this->mod_admin->add_new_group();

                redirect('admin/group');
            }
        }
        $this->load->view('layout.php', $data);
    }

    function deleteGroup() {
        $group_id = $this->uri->segment(3);
        if ($this->mod_admin->deleteGroup($group_id)) {
            $this->session->set_flashdata("success_entry_add", "<div id='entry_add_success' style='color:blue;padding:2px 5px 2px 5px;background-color:#A6A8E8;width:980px;font-style:italic;text-align:left;overflow:hidden;font-size:14px;z-index:9999 !important;'><img src='" . base_url() . "images/success.png' align= 'left' style='margin-top:-1px;width:30px;' /><p style='border: 0px solid #000000;margin: 5px auto auto;width: 765px;'>" . $this->lang->line("tv_delete_record") . "</p></div>");
            redirect(base_url() . 'admin/group');
        }
    }

    function editgroup() {
        $group_id = $this->uri->segment(3);
        $data['title'] = "Edit Group";
        $data['edit_group'] = $this->mod_staff->getGroupEdit($group_id);
        if ($this->input->post("btn_submit")) {
            $this->mod_admin->add_update_group($group_id);
            redirect(base_url() . 'admin/group');
        }
        $this->load->view('layout.php', $data);
    }

    /*The end of group*/
    /* Start of salary*/
    function salary() {

        $data['title'] = "Salary management";
        $data['get_salary'] = $this->mod_admin->getSalary();
        $this->load->view('layout.php', $data);
    }

    public function addsalary() {

        $data['title'] = "New Salary Rang";
        if ($this->input->post("btn_submit")) {

            $this->form_validation->set_rules('txt_sal', 'Salary Rang', 'trim|required|');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Salary';
                $this->load->view("layout.php", $data);
            } else {
                $this->mod_admin->add_new_salary();

                redirect('admin/salary');
            }
        }
        $this->load->view('layout.php', $data);
    }

    function deleteSalary() {
        $sal_id = $this->uri->segment(3);
        if ($this->mod_admin->deleteSalary($sal_id)) {
            $this->session->set_flashdata("success_entry_add", "<div id='entry_add_success' style='color:blue;padding:2px 5px 2px 5px;background-color:#A6A8E8;width:980px;font-style:italic;text-align:left;overflow:hidden;font-size:14px;z-index:9999 !important;'><img src='" . base_url() . "images/success.png' align= 'left' style='margin-top:-1px;width:30px;' /><p style='border: 0px solid #000000;margin: 5px auto auto;width: 765px;'>" . $this->lang->line("tv_delete_record") . "</p></div>");
            redirect(base_url() . 'admin/salary');
        }
    }

    function editsalary() {
        $salary_id = $this->uri->segment(3);
        $data['title'] = "Edit Salary";
        $data['edit_sal'] = $this->mod_staff->getSalaryEdit($salary_id);
        if ($this->input->post("btn_submit")) {
            $this->mod_admin->add_update_salary($salary_id);
            redirect(base_url() . 'admin/salary');
        }
        $this->load->view('layout.php', $data);
    }

    /* End of salary*/
    /* Start of staff*/
     public function staffs() {
        if ($this->session->userdata('use_type')) {
            $data['title'] = "Hr management";
            $data['get_staff'] = $this->mod_staff->getStaff();
            $this->load->view('layout.php', $data);
        } else {
            redirect('login/');
        }
    }

    public function addstaff() {

        $data['title'] = "Hr management";
        $data['manager'] = $this->mod_staff->getUsers();
        $data['salary'] = $this->mod_staff->getsalary();
        if ($this->input->post("btn_submit")) {



            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'gif|jpg|png|docx';
            $config['max_width'] = '1077';
            $config['max_height'] = '170';

            $this->load->library('upload', $config);
            $this->form_validation->set_rules('txt_fname', 'File', 'min_length[4]|max_length[20]');
            $this->form_validation->set_rules('txt_gname', 'File', 'max_length[20]');
            $this->form_validation->set_rules('txt_phone', 'Phone', 'min_length[9]|max_length[30]');
            $this->form_validation->set_rules('txt_dob', 'Date Of Birth', 'max_length[20]');
            $this->form_validation->set_rules('txt_swd', 'File', 'max_length[20]');
            $this->form_validation->set_rules('txt_add', 'File', 'max_length[500]');
            $this->form_validation->set_rules('txt_cur_add', 'File', 'trim|max_length[500]');
            $this->form_validation->set_rules('txt_sal', 'File', 'trim|required');
            $this->form_validation->set_rules('use_id', 'File', 'required');
            $this->form_validation->set_rules('txt_gender', 'File', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Staff';
                $this->load->view("layout.php", $data);
            } else {
                if ($this->upload->do_upload('userfile')) {
                    $data = array('upload_data' => $this->upload->data());
                    $file_data = $this->upload->data();
                    $image = $file_data['file_name'];
                }
                if ($this->upload->do_upload('document')) {
                    $data = array('upload_data' => $this->upload->data());
                    $file_doc = $this->upload->data();
                    $document = $file_doc['file_name'];
                }
                if (!$this->upload->do_upload('userfile') || !$this->upload->do_upload('document')) {

                    $document = 'no.png';
                    $image = 'file.png';
                }
                $this->mod_staff->add_new_staff($image, $document);

                redirect('hr/staffs');
            }
        }
        $this->load->view('layout.php', $data);
    }

    function deleteStaff() {
        $staff_id = $this->uri->segment(3);
        if ($this->mod_staff->deleteStaff($staff_id)) {
            $this->session->set_flashdata("success_entry_add", "<div id='entry_add_success' style='color:blue;padding:2px 5px 2px 5px;background-color:#A6A8E8;width:980px;font-style:italic;text-align:left;overflow:hidden;font-size:14px;z-index:9999 !important;'><img src='" . base_url() . "images/success.png' align= 'left' style='margin-top:-1px;width:30px;' /><p style='border: 0px solid #000000;margin: 5px auto auto;width: 765px;'>" . $this->lang->line("tv_delete_record") . "</p></div>");
            redirect(base_url() . 'hr/staffs');
        }
    }

    function editstaff() {
        $staff_id = $this->uri->segment(3);
        $data['title'] = "Edit Staff";
        $data['manager'] = $this->mod_staff->getUsers();
      //  var_dump($data['manager']); die();
        $data['salary'] = $this->mod_staff->getsalary();
        $data['staff'] = $this->mod_staff->getStaffEdit($staff_id);
        if ($this->input->post("btn_submit")) {



            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'gif|jpg|png|docx';

            $this->load->library('upload', $config);

            $this->form_validation->set_rules('txt_fname', 'File', 'min_length[4]|max_length[20]');
            $this->form_validation->set_rules('txt_gname', 'File', 'max_length[20]');
            $this->form_validation->set_rules('txt_phone', 'Phone', 'min_length[9]|max_length[30]');
            $this->form_validation->set_rules('txt_dob', 'Date Of Birth', 'max_length[20]');
            $this->form_validation->set_rules('txt_swd', 'File', 'max_length[20]');
            $this->form_validation->set_rules('txt_add', 'File', 'max_length[500]');
            $this->form_validation->set_rules('txt_cur_add', 'File', 'trim|max_length[500]');
            $this->form_validation->set_rules('txt_sal', 'File', 'trim|required');
            $this->form_validation->set_rules('use_id', 'File', 'required');
            $this->form_validation->set_rules('txt_gender', 'File', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = $this->lang->line('Add Staff');
                $this->load->view("layout.php", $data);
            } else {
                if ($this->upload->do_upload('userfile')) {

                    $data = array('upload_data' => $this->upload->data());
                    $file_data = $this->upload->data();
                    $image = $file_data['file_name'];
                }
                if ($this->upload->do_upload('document')) {
                    $data = array('upload_data' => $this->upload->data());
                    $file_doc = $this->upload->data();
                    $document = $file_doc['file_name'];
                }
                if (!$this->upload->do_upload('userfile') || !$this->upload->do_upload('document')) {

                    $document = $this->input->post("file_doc");
                    $image = $this->input->post("file_photo");
                }

                $this->mod_staff->add_edite_staff($image, $document, $staff_id);

                redirect('hr/staffs');
            }
        }
        $this->load->view('layout.php', $data);
    }
    /* The end of staff*/
}

?>