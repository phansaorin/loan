 
<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct() {
                parent::__construct();
                $this->load->model('mod_login');
        }

        public function index() {
echo 'h';
                $this->login();
        }
//Login for User
        public function login() {
                //$data['menu'] = $this->mod_menu->show_menu();
                $data['title'] = 'Log in';
                if (isset($_POST['btnSubmit'])) {
                        $this->form_validation->set_rules('username', 'Username', 'required|trim');
                        $this->form_validation->set_rules('password', 'Password', 'required|trim');
                        if ($this->form_validation->run() == FALSE) {
                                $this->session->set_userdata('login_erro', show_message('Your username or password is not match!', 'error'));
                                redirect('main/');
                        } else {
                                $username = $this->input->post('username');
                                $password = $this->input->post('password');

                                $data['login'] = $this->mod_login->login($username, $password);

                                if ($data['login']) {
                                        if ($data['login']->num_rows() > 0) {
                                                foreach ($data['login']->result() as $rows) {
                                                        $this->session->set_userdata('id_user', $rows->user_id);
                                                      
                                                        $id = $rows->user_id;
                                                        if ($rows->role_alias === 'admin') {
                                                                $this->session->set_userdata('admin', $id);
                                                                redirect('admin/');
                                                        } else if ($rows->role_alias === 'hr') {
                                                                $this->session->set_userdata('hr', $id);
                                                                redirect('type/hr/records');
                                                        } else if ($rows->role_alias === 'manager') {
                                                                $this->session->set_userdata('manager', $id);
                                                                redirect('type/manager/records');
                                                        } 
                                                }
                                        } else {
                                                $this->session->set_userdata('login_erro', show_message('Your username or password is not match!', 'error'));
                                                redirect('main/');
                                        }
                                }
                                redirect($this->session->userdata('previous_page'));
                        }
                } else {
                        $this->view_main($data);
                }
        }




}

/* End of file main.php */
/* Location: ./application/controllers/main.php */