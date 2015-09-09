<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loans extends MAIN_Controller {

	// List record of loan
	function index() {
		$data['controller_name'] = strtolower(get_class());
		$data['lists'] = $this->Loan_approval->get_all();

		$this->load->view('loans/list_loan', $data);
	}

	// List record of loan
	function list_loan() {
		$this->index();
	}

	public function approval($loan_id=-1) {
		$is_pending = true;
		$data['loan_id'] = $loan_id;
    	$data['controller_name'] = strtolower(get_class());

    	$data_payments = array();
    	$data['loan_info'] = $this->Loan_approval->get_info($loan_id, $is_pending);
    	$data_payments = array();
    	if ($loan_id!=-1) {
	    	$data_payments = parent::payment_schedule($data['loan_info']);
    	}
		$data['data_payments'] = $data_payments;

    	$this->load->view("loans/approval", $data);
  	}

  	function autocomplete() {
  		$term =  $this->input->post('term');
  		// Manipulate data in Controller, and return query from Model
		$query = $this->Loan_approval->autocomplete($term);
		$records = array();
        if($query->num_rows() > 0){
		    foreach($query->result() as $row){
		 	  	$records[] = array('label'=> $row->loan_account, 'value'=> $row->loan_account, 'id'=> $row->id); //Add a row to array
		  	}
		}
		echo json_encode($records);
	}

	function get_loan_selected() {
		$loan_id = $this->input->post('id');
		echo json_encode(array('success'=>true, 'id'=>$loan_id));
	}

	// Approve account loan
	function approve_loan($loan_id=-1) {
		$data = array('account_status'=>'approved');
		if ($this->Loan_approval->dis_approve_loan($data, $loan_id)) {
			echo json_encode(array('success'=>true, 'message'=>'You have approved on the loan account', 'type'=>'success'));
		} else {
			echo json_encode(array('success'=>false, 'message'=>'You approve this loan account unsuccessfully', 'type'=>'error'));
		}
	}

	// Disapprove account loan
	function disapprove_loan($loan_id=-1) {
		$data = array('account_status'=>'pending');
		if ($this->Loan_approval->dis_approve_loan($data, $loan_id)) {
			echo json_encode(array('success'=>true, 'message'=>'You have disapproved on the loan account', 'type'=>'success'));
		} else {
			echo json_encode(array('success'=>false, 'message'=>'You disapprove this loan account unsuccessfully', 'type'=>'error'));
		}
	}

	// Delete loan by given id
	function delete() {
        $items_to_delete  = $this->input->post('ids');
        if ($this->Loan_approval->delete_list($items_to_delete)) {
            echo json_encode(array('success' => true, 'message' => 'Loan delete successfully!'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Loan can not be delete.'));
        }
    }

    function view_loan($loan_id=-1) {
    	$data['loan_id'] = $loan_id;
    	$data['controller_name'] = strtolower(get_class());

    	$data_payments = array();
    	$data['loan_info'] = $this->Loan_approval->get_info($loan_id);
    	$data_payments = array();
    	if ($loan_id!=-1) {
	    	$data_payments = parent::payment_schedule($data['loan_info']);
    	}
		$data['data_payments'] = $data_payments;

    	$this->load->view('loans/view_loan', $data);
    }

    public function schedule($loan_id=-1)
  {
    $data['controller_name'] = strtolower(get_class());
    $data['loan_info'] = $this->Loan_approval->get_info($loan_id);
    $data_payments = parent::payment_schedule($data['loan_info']);
    $data['data_payments'] = $data_payments;

    $this->load->view("schedules/schedule", $data);
  }

  	function get_holidays() {
	  	$start_date = '2015-01-01';
	  	$end_date = '2015-01-10';

	  	$holidays = $this->businessdays->getHolidayDays($start_date,$end_date);

	  	$year = date("Y");
	  	$holiday = $this->businessdays->get_holiday($year, 05, 1, 4);
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