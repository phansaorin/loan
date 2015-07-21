 
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

        public function index()
        {
          $this->records();
          $this->adds();
        }
        public function records(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/user/records', $data);
        }
        public function adds(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/user/adds', $data);
        }
        public function details(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/user/details', $data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */