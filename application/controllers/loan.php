 
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan extends CI_Controller {

        public function index()
        {
          $this->records();
          $this->adds();
        }
        public function records(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/loan/records', $data);
        }
        public function addLoan(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/loan/adds', $data);
        }
        public function details(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/loan/details', $data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */