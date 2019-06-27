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
        echo json_encode( $this->dc_model->get_dc_sched_user($day,$month,$year));
	}

	public function getDcActUser()
	{
		$day = $this->input->post('date_p');	
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
        echo json_encode( $this->dc_model->get_activity_sched_user($day,$month,$year));
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */