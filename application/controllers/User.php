<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dc_model');


	}

	public function index()
	{

		$data['nor'] = $this->dc_model->get_nor();
		$data['no'] = $this->dc_model->get_no();

		$this->load->view("home/header"); 
		$this->load->view('home/agenda_view',$data);
		$this->load->view("home/footer");
	}

	public function getDcSchedUser()
	{
		$day = $this->input->post('date_p');	
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
		$data['lineku'] = $this->dc_model->get_count_line($day,$month,$year);
		$data['cline'] = count($data['lineku']);
 		$data['sch'] = $this->dc_model->get_dc_sched_user($day,$month,$year);
 		$data['cline2'] = $this->dc_model->get_count_line_month($month);
        echo json_encode( $data);

	}

	public function getDcActUser()
	{
		$day = $this->input->post('date_p');	
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
        echo json_encode( $this->dc_model->get_activity_sched_user($day,$month,$year));
	}

	public function getModalDetail()
	{
		$date = $this->input->post('date');
		$month = (int) $this->input->post('month')+1;
		$year = $this->input->post('year');

		$data['tgl'] = [
			'date' => $date,
			'month' => $month,
			'year' => $year,
		];
 		$data['sch'] = $this->dc_model->get_dc_sched_user($date,$month,$year);
 		$data['act'] = $this->dc_model->get_activity_sched_user($date,$month,$year);
 		
		$this->load->view('home/modal_detail',$data);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */