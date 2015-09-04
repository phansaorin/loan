<?php
require_once("record.php");
class Report_loan extends Record
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*public function getDataColumns()
	{
		return array();		
	}*/
/*Maturity Date
Loan Account
Duration
Loan Amount
First Repayment
Rate
Installment Amount
Customer
Phone Number*/
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
        );
    }
	
	/*public function getData()
	{
		$data = array();
		
		$this->db->select('*');
		$this->db->from('loans_temp');
		$this->db->where('deleted', 0);
		$result = $this->db->get()->row_array();
		
		$data = $result;
		return $data;
	}*/

	public function getData($deleted=0) {
        $this->db->select('*', FALSE);
        $this->db->from('loans_temp');
        $this->db->where($this->db->dbprefix('loans_temp') . '.account_status', 'approved');
        $this->db->where($this->db->dbprefix('loans_temp') . '.maturity_date >=',$start_date);
        $this->db->where($this->db->dbprefix('loans_temp') . '.maturity_date <=',$end_date);
        $this->db->where($this->db->dbprefix('loans_temp') . '.deleted',$deleted);
        $this->db->order_by('ID');
        return $this->db->get()->result_array();
    }

	
	/*public function getSummaryData()
	{
		return array();
	}*/

	public function getSummaryData($deleted=0) {
        $this->db->select('COUNT(DISTINCT(ID)) as loan_count', FALSE);
        $this->db->from('loans_temp');
        $this->db->where($this->db->dbprefix('loans_temp') . '.account_status', 'approved');
        $this->db->where($this->db->dbprefix('loans_temp') . '.maturity_date >=',$start_date);
        $this->db->where($this->db->dbprefix('loans_temp') . '.maturity_date <=',$end_date);
        $this->db->where($this->db->dbprefix('loans_temp') . '.deleted',$deleted);
        return $this->db->get()->row_array();
    }

	/*public function getTotalRows()
	{
		$this->db->select("COUNT(DISTINCT(id)) as loan_count");
		$this->db->from('loans_temp');
		$ret = $this->db->get()->row_array();
		return $ret['loan_count'];
	}*/

	function getTotalRows($deleted=0) {
        $this->db->select("COUNT(DISTINCT(ID)) as loan_count", FALSE);
        $this->db->from('loans_temp');
        $this->db->where($this->db->dbprefix('loans_temp') . '.account_status', 'approved');
        $this->db->where($this->db->dbprefix('loans_temp') . '.maturity_date >=',$start_date);
        $this->db->where($this->db->dbprefix('loans_temp') . '.maturity_date <=',$end_date);
        $this->db->where($this->db->dbprefix('loans_temp') . '.deleted',$deleted);
        $ret = $this->db->get()->row_array();
        return $ret['loan_count'];
    }
}
?>