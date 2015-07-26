<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_approvals extends CI_Controller {

  public function approval($loan_id='')
  {
    $data['controller_name'] = strtolower(get_class());
    $this->load->view("loan_approvals/approval", $data);
  }

}