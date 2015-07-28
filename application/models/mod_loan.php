<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Mod_Loan extends CI_Model {

        public function __Construct() {
                //parent::__construct();
        }

        public function open_loan(){
            $this->db->select('*');
            $this->db->from('customers');
            $query = $this->db->get();
            // $query = $this->db->get('customers');
            // $this->db->select('*');
            // $this->db->from('blogs');
            return $query->result();
        }
       
}

?> 
