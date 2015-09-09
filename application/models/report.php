<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Model {

	//We create a temp table that allows us to do easy report/sales queries
	public function create_loans_temp_table($params)
	{
		// $location_id = $this->Employee->get_logged_in_employee_current_location_id();		
		$where = '';
		
		if (isset($params['sale_ids']))
		{
			if (!empty($params['sale_ids']))
			{
				for($k=0;$k<count($params['sale_ids']);$k++)
				{
					$params['sale_ids'][$k] = $this->db->escape($params['sale_ids'][$k]);
				}
				
				$where.='WHERE '.$this->db->dbprefix('loans').".id IN(".implode(',', $params['sale_ids']).")";
			}
			else
			{
				$where.='WHERE '.$this->db->dbprefix('loans').".id IN(0)";
			}
		}
		elseif (isset($params['start_date']) && isset($params['end_date']))
		{
			$where = 'WHERE maturity_date BETWEEN '.$this->db->escape($params['start_date']).' and '.$this->db->escape($params['end_date']);
		}
		else
		{
			$where .='WHERE deleted != 1';				
		}
		
		if ($where == '')
		{
			$where = 'WHERE account_status == "approved"';
		}
	
		$return = $this->_create_loans_temp_table_query($where);		
		return $return;
	}

	function _create_loans_temp_table_query($where)
	{
		set_time_limit(0);

		$loans = $this->db->dbprefix('loans');
		$customers = $this->db->dbprefix('customers');
		$spouse_informations = $this->db->dbprefix('spouse_informations');
		$product_types = $this->db->dbprefix('product_types');

		return $this->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS ".$this->db->dbprefix('loans_temp')."
		(SELECT ".$loans.".id as ID, ".$loans.".maturity_date, ".$loans.".loan_account, ".$loans.".account_status, ".$loans.".duration_loan, ".$loans.".duration_loan_type, ".$loans.".customer_id, ".$loans.".product_type_id, ".$loans.".product_type_title, ".$loans.".repayment_type, ".$loans.".ownership_type, ".$loans.".currency, ".$loans.".repayment_freg, ".$loans.".loan_amount, ".$loans.".loan_amount_in_word, ".$loans.".first_repayment, ".$loans.".renew_installment, ".$loans.".interest_rate, ".$loans.".penalty_rate, ".$loans.".installment_amount, ".$loans.".deleted, 
			".$product_types.".id as ptID, 
			".$customers.".id as customerID, ".$customers.".first_name_english as cfn_eng, ".$customers.".last_name_english as cln_eng, ".$customers.".nick_name_english as cnn_eng, ".$customers.".first_name_khmer as cfn_kh, ".$customers.".last_name_khmer as cln_kh, ".$customers.".nick_name_khmer as cnn_kh, ".$customers.".gender, ".$customers.".identity_card_passport as cidentity_card, ".$customers.".job as cjob, ".$customers.".income_per_month as cincome, ".$customers.".phone_number as cphone_number, ".$customers.".province, ".$customers.".khan_district, ".$customers.".sangkat_commune, ".$customers.".village, ".$customers.".home_number, ".$customers.".email, ".$customers.".date_of_birth as dob, ".$customers.".marrital_status, ".$customers.".account_type, 
			".$spouse_informations.".id as siID, ".$spouse_informations.".last_name_english as siln_eng, ".$spouse_informations.".first_name_english as sifn_eng, ".$spouse_informations.".nick_name_english as sinn_eng, ".$spouse_informations.".first_name_khmer as sifn_kh, ".$spouse_informations.".last_name_khmer as siln_kh, ".$spouse_informations.".nick_name_khmer as sinn_kh, ".$spouse_informations.".identity_card_passport as si_identity_card, ".$spouse_informations.".job as si_job, ".$spouse_informations.".income_per_month as si_income, ".$spouse_informations.".phone_number as sin_phone_number
		FROM ".$loans."
		INNER JOIN ".$product_types." ON  ".$loans.'.product_type_id='.$this->db->dbprefix('product_types').'.id'."
		INNER JOIN ".$customers." ON  ".$loans.'.customer_id='.$this->db->dbprefix('customers').'.id'."
		LEFT OUTER JOIN ".$spouse_informations." ON  ".$customers.'.id='.$spouse_informations.'.customer_id'."
		$where
		GROUP BY ".$loans.".ID)"
		);
	}

}