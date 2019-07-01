<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dc_model');

		if ($this->session->userdata('status')==TRUE) 
		{
			// redirect('Dc_Controller/index');
		}else{	
			redirect('login');
		}

	}

	public function index()
	{
		$data['nor'] = $this->dc_model->get_nor();
		$data['no'] = $this->dc_model->get_no();

		$this->load->view("agenda/header"); 
		$this->load->view('agenda/agenda_view',$data);
		$this->load->view("agenda/footer");
	}

	public function indexx()
	{
		$data['nor'] = $this->dc_model->get_nor();
		$data['no'] = $this->dc_model->get_no();

		$this->load->view("agenda/header"); 
		$this->load->view("home/agenda_view",$data);
		$this->load->view("home/footer");
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
		$nor_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('nor_plan_imp') ) );
		// $nor_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('nor_act_imp') ) );
		
		$result = $this->dc_model->newDc($nor,$no,$item_changes,$line,$nor_plan_imp);

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
        $nor_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_nor_plan_imp') ) );
        $nor_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_nor_act_imp') ) );

		$result = $this->dc_model->updateDc($id,$nor,$no,$item_changes,$line,$nor_plan_imp,$nor_act_imp);

		echo json_encode($result);
	}

	// Membuat fungsi delete
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

		$nor 			= $_POST['nor_act']; // Ambil data nis dan masukkan ke variabel nis
		$no 			= $_POST['no_act']; // Ambil data nama dan masukkan ke variabel nama
		$nama_dvs 		= $_POST['nama_dvs']; // Ambil data telp dan masukkan ke variabel telp
		$nama_act 		= $_POST['nama_act']; // Ambil data alamat dan masukkan ke variabel alamat
		$ak_plan_imp 		= $_POST['ak_plan_imp'];
		// $date_actual 	= "null";
		$data = array();
		
		$index = 0; // Set index array awal dengan 0
		foreach($nor as $datanor){ // Kita buat perulangan berdasarkan nis sampai data terakhir
			array_push($data, array(
				'nor'=>$datanor,
				'no'=>$no[$index],  // Ambil dan set data nama sesuai index array dari $index
				'nama_dvs'=>$nama_dvs[$index],  // Ambil dan set data telepon sesuai index array dari $index
				'nama_act'=>$nama_act[$index],  // Ambil dan set data alamat sesuai index array dari $index
				'ak_plan_imp'=>date( 'Y-m-d H:i:s', strtotime( $ak_plan_imp[$index] ) ),  // Ambil dan set data alamat sesuai index array dari $index
				'ak_act_imp'=>"0000-00-00",  // Ambil dan set data alamat sesuai index array dari $index
			));
			
			$index++;
		}
		
		$sql = $this->dc_model->newactivity($data);

		echo json_encode($sql);
	}

	// Membuat fungsi UPDATE
	public function updateActivity()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$id = $this->input->post('u_id_act');
        $nor = $this->input->post('nor_act_up');
        $no = $this->input->post('no_act_up');
        $nama_dvs = $this->input->post('nama_dvs_up');
        $nama_act = $this->input->post('nama_act_up');
        $ak_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('ak_plan_imp_up') ) );
        $ak_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('ak_act_imp_up') ) );
		
		// $end = $start;

		$result = $this->dc_model->updateActivity($id,$nama_act,$ak_plan_imp,$ak_act_imp,$nama_dvs,$nor,$no);

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

	public function select_nor()
	{
		$data['nor'] = $this->dc_model->get_nor();
		$data['no'] = $this->dc_model->get_no();
		$this->load->view('agenda/select_nor',$data);
	}

	

}
