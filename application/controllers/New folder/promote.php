 
 
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promote extends CI_Controller {
		  public function __Construct() {
                parent::__Construct();
                //$this->load->model(array());
        }

		public function adds(){
			if ($this->session->userdata('use_type')) {
					$data['title'] = "Manager management";
					$session_id = $this->session->userdata('manager');
					$data['user_staff'] = $this->mod_staff->getStaffhr($this->session->userdata('id_user'));
				$this->load->view('layout.php', $data);
			} else {
					redirect('login/');
			}
        }
		public function add_salary_promotion(){
                    $dobs = new DateTime($this->input->post("sdate"));
        $date_start = $dobs->format('Y-m-d');
			$arr_str = array(
				'duration' => $date_start,
				'amount' => $this->input->post('amount'),
				'discription' => $this->input->post('description'),
				'sta_id' => $this->input->post('sname'),
				'use_id' => $this->session->userdata('use_id'),
			);
                         if ($this->input->post("btn_submit")) {
			$this->mod_promote->add_promotion($arr_str);
			redirect('promote/records');
                         }
                       $this->load->view('layout.php', $data); 
		}
        public function records(){
			if ($this->session->userdata('use_type')) {
					$data['title'] = "Manager management";
					$session_id = $this->session->userdata('use_type');
					$data['salary_promote_list'] = $this->mod_promote->select_salary_promote();
				$this->load->view('layout.php', $data);
			} else {
					redirect('login/');
			}
        }
		public function updates($id){
			if ($this->session->userdata('use_type')) {
					$data['title'] = "Manager management";
					$session_id = $this->session->userdata('manager');
					$data['user_staff'] = $this->mod_take_leave->select_staff();
					$data['update_salary_promote'] = $this->mod_promote->select_promote_update($id);
				$dobs = new DateTime($this->input->post("sdate"));
        $date_start = $dobs->format('Y-m-d');
                                        if($this->input->post("btn_submit")){
                                    $arr_str = array(
				'duration' => $date_start,
				'amount' => $this->input->post('amount'),
				'discription' => $this->input->post('description'),
				'sta_id' => $this->input->post('sname'),
				'use_id' => $this->session->userdata('use_id'),
			);
                                    $this->mod_promote->update_promotion($arr_str,$id);
                                    redirect('promote/records');
                                }
                                        $this->load->view('layout.php', $data);
			} else {
					redirect('login/');
			}
        }
		public function do_update_promote($id){
			$arr_str = array(
				'duration' => $this->input->post('sdate'),
				'amount' => $this->input->post('amount'),
				'discription' => $this->input->post('description'),
				'sta_id' => $this->input->post('sname'),
                            'status'=>0
			);
			$this->mod_promote->do_update_promote($arr_str,$id);
			redirect('salary/records');
		}
		public function delete($id){
			$this->mod_promote->delete($id);
			redirect('promote/records');
		}
	public function approved(){
          $id = $this->uri->segment(3);
          if($this->uri->segment(4) == 0){
             $arr_str = array(
				'approve' => $id,	
			); 
          }else{
              $arr_str = array(
				'approve' => 0,
			);
          }
                        
			$this->mod_promote->approved($arr_str,$id);
			redirect('promote/records');
		}	
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */