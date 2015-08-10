<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends CI_Controller {

  public function schedule($loan_id=-1)
  {
    $data['controller_name'] = strtolower(get_class());
    $data['loan_info'] = $this->Schedule->get_info($loan_id);
    // var_dump($data['loan_info']); die();

    // Convert duration
    $principle_loan = $data['loan_info']->loan_amount;
    $rate = $data['loan_info']->interest_rate;
    // $pay_capital = round($principle_loan/$rate, 2);
    $repayment_freg_type = $data['loan_info']->repayment_freg;
    $duration_as_days = 0;  // All duration to think as day
    $repayment_freg = 0;    // Number of day to pay
    $repayment_number = 0;  // Number of repayment as monthly, weekly
    $day_leave = 0;     // Day leave from modulume
    $end_date = date('Y-m-d');

    $last_payment_date = date('Y-m-d');

    if ($data['loan_info']->duration_loan_type == "year") {
      $duration_as_days = $data['loan_info']->duration_loan * 365;
      $end_date = date("Y-m-d H:i:s", strtotime("+1 years", strtotime($data['loan_info']->maturity_date)));
    }
    if ($repayment_freg_type == "weekly") {
      $repayment_freg = 7;
    } else if ($repayment_freg_type == "monthly") {
      $repayment_freg = 30;
    }

    // Convert float to integer
    $repayment_number = intval($duration_as_days / $repayment_freg);
    $day_leave = $duration_as_days % $repayment_freg;
    $pay_capital = round($principle_loan/$repayment_number, 2);

    /*$payment_dates_not_holiday = array();
    if ($repayment_freg_type == "weekly") {
      $start_date = $data['loan_info']->maturity_date;
      for ($i=0; $i < $repayment_number; $i++) { 
        // Without checking holiday
        $pay_date = date("Y-m-d", strtotime("+".$repayment_freg." days", strtotime($start_date)));
        $payment_dates_not_holiday[] = $pay_date;
        $start_date = $pay_date;*/

        // var_dump($start_date);
        // echo "<br/>";

        // With checking holiday
        /*$start_date = date("Y-m-d", strtotime("+".$repayment_freg." days", strtotime($start_date)));
        // echo("start_date- ".$start_date);
        // echo "<br/>";
        $pay_date = $this->businessdays->checkDayOffAndReturnDate($start_date, $end_date);
        // echo("- ".$pay_date);
        // echo "<br/>";
        $payment_dates[] = $pay_date;
        $start_date = $pay_date;*/
      /*}
    } else if ($repayment_freg_type == "monthly") {
      $repayment_freg = 30;
    }

    foreach ($payment_dates_not_holiday as $dates) {
      echo $dates;
      echo " , ";
    }

      echo "<br/>";
      echo "<br/>";
      echo "<br/>";*/

    $data_payments = array();
    $payment_dates = array();
    if ($repayment_freg_type == "weekly") {
      $start_date = $data['loan_info']->maturity_date;
      $beginning_balance = $principle_loan;
      for ($i=0; $i < $repayment_number; $i++) { 
        // Without checking holiday
        /*$pay_date = date("Y-m-d", strtotime("+".$repayment_freg." days", strtotime($start_date)));
        $payment_dates[] = $pay_date;
        $start_date = $pay_date;*/

        // var_dump($start_date);
        // echo "<br/>";

        // With checking holiday
        $start_date = date("Y-m-d", strtotime("+".$repayment_freg." days", strtotime($start_date)));
        $pay_date = $this->businessdays->checkDayOffAndReturnDate($start_date, $end_date);
        if (!$pay_date) {
          $pay_date = $start_date;
        }
        $payment_dates[] = $pay_date;
        $start_date = $pay_date;


        // Calculation
        $pay_interest = $beginning_balance * $rate;
        $pay_amount = $pay_capital + $pay_interest;

        $data_payments[] = array(
          'pay_date' => $pay_date,
          'beginning_balance' => $beginning_balance,
          'pay_capital' => $pay_capital,
          'pay_interest' => $pay_interest,
          'pay_amount' => $pay_amount
        );

        $beginning_balance = $beginning_balance - $pay_capital;
      }
    } else if ($repayment_freg_type == "monthly") {
      $repayment_freg = 30;
    }

    $data['data_payments'] = $data_payments;
    
    /*foreach ($payment_dates as $dates) {
      echo $dates;
      echo " , ";
    }

    foreach ($data_payments as $items) {
      var_dump($items);
      echo "<br/>";
    }*/

    // Add amount of days
    // echo date("Y-m-d", strtotime("+".$duration_as_days." days", strtotime($data['loan_info']->maturity_date)));

    if ($data['loan_info']->duration_loan_type == "year") {
      $last_payment_date = date("Y-m-d H:i:s", strtotime("+1 years", strtotime('2014-05-22 10:35:10')));
    }
    // add 1 year more
    // echo date("Y-m-d H:i:s", strtotime("+1 years", strtotime($data['loan_info']->maturity_date))); //2015-05-22 10:35:10
    // die();


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

}