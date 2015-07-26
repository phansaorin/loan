<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends CI_Controller {
  public function schedule($loan_id='')
  {
    $data['controller_name'] = strtolower(get_class());
    $this->load->view("schedules/schedule", $data);
  }
}