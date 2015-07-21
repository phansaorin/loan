 
 
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salary extends CI_Controller {

        public function index()
        {
          $this->records();
        }
        public function records(){
          $data['controller_name'] ='Hello salary'; 
          $this->load->view('include/salary/records',$data);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */