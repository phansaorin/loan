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
            //Get empty base parent object, as $meeting_id is NOT an item
            $loan_obj = $this->get_customer_info(-1);

            //Get all the fields from loans table
            $fields = $this->db->list_fields('loans');

            foreach ($fields as $field)
            {
                $loan_obj->$field='';
            }

            return $loan_obj;    
        }
            
        $this->db->from('loans');
        $this->db->join('customers', 'customers.id = loans.customer_id');
        // $this->db->join('spouse_informations', 'spouse_informations.customer_id = customers.id', 'left');
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
            //Get empty base parent object, as $meeting_id is NOT an item
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
            //Get empty base parent object, as $meeting_id is NOT an item
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
            //Get empty base parent object, as $meeting_id is NOT an item
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
    function get_all($limit=10000, $offset=0,$col='maturity_date',$order='desc')
    {
        $query = $this->db->select('*')
            ->order_by($col, $order)
            ->where('deleted', 0)
            ->get('loans', $limit, $offset);

        return $query;
    }

    /*
      Deletes a list of loans
     */
    function delete_list($id) {
        $this->db->where_in('id', $id);            
        return $this->db->update('loans', array('deleted' => 1));
    }
       
}
