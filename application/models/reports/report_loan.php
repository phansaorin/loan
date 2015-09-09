<?php
require_once("record.php");
class Report_loan extends Record
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function getDataColumns(){
        return array(
            array('data'  => 'Maturity Date', 'align' => 'left'),
            array('data'  => 'Loan Account', 'align' => 'left'),
            array('data'  => 'Duration', 'align' => 'left'),
            array('data'  => 'Product Type', 'align' => 'left'),
            array('data'  => 'Loan Amount', 'align' => 'left'),
            array('data'  => 'First Repayment', 'align' => 'left'),
            array('data'  => 'Rate', 'align' => 'left'),
            array('data'  => 'Installment Amount', 'align' => 'left'),
            array('data'  => 'Customer', 'align' => 'left'),
            array('data'  => 'Phone Number', 'align' => 'left'),
            array('data'  => 'Gender', 'align' => 'left'),
        );
    }

	public function getData($deleted=0) {
        $this->db->select('*', FALSE);
        $this->db->from('loans_temp');
        $this->db->where($this->db->dbprefix('loans_temp') . '.account_status', 'approved');        
        $this->db->where($this->db->dbprefix('loans_temp') . '.deleted',$deleted);
        $this->db->order_by('ID');
        return $this->db->get()->result_array();
    }

	public function getSummaryData($deleted=0) {
        $this->db->select('COUNT(DISTINCT(ID)) as loan_count', FALSE);
        $this->db->from('loans_temp');
        $this->db->where($this->db->dbprefix('loans_temp') . '.account_status', 'approved');        
        $this->db->where($this->db->dbprefix('loans_temp') . '.deleted',$deleted);
        return $this->db->get()->row_array();
    }

	function getTotalRows($deleted=0) {
        $this->db->select("COUNT(DISTINCT(ID)) as loan_count", FALSE);
        $this->db->from('loans_temp');
        $this->db->where($this->db->dbprefix('loans_temp') . '.account_status', 'approved');
        $this->db->where($this->db->dbprefix('loans_temp') . '.deleted',$deleted);
        $ret = $this->db->get()->row_array();
        return $ret['loan_count'];
    }
}
?>