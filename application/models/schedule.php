<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Schedule extends CI_Model {

	function get_info($loan_id) {
		$this->db->from('loans');	
		$this->db->join('customers', 'customers.id = loans.customer_id');
		$this->db->join('product_types', 'product_types.id = loans.product_type_id');
		$this->db->where('loans.id',$loan_id);
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $load_id is NOT an loans
			// $loan_obj=parent::get_info(-1);
			
			//Get all the fields from loans table
			$fields = $this->db->list_fields('loans');
			
			//append those fields to base parent object, we we have a complete empty object
			foreach ($fields as $field)
			{
				$loan_obj->$field='';
			}
			
			return $loan_obj;
		}
	}

	/*
	Gets information about a customer as an array.
	*/
	/*function get_info($customer_id)
	{
		$query = $this->db->get_where('customers', array('id' => $customer_id), 1);
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//create object with empty properties.
			$fields = $this->db->list_fields('customers');
			$customer_obj = new stdClass;
			
			foreach ($fields as $field)
			{
				$customer_obj->$field='';
			}
			
			return $customer_obj;
		}
	}*/

	function get_info_customer($customer_id)
	{
		$this->db->from('employees');	
		$this->db->join('people', 'people.person_id = employees.person_id');
		// $this->db->join('app_files', 'people.image_id = app_files.file_id');
		$this->db->where('employees.person_id',$customer_id);
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $customer_id is NOT an customer
			$person_obj=parent::get_info(-1);
			
			//Get all the fields from customer table
			$fields = $this->db->list_fields('employees');
			
			//append those fields to base parent object, we we have a complete empty object
			foreach ($fields as $field)
			{
				$person_obj->$field='';
			}
			
			return $person_obj;
		}
	}

}