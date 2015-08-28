<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MAIN_Controller extends CI_Controller {

    protected $data = Array(); //protected variables goes here its declaration

    function __construct() {

        parent::__construct();
        $this->output->enable_profiler(FALSE); // I keep this here so I dont have to manualy edit each controller to see profiler or not        
    }

    function payment_schedule($loan_info) {
      
      if ($loan_info->CID == "") {
        return array();
      }
        $principle_loan = $loan_info->loan_amount;
        $rate = $loan_info->interest_rate;
        // $pay_capital = round($principle_loan/$rate, 2);
        $repayment_freg_type = $loan_info->repayment_freg;
        $duration_as_days = 0;  // All duration to think as day
        $repayment_freg = 0;    // Number of day to pay
        $repayment_number = 0;  // Number of repayment as monthly, weekly
        $day_leave = 0;     // Day leave from modulume
        $end_date = date('Y-m-d');

        $last_payment_date = date('Y-m-d');

        if ($loan_info->duration_loan_type == "year") {
          $duration_as_days = $loan_info->duration_loan * 365;
          // $end_date = date("Y-m-d H:i:s", strtotime("+".$loan_info->duration_loan." years", strtotime($loan_info->maturity_date)));
        } else if ($loan_info->duration_loan_type == "month") {
          $duration_as_days = $loan_info->duration_loan * 30;
        }
        $end_date = date("Y-m-d H:i:s", strtotime("+".$duration_as_days." days", strtotime($loan_info->maturity_date)));

        if ($repayment_freg_type == "weekly") {
          $repayment_freg = 7;
        } else if ($repayment_freg_type == "monthly") {
          $repayment_freg = 30;
        }

        // Convert float to integer
        $repayment_number = intval($duration_as_days / $repayment_freg);
        $day_leave = $duration_as_days % $repayment_freg;
        $pay_capital = round($principle_loan/$repayment_number, 2);

        $payment_dates = array();
        $start_date = $loan_info->maturity_date;
        $beginning_balance = $principle_loan;
        $pay_interest = ($beginning_balance * $rate)/100;
        $pay_amount = $pay_capital + $pay_interest;

        $data_payments[] = array(
              'pay_date' => $start_date,
              'beginning_balance' => $beginning_balance,
              'pay_capital' => $pay_capital,
              'pay_interest' => $pay_interest,
              'pay_amount' => $pay_amount
            );
        for ($i=1; $i < $repayment_number; $i++) { 

          // With checking holiday
          $start_date = date("Y-m-d", strtotime("+".$repayment_freg." days", strtotime($start_date)));
          $pay_date = $this->businessdays->checkDayOffAndReturnDate($start_date, $end_date);
          if (!$pay_date) {
            $pay_date = $start_date;
          }
          $payment_dates[] = $pay_date;
          $start_date = $pay_date;


          // Calculation
          $beginning_balance = $beginning_balance - $pay_capital;
          $pay_interest = ($beginning_balance * $rate)/100;
          $pay_amount = $pay_capital + $pay_interest;

          $data_payments[] = array(
            'pay_date' => $pay_date,
            'beginning_balance' => $beginning_balance,
            'pay_capital' => $pay_capital,
            'pay_interest' => $pay_interest,
            'pay_amount' => $pay_amount
          );

        }
        return $data_payments;
    }

    /*protected function protectedOne() {

    }

    public function publicOne() {

    }

    private function _privateOne() {

    }*/

    protected function render($view_file) {

        $this->load->view('header_view');
        if ($this->_isAdmin()) $this->load->view('admin_menu_view');

        $this->load->view($view_file . '_view', $this->data); //note all my view files are named <name>_view.php
        $this->load->view('footer_view');

    }

    private function _isAdmin() {

        return TRUE;

    }

}