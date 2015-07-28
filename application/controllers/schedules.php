<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends CI_Controller {
  public function schedule($loan_id=-1)
  {
    $data['controller_name'] = strtolower(get_class());
    $data['loan_info'] = $this->Schedule->get_info($loan_id);
    // var_dump($data['loan_info']); die();
    $this->load->view("schedules/schedule", $data);
  }
}