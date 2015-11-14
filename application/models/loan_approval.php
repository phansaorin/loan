<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Loan_approval extends CI_Model {

    public function __Construct() {
            //parent::__construct();
    }

    function set_loan_id($loan_id) {
        $this->session->set_userdata('loan_id', $loan_id);
    }

    function get_loan_id()
    {
        if($this->session->userdata('loan_id') === false)
            $this->set_loan_id(null);              
        return $this->session->userdata('loan_id');
    }

    function empty_loan_id()
    {
        $this->session->unset_userdata('loan_id');
    }

    function autocomplete($term) {
        $data = $this->db->from('loans')
            ->like('loan_account', $term)
            ->where('UPPER(account_status)', strtoupper('pending'))
            ->where('deleted', 0)
            ->get();

        return $data;
    }

    function get_info($loan_id, $is_pending=false)
    {
        //If we are NOT an int return empty item
        if (!is_numeric($loan_id))
        {
            //Get empty base parent object, as $loan_id is NOT an item
            $loan_obj = $this->get_customer_info(-1);

            //Get all the fields from loans table
            $fields = $this->db->list_fields('loans');

            foreach ($fields as $field)
            {
                $loan_obj->$field='';
            }

            return $loan_obj;    
        }
        
        $this->db->select('*, '. $this->db->dbprefix('loans').'.id as loan_id');    
        $this->db->from('loans');
        $this->db->join('customers', 'customers.id = loans.customer_id');
        $this->db->join('product_types', 'product_types.id = loans.product_type_id');
        if ($is_pending) {
            $this->db->where('UPPER(account_status)', strtoupper('pending'));
        }
        $this->db->where('loans.id',$loan_id);
        $this->db->where('loans.deleted',0);
        
        $query = $this->db->get();

        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            //Get empty base parent object, as $loan_id is NOT an item
            $loan_obj = $this->get_customer_info(-1);

            //Get all the fields from loans table
            $fields = $this->db->list_fields('loans');

            foreach ($fields as $field)
            {
                $loan_obj->$field='';
            }

            return $loan_obj;
        }
    }

    function get_customer_info($customer_id)
    {
        //If we are NOT an int return empty item
        if (!is_numeric($customer_id))
        {
            //Get empty base parent object, as $loan_id is NOT an item
            $customer_obj = new stdClass();

            //Get all the fields from customers table
            $fields = $this->db->list_fields('customers');

            foreach ($fields as $field)
            {
                $customer_obj->$field='';
            }

            return $customer_obj;    
        }
            
        $this->db->from('customers');
        $this->db->join('spouse_informations', 'spouse_informations.customer_id = customers.id');
        $this->db->where('customers.id',$customer_id);
        
        $query = $this->db->get();

        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            //Get empty base parent object, as $loan_id is NOT an item
            $customer_obj= new stdClass();

            //Get all the fields from customers table
            $fields = $this->db->list_fields('customers');

            foreach ($fields as $field)
            {
                $customer_obj->$field='';
            }

            return $customer_obj;
        }
    }

    // Dis or Approve loan
    function dis_approve_loan(&$data, $loan_id) {
        $success = false;
        return $this->db->where('id', $loan_id)->update('loans', $data);
    }


    // Get all list record of loan
    function get_all($limit=10000, $offset=0,$col='id',$order='desc')
    {
        $query = $this->db->select('*')
            ->order_by($col, $order)
            ->where('deleted', 0)
            ->get('loans', $limit, $offset);

        return $query;
    }

    function count_all()
    {
        $this->db->from('loans');
        $this->db->where('deleted',0);
        return $this->db->count_all_results();
    }

    /*
      Deletes a list of loans
     */
    function delete_list($id) {
        $this->db->where_in('id', $id);            
        return $this->db->update('loans', array('deleted' => 1));
    }

    // Get product type
    function get_all_product_type() {
        return $this->db->get('product_types');
    }

    function suggest_customer($term) {
        $this->db->where("(first_name_english LIKE '%".$this->db->escape_like_str($term)."%' or 
        CID LIKE '%".$this->db->escape_like_str($term)."%' or  
        last_name_english LIKE '%".$this->db->escape_like_str($term)."%' or 
        CONCAT(`first_name_english`,' ',`last_name_english`) LIKE '%".$this->db->escape_like_str($term)."%' or
        CONCAT(`last_name_english`,', ',`first_name_english`) LIKE '%".$this->db->escape_like_str($term)."%')");    
        return $this->db->get('customers');
    }

    function set_customer_id($customer_id) {
        $this->session->set_userdata('customer_id', $customer_id);
    }

    function get_customer_id() {
        if($this->session->userdata('customer_id') === false)
            $this->set_customer_id(-1);              
        return $this->session->userdata('customer_id');
    }

    function empty_customer_id() {
        $this->session->unset_userdata('customer_id');
    }

    function product_type_info($product_type_id) {
        $this->db->select('*');
        $this->db->from('product_types');   
        $this->db->where('product_types.id',$product_type_id);
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            $pt_obj = new stdClass();

            $fields = $this->db->list_fields('product_types');

            foreach ($fields as $field)
            {
                $pt_obj->$field='';
            }

            return $pt_obj;
        }
    }

    function get_last_running_number() 
    {
        $query = $this->db
                    ->select('loan_account')
                    ->order_by("id", "desc")
                    ->limit(1)
                    ->get('loans');
        if($query->num_rows() > 0){
            $data = $query->row();
            $id = $data->loan_account;
            $loan_account = explode("-", $id);
            return $loan_account[1];
        }else{
            return false;
        }
    }

    function exists($loan_id) {
        $query = $this->db
            ->where('id',$loan_id)
            ->get('loans');
        if ($query->num_rows() == 1) {
            return true;
        }
        return false;
    }

    function save(&$loan_data, $loan_id=false){
        $success = false;
        $this->db->trans_start();   // Start Transaction
        if (!$loan_id || !$this->exists($loan_id)) {
           $success = $this->db->insert('loans', $loan_data);
           $loan_data['id'] = $this->db->insert_id();
        } else {
            $success = $this->db->where('id',$loan_id)->update("loans", $loan_data);
        }
        $status = $this->db->trans_complete();
        return $success;
    }

    function exists_schedule($loan_id) {
        $query = $this->db
            ->where('loan_id',$loan_id)
            ->get('payment_schedules');
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    function save_schedule(&$schedules, $loan_id=false){
        $success = false;
        $this->db->trans_start();   // Start Transaction
        if (!$this->exists_schedule($loan_id)) {
            if (count($schedules) > 0) {
                foreach ($schedules as $rows) {
                   $success = $this->db->insert('payment_schedules', $rows);
                }
            }
        } else {
            if ($this->delete_schedule($loan_id)) {
                if (count($schedules) > 0) {
                    foreach ($schedules as $rows) {
                       $success = $this->db->insert('payment_schedules', $rows);
                    }
                }
            }
        }
        $this->db->trans_complete();
        return $success;
    }

    // Delete schedule payment by loan ID
    function delete_schedule($loan_id=-1) {
        if ($loan_id) {
            return $this->db->where("loan_id", $loan_id)->delete("payment_schedules");
        }
        return false;
    }

    // Get row from schedule payment
    function get_schedule($loan_id)
    {
        //If we are NOT an int return empty item
        if (!is_numeric($loan_id))
        {
            //Get empty base parent object, as $loan_id is NOT an item
            $ps_obj = new stdClass();

            //Get all the fields from payment_schedules table
            $fields = $this->db->list_fields('payment_schedules');

            foreach ($fields as $field)
            {
                $ps_obj->$field='';
            }

            return $ps_obj;    
        }
        
        $this->db->select('pay_date, beginning_balance, pay_capital, pay_interest, paid, '.$this->db->dbprefix('payment_schedules').'.id as pay_id');
        $this->db->from('payment_schedules');
        $this->db->join('loans', 'payment_schedules.loan_id = loans.id');
        $this->db->where('payment_schedules.loan_id',$loan_id);
        $this->db->where('loans.deleted',0);
        
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            //Get empty base parent object, as $loan_id is NOT an item
            $ps_obj = new stdClass();

            //Get all the fields from payment_schedules table
            $fields = $this->db->list_fields('payment_schedules');

            foreach ($fields as $field)
            {
                $ps_obj->$field='';
            }

            return $ps_obj;
        }
    }

    // Payment on schedule loan
    function update_payment_schedule(&$data, $loan_id, $id) {
        return $this->db->where('id', $id)->where('loan_id', $loan_id)->update('payment_schedules', $data);
    }

    // Pay off payment
    function pay_off($data, $loan_id) {
        return $this->db->where('loan_id', $loan_id)->where('paid', 0)->update('payment_schedules', $data);
        $loan_data = array('status' => "pay-off");
        $this->save($loan_data, $loan_id);
    }
       
}
