<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dc_model');

	}

	public function index()
	{
		$data['nor'] = $this->dc_model->get_nor();
		$data['no'] = $this->dc_model->get_no();

		$this->load->view("agenda/header"); 
		$this->load->view('agenda/agenda_view',$data);
		$this->load->view("agenda/footer");
	}

	public function getDcSched()
	{
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
        echo json_encode( $this->dc_model->get_dc_sched($month,$year));
	}

	public function getDcMonth()
	{
        echo json_encode( $this->dc_model->get_dc());
	}

	// Membuat fungsi create
	public function newDc()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$nor = $this->input->post('nor');
		$no = $this->input->post('no');
		$line = $this->input->post('line');
		$item_changes = $this->input->post('item_changes');
		// $carline = $this->input->post('carline');
		$date_plan = date( 'Y-m-d H:i:s', strtotime( $this->input->post('date_plan') ) );
		

		$result = $this->dc_model->newDc($nor,$no,$item_changes,$line,$date_plan);

		echo json_encode($result);
	}

	// Membuat fungsi UPDATE
	public function updateDc()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$id = $this->input->post('u_id');
        $nor = $this->input->post('u_nor');
        $no = $this->input->post('u_no');
        $line = $this->input->post('u_line');
        $item_changes = $this->input->post('u_item_changes');
        $date_plan = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_date_plan') ) );
		
		// $end = $start;

		$result = $this->dc_model->updateDc($id,$nor,$no,$line,$item_changes,$date_plan);

		echo json_encode($result);

		// if ($result) {
		// 	echo json_encode("suc ");
		// }else{
		// 	echo json_encode("Gagal");
		// }
		
	}

	// Membuat fungsi create
	public function deleteDc()
	{	  
		// $id = $this->input->post('deleteDcku');

		$result = $this->dc_model->deleteDc();
		echo json_encode($result);
	}

	public function getCountAgenda()
	{
		echo json_encode($this->dc_model->get_count_agenda());
	}

	public function getCountWeekAgenda()
	{
		echo json_encode($this->dc_model->get_count_week_agenda());
	}
//================================================================Acivity================================================================
	
	public function getActSched()
	{
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
        echo json_encode( $this->dc_model->get_activity_sched($month,$year));
	}

	public function getActivityMonth()
	{
        echo json_encode( $this->dc_model->get_activity());
	}

	// Membuat fungsi create
	public function newActivity()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$nor = $this->input->post('nor');
		$no = $this->input->post('no');
		$line = $this->input->post('line');
		$item_changes = $this->input->post('item_changes');
		// $carline = $this->input->post('carline');
		$date_plan = date( 'Y-m-d H:i:s', strtotime( $this->input->post('date_plan') ) );
		

		$result = $this->dc_model->newActivity($nor,$no,$item_changes,$line,$date_plan);

		echo json_encode($result);
	}

	// Membuat fungsi UPDATE
	public function updateActivity()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$id = $this->input->post('u_id');
        $nor = $this->input->post('u_nor');
        $no = $this->input->post('u_no');
        $line = $this->input->post('u_line');
        $item_changes = $this->input->post('u_item_changes');
        $date_plan = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_date_plan') ) );
		
		// $end = $start;

		$result = $this->dc_model->updateActivity($id,$nor,$no,$line,$item_changes,$date_plan);

		echo json_encode($result);

		// if ($result) {
		// 	echo json_encode("suc ");
		// }else{
		// 	echo json_encode("Gagal");
		// }
		
	}

	// Membuat fungsi create
	public function deleteActivity()
	{	  
		// $id = $this->input->post('deleteDcku');

		$result = $this->dc_model->deleteActivity();
		echo json_encode($result);
	}
}
