 
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->login_form();
    }

    public function login_form() {
        if (isset($_POST['btnSubmit'])) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[50]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                //echo "This is error";
                $this->load->view('include/login/login_form');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $data['login'] = $this->mod_login->login($username, $password);

                if ($data['login']) {
                    if ($data['login']->num_rows() > 0) {
                        foreach ($data['login']->result() as $rows) {
                            $this->session->set_userdata('id_user', $rows->sta_id);
                                $this->session->set_userdata('use_id', $rows->use_id);
                            $this->session->set_userdata('user_name', $rows->username);
                            $id = $rows->use_id;
                            if ($rows->rol_id == '1') {
                                $this->session->set_userdata('use_type', 'admin');
                                redirect('admin/records');
                            } elseif ($rows->rol_id == '2') {
                                $this->session->set_userdata('use_type', 'hr');
                                redirect('hr/staffs');
                            } elseif ($rows->rol_id == '3') {
                                $this->session->set_userdata('use_type', 'manager');
                                redirect('manager/records');
                            }
                        }
                    } else {
                        $this->session->set_userdata('login_erro', 'Not match user and password!');
                        $this->load->view('include/login/login_form');
                    }
                }
            }
        } else {
            $this->load->view('include/login/login_form');
        }
    }

    public function logout() {
        $this->session->unset_userdata('use_type');
        redirect('login/', 'refresh');
    }

// END FUNCTION
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */