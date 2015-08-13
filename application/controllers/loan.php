 
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan extends CI_Controller {

        public function index()
        {
          $this->records();
          $this->adds();
        }
        public function records(){
          $data['controller_name'] = 'Hello user'; 
          // $data ['query'] = $this->bidding_model->viewauction();
          // $data['open_loan'] = $this->mod_loan->open_loan();
          // var_dump($data['open_loan']);
          $this->load->view('include/loan/records', $data);
        }

        public function create(){
          $data['controller_name'] = 'Open loan account'; 
          $this->load->view('include/loan/adds', $data);
        }

        public function addLoan($loan_id=-1){
          $data['controller_name'] = 'Open loan account'; 
          // $this->form_validation->set_rules('search_id_name', 'CID', 'required');
          $this->form_validation->set_rules('owner_type', 'Owner Typer', 'required');
          $this->form_validation->set_rules('currency', 'Currency', 'required');
          $this->form_validation->set_rules('payment_freg', 'Payment Freg', 'required');
          $this->form_validation->set_rules('amount_loan', 'Loan Amount', 'required');
          $this->form_validation->set_rules('amount_word', 'Amo In Word', 'required');
          $this->form_validation->set_rules('product_type', 'Product Type', 'required');
          $this->form_validation->set_rules('num_installment', 'Num Installment', 'required');
          $this->form_validation->set_rules('interes_rate', 'Interst Rate', 'required');
          $this->form_validation->set_rules('installment_ammount', 'Installment Ammount', 'required');
           $this->form_validation->set_rules('fir_payment', 'First Payment', 'required');

          if ($this->form_validation->run() == FALSE) {
             // $this->load->view('include/loan/adds', $data);
            echo json_encode(array("success"=>FALSE, 'message'=>'Please input all required fields'));
          } else {
            $data = array(
              'first_repayment' => $this->input->post('fir_payment'),
              'ownership_type' => $this->input->post('owner_type'),
              'currency' => $this->input->post('currency'),
              'repayment_freg' => $this->input->post('payment_freg'),
              'loan_amount' => $this->input->post('amount_loan'),
              'loan_amount_in_word' => $this->input->post('amount_word'),
              'product_type_title' => $this->input->post('product_type'),
              'renew_installment' => $this->input->post('num_installment'),
              'interest_rate' => $this->input->post('interes_rate'),
              'installment_amount' => $this->input->post('installment_ammount')
            );
            if ($this->mod_loan->save($data, $loan_id)) {
              echo json_encode(array("success"=>true, 'message'=>"Add success"));
            } else {
              echo json_encode(array("success"=>FALSE, 'message'=>'Please input all required fields'));
            }
          }
        }


        public function details(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/loan/details', $data);
        }
         public function disturbment_voucher(){
          $data['controller_name'] = 'Hello user'; 
          $this->load->view('include/loan/disturbment_voucher', $data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */