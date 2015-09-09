<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MAIN_Controller {

	function _get_common_report_data($time=false)
	{
		$data = array();
		$data['report_date_range_simple'] = get_simple_date_ranges($time);
		$data['months'] = get_months();
		$data['days'] = get_days();
		$data['years'] = get_years();
		$data['hours'] = get_hours($this->config->item('time_format'));
		$data['minutes'] = get_minutes();
		$data['selected_month']=date('m');
		$data['selected_day']=date('d');
		$data['selected_year']=date('Y');	
	
		return $data;
	}

	function date_input_loan()
	{
		$data = $this->_get_common_report_data();
		$this->load->view("reports/date_input_loan",$data);	
	}

	function summary_loan($start_date, $end_date)
	{
		$this->load->model('reports/Report_loan');
		$model = $this->Report_loan;
		$end_date=date('Y-m-d 23:59:59', strtotime($end_date));
		
		$model->setParams(array('start_date'=>$start_date, 'end_date'=>$end_date));

		$this->Report->create_loans_temp_table(array('start_date'=>$start_date, 'end_date'=>$end_date));

        $start_date = rawurldecode($start_date);
        $end_date   = rawurldecode($end_date);

        $config                = array();
        $config['base_url']    = site_url("reports/summary_loan/" . rawurlencode($start_date) . '/' . rawurlencode($end_date));
        $config['total_rows']  = $model->getTotalRows();
        $config['per_page']    = 20;
        // $config['uri_segment'] = 7;
        $this->pagination->initialize($config);
        $tabular_data = array();
        $report_data  = $model->getData();

        foreach ($report_data as $row) {
            $tabular_data[] = array(
                array('data'  => date('D, d-m-Y', strtotime($row['maturity_date'])), 'align' => 'left'),
                array('data'  => $row['loan_account'], 'align' => 'left'),
                array('data'  => $row['duration_loan'].' '.$row['duration_loan_type'], 'align' => 'left'),
                array('data'  => $row['product_type_title'], 'align' => 'left'),
                array('data'  => $row['loan_amount'], 'align' => 'left'),
                array('data'  => date('D, d-m-Y', strtotime($row['first_repayment'])), 'align' => 'left'),
                array('data'  => $row['interest_rate'], 'align' => 'left'),
                array('data'  => $row['installment_amount'], 'align' => 'left'),
                array('data'  => $row['cln_eng'].' '.$row['cfn_eng'], 'align' => 'left'),
                array('data'  => $row['cphone_number'], 'align' => 'left'),
                array('data'  => $row['gender'], 'align' => 'left'),
                // array('data'  => '<a target="_blank" href="'.base_url().'proposals/preview/'.$row['pro_id'].'">view</a>', 'align' => 'left'),
                
            );
        }

        $data = array(
            "title"        => 'Report Loans',
            "subtitle"     => date('D, d/m/Y', strtotime($start_date)) . '-' . date('D, d/m/Y', strtotime($end_date)),
            "headers"      => $model->getDataColumns(),
            "data"         => $tabular_data,
            "summary_data" => $model->getSummaryData(),
            // "export_excel" => $export_excel,
            "pagination"   => $this->pagination->create_links(),
        );


		
		$this->load->view("reports/loan_summary",$data);
	}

}