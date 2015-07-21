 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atendent extends CI_Controller {

        public function index()
        {
          $this->records();
        }
        public function records(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/salary/records',$data);
        }
        public function adds(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/atendent/adds',$data);
        }
        public function details(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/atendent/details',$data);
        }
        public function updates(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/atendent/updates',$data);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */