 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

        public function index()
        {
          $this->records();
        }
        public function records(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/project/records',$data);
        }
        public function adds(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/project/records',$data);
        }
        public function details(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/project/details',$data);
        }
        public function updates(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/project/updates',$data);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */