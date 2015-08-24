<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_approvals extends MAIN_Controller {

	public function approval($loan_id=-1) {
		$data['loan_id'] = $loan_id;
    	$data['controller_name'] = strtolower(get_class());

    	$data_payments = array();
    	// $loan_id = $this->Loan_approval->get_loan_id();
    	$data['loan_info'] = $this->Loan_approval->get_info($loan_id);
    	// var_dump($data['loan_info']);
    	// $data['loan_info'] = $this->Schedule->get_info($loan_id);
    	$data_payments = array();
    	if ($loan_id!=-1) {
	    	$data_payments = parent::payment_schedule($data['loan_info']);
    	}
		$data['data_payments'] = $data_payments;
    	// var_dump($data['data_payments']);die();

    	$this->load->view("loan_approvals/approval", $data);
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
		// $this->Loan_approval->set_loan_id($loan_id);
		echo json_encode(array('success'=>true, 'id'=>$loan_id));
		/*$data['loan_info'] = $this->Loan_approval->get_info($loan_id);
		$data_payments = parent::payment_schedule($data['loan_info']);
    	$data['data_payments'] = $data_payments;

		$this->load->view("schedules/includes/table_schedule", $data);*/
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


	// List record of loan
	function list_loan() {
		$data['controller_name'] = "loan_approvals";
		$data['lists'] = $this->Loan_approval->get_all();
		// var_dump($data['lists']); die();

		$this->load->view('loan_approvals/list_loan', $data);
	}

}