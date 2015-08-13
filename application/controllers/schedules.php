<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends MAIN_Controller {

  public function schedule($loan_id=-1)
  {
    $data['controller_name'] = strtolower(get_class());
    // $data['loan_info'] = $this->Schedule->get_info($loan_id);
    $data['loan_info'] = $this->Loan_approval->get_info($loan_id);
    // var_dump($data['loan_info']); die();
    $data_payments = parent::payment_schedule($data['loan_info']);
    $data['data_payments'] = $data_payments;

    /*if ($data['loan_info']->duration_loan_type == "year") {
      $last_payment_date = date("Y-m-d H:i:s", strtotime("+1 years", strtotime('2014-05-22 10:35:10')));
    }*/

    $this->load->view("schedules/schedule", $data);
  }

  function get_holidays() {
  	$start_date = '2015-01-01';
  	$end_date = '2015-01-10';
  	// $this->load->library('businessdays');
  	// $working_days = $this->businessdays->getWorkingDays($start_date,$end_date);

  	$holidays = $this->businessdays->getHolidayDays($start_date,$end_date);
  	// var_dump($holidays);

  	$year = date("Y");
  	// get_holiday($year, $month, $day_of_week, $week_of_month)
  	// var_dump($year);
  	$holiday = $this->businessdays->get_holiday($year, 05, 1, 4);

  	// var_dump($holiday);
  	// var_dump($working_days);

  }

  function pdf()
  {
      $this->load->helper('pdf_helper');
      $data['title'] = 'Title';
      /*
          ---- ---- ---- ----
          your code here
          ---- ---- ---- ----
      */
      $this->load->view('schedules/pdf', $data);
  }

}