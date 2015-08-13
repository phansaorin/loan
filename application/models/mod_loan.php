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

        function exists($loan_id) {
            $query = $this->db
                ->where('id',$loan_id)
                ->get('loans');
            // return $query->num_rows();
            if ($query->num_rows() == 1) {
                return true;
            }
            return false;
        }

        public function save(&$data, $loan_id=false){
            $success = false;
            $this->db->trans_start();   // Start Transaction
            if (!$loan_id || $this->exists($loan_id)) {
               $success = $this->db->insert('loans', $data);
               $data['id'] = $this->db->insert_id();
            } else {
                $success = $this->db->where('id',$loan_id)->update("loans", $data);
            }
            $this->db->trans_complete();
            return $success;
        }
       
}

?> 
