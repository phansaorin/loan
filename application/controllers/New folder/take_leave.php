 
 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Take_leave extends CI_Controller {

        public function index()
        {
          $this->records();
        }
        public function records(){
          $this->load->model('mod_take_leave');
			if ($this->session->userdata('use_type')) {
					$data['title'] = "Manager management";
					$session_id = $this->session->userdata('manager');
					$data['take_leave_list'] = $this->mod_take_leave->select_take_leave();
				$this->load->view('layout.php', $data);
			} else {
					redirect('login/');
			}
        }
		public function approval($leave_id){
			$this->load->model('mod_take_leave');
			if ($this->session->userdata('use_type')) {
					$data['title'] = "Manager management";
					$session_id = $this->session->userdata('manager');
					$this->mod_take_leave->approve_take_leave($leave_id);
					redirect('take_leave/records');
			} else {
					redirect('login/');
			}
		}
        public function adds(){
			$this->load->model('mod_take_leave');
			if ($this->session->userdata('use_type')) {
					$data['title'] = "Manager management";
					$session_id = $this->session->userdata('manager');
					$data['user_staff'] = $this->mod_staff->getStaffhr($this->session->userdata('id_user'));
				$this->load->view('layout.php', $data);
			} else {
					redirect('login/');
			}
        }
		public function add_take_leave() {
                    
			$this->load->model('mod_take_leave');
			$arr_str = array(
				'startdate' => $this->input->post('sdate'),
				'enddate' => $this->input->post('edate'),
				'reason' => $this->input->post('reason'),
				'sta_id' => $this->input->post('sname'),
			);
                         if ($this->input->post("btn_submit")) {
			$this->mod_take_leave->add_take_leave($arr_str);
			redirect('take_leave/records');
                         }
			$this->load->view('layout.php', $data);
		}
       
        public function updates($id){
          $this->load->model('mod_take_leave');
			if ($this->session->userdata('manager')) {
					$data['title'] = "Manager management";
					$session_id = $this->session->userdata('manager');
					$data['user_staff'] = $this->mod_take_leave->select_staff();
					$data['update_take_leave'] = $this->mod_take_leave->select_take_leave_update($id);
				$this->load->view('layout.php', $data);
			} else {
					redirect('login/');
			}
        }
		public function do_update($id){
			$this->load->model('mod_take_leave');
			$arr_str = array(
				'startdate' => $this->input->post('sdate'),
				'enddate' => $this->input->post('edate'),
				'reason' => $this->input->post('reason'),
				'sta_id' => $this->input->post('sname'),
			);
			$this->mod_take_leave->do_update($arr_str,$id);
			redirect('take_leave/records');
		}
		public function delete($id){
			$this->load->model('mod_take_leave');
			$this->mod_take_leave->delete($id);
			redirect('take_leave/records');
		}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */