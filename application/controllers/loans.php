<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loans extends MAIN_Controller {

	// List record of loan
	function index($offset=0) {
		$this->clear_sessions();
		$data['controller_name'] = strtolower(get_class());

    /* This Application Must Be Used With BootStrap 3 *  */
    /*$config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";*/

     //config for bootstrap pagination class integration
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';


    $config['base_url'] = site_url('loans/index');
    $config['per_page'] = 2; 
    $config['total_rows'] = $this->Loan_approval->count_all();
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $per_page = $config['per_page'];
    $data['lists'] = $this->Loan_approval->get_all($per_page, $offset);

		$this->load->view('loans/list_loan', $data);
	}

	// List record of loan
	function list_loan() {
		$this->index();
	}

	function clear_sessions() {
		$this->Loan_approval->empty_customer_id();
	}

	function create($loan_id=-1) {
    $data['loan_id'] = $loan_id;
    $data['loan_info'] = $this->Loan_approval->get_info($loan_id);
    $customer_id = $data['loan_info']->customer_id;
    // var_dump($customer_id); die();
		if ($customer_id == "") {
			$customer_id = $this->Loan_approval->get_customer_id();
		}
		$data['customer_info'] = $this->Customer->get_info($customer_id);

		$product_type = $this->Loan_approval->get_all_product_type();
		$product_types = array(''=>'-- Please Select --');
		foreach ($product_type->result() as $key => $pt) {
			$product_types[$pt->id] = $pt->product_type_title;
		}
		$data['product_types'] = $product_types;
		$this->load->view("loans/create", $data);
	}

	function save($loan_id=-1){
    $datas = $this->input->post();
    if ($loan_id == -1) {
      $customer_id = $this->Loan_approval->get_customer_id();
      $customer_info = $this->Customer->get_info($customer_id);
    } else {
      $loan_info = $this->Loan_approval->get_info($loan_id);
      $customer_id = $loan_info->customer_id;
      $customer_info = $this->Customer->get_info($customer_id);
    }
		$product_type_info = $this->Loan_approval->product_type_info($datas['product_type']);
		$loan_account = $this->generate_loan_account($customer_id);
        $loan_data = array(
          	'loan_account' => $loan_account,
          	'maturity_date' => date('Y-m-d', strtotime($datas['maturity_date'])),
          	'duration_loan' => $datas['duration_loan'],
          	'duration_loan_type' => $datas['duration_loan_type'],
          	'customer_id' => $customer_id,
          	'product_type_title' => $product_type_info->product_type_title,
          	'product_type_id' => $datas['product_type'],
          	'repayment_type' => $datas['repayment_type'],
          	'ownership_type' => $datas['ownership_type'],
          	'currency' => $datas['currency'],
            'amount_freg' => $datas['amount_freg'],
          	'repayment_freg' => $datas['repayment_freg'],
          	'loan_amount' => $datas['loan_amount'],
          	'loan_amount_in_word' => $datas['loan_amount_in_word'],
          	'first_repayment' => date('Y-m-d', strtotime($datas['first_repayment'])),
          	'renew_installment' => $datas['renew_installment'],
          	'interest_rate' => $datas['interest_rate'],
          	'penalty_rate' => $datas['penalty_rate'],
          	'installment_amount' => $datas['installment_amount'],
            'status_loan' => $datas['status_loan']
        );
        if ($this->Loan_approval->save($loan_data, $loan_id)) {
        	if ($loan_id==-1) {
        		$loan_id = $loan_data['id'];
        	}
          echo json_encode(array("success"=>true, 'message'=>"Add/Update successfully", 'loan_id'=>$loan_id));
        } else {
          echo json_encode(array("success"=>FALSE, 'message'=>'Cannot Add/Update loan', 'loan_id'=>$loan_id));
        }
    }

    function generate_loan_account($customer_id=false) {
        $running_number = $this->last_running_number();
        $prefix = "8888";
        $loan_account = $prefix.'-'.$running_number.'-'.$customer_id;
        return $loan_account;
    }

    function last_running_number() {
        $last_running_number = $this->Loan_approval->get_last_running_number();
        $running_number = $last_running_number + 1;
        if (strlen($running_number) < 8) {
            $running_number = str_pad($running_number, 8, '0', STR_PAD_LEFT);
        }
        return $running_number;
    }

	function suggest_customer() {
  		$term =  $this->input->post('term');
  		// Manipulate data in Controller, and return query from Model
		$query = $this->Loan_approval->suggest_customer($term);
		$records = array();
        if($query->num_rows() > 0){
		    foreach($query->result() as $row){
		 	  	$records[] = array('label'=> $row->first_name_english.' '.$row->first_name_english, 'value'=> $row->CID, 'id'=> $row->id); //Add a row to array
		  	}
		}
		echo json_encode($records);
	}

	function get_customer_selected() {
		$customer_id = $this->input->post('id');
		$this->Loan_approval->set_customer_id($customer_id);
		$customer_info = $this->Customer->get_info($customer_id);
		echo json_encode(array('success'=>true, 'customer'=>$customer_info, 'dob'=>date('d-M-Y', strtotime($customer_info->date_of_birth)), 'id'=>$customer_id));
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

    function voucher_print($loan_id=-1){
    	$data['loan_info'] = $this->Loan_approval->get_info($loan_id);
    	$customer_id = $data['loan_info']->customer_id;
    	$data['customer_info'] = $this->Customer->get_info($customer_id);

    	$data_payments = array();
    	if ($loan_id!=-1) {
	    	$data_payments = parent::payment_schedule($data['loan_info']);
    	}
		$data['data_payments'] = $data_payments;
		$last_index = count($data_payments) - 1;
		$data['loan_first_date'] = date('d-M-Y', strtotime($data_payments[0]['pay_date']));
		$data['loan_deadline_date'] = date('d-M-Y', strtotime($data_payments[$last_index]['pay_date']));
		$data['invoice_code'] = $this->generate_invoice_code($data['loan_info']->loan_account);
		$data['days_in_khmer'] = array(
			'Mon' => 'ចន្ធ័',
			'Tue' => 'អង្គារ៍',
			'Wed' => 'ពុធ',
			'Thu' => 'ព្រហស្បត្តិ៍',
			'Fri' => 'សុក្រ',
			'Sat' => 'សៅរ៍',
			'Sun' => 'អាទិត្យ'
		);

      	$this->load->view('loans/voucher_print', $data);
    }

    function generate_invoice_code($loan_account='') {
    	$invoice_code = "";
    	$prefix = "inv";
    	$subfix = "ps";
    	if($loan_account != ""){
            $loan_accounts = explode("-", $loan_account);
            $invoice_code = $prefix.$loan_accounts[1].'-'.$loan_accounts[2].$subfix;
        }
        return $invoice_code;
    }

}