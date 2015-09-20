<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Customer extends CI_Model {

    public function __Construct() {
            //parent::__construct();
    }

    function get_info($proposal_id)
    {
        $this->db->select('*, customers.id as customer_id, customers.first_name_english as cfne, customers.last_name_english as clne, customers.nick_name_english as cnne, customers.first_name_khmer as cfnkh, customers.last_name_khmer as clnkh, customers.nick_name_khmer as cnnkh, customers.identity_card_passport as cicp, customers.job as cjob, customers.income_per_month as cipm, customers.phone_number as cphone_number, spouse_informations.id as spouse_id, spouse_informations.first_name_english as spfne, spouse_informations.last_name_english as splne, spouse_informations.nick_name_english as spnne, spouse_informations.first_name_khmer as spfnkh, spouse_informations.last_name_khmer as splnkh, spouse_informations.nick_name_khmer as spnnkh, spouse_informations.identity_card_passport as spicp, spouse_informations.job as spjob, spouse_informations.income_per_month as spipm, spouse_informations.phone_number as spphone_number, ');
        $this->db->from('customers');   
        $this->db->join('spouse_informations', 'spouse_informations.customer_id = customers.id', 'left');
        $this->db->where('customers.id',$proposal_id);
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            $customer_obj = new stdClass();

            $fields = $this->db->list_fields('customers');

            foreach ($fields as $field)
            {
                $customer_obj->$field='';
            }
            $customer_obj->cfne = '';
            $customer_obj->clne = '';

            return $customer_obj;
        }
    }
       
}
