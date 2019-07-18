<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dc_model');

		if ($this->session->userdata('signin')==TRUE) 
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
		

		$this->load->view("agenda/header",$data); 
		$this->load->view('agenda/agenda_view',$data);
		$this->load->view("agenda/footer");
	}

	public function get_notif()
	{
		$count=$this->dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		echo $count2;
	}

	public function get_notif2()
	{
		$count=$this->dc_model->countActivityWaiting();
		$count2=$count[0]['count(status)'];
		echo $count2;
	}

	public function indexx()
	{
		$data['nor'] = $this->dc_model->get_nor();
		$data['no'] = $this->dc_model->get_no();
		$count=$this->dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		$data['countuserwaiting'] = $count2;

		$this->load->view("agenda/header",$data); 
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
		$line1 = $this->input->post('line1');
		$line2 = $this->input->post('line2');
		$line3 = $this->input->post('line3');
		$line4 = $this->input->post('line4');
		$line5 = $this->input->post('line5');
		$item_changes = $this->input->post('item_changes');
		// $carline = $this->input->post('carline');
		$nor_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('nor_plan_imp') ) );
		// $nor_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('nor_act_imp') ) );
		
		$result = $this->dc_model->newDc($nor,$no,$item_changes,$line1,$line2,$line3,$line4,$line5,$nor_plan_imp);

		echo json_encode($result);
	}

	// Membuat fungsi UPDATE
	public function updateDc()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$id = $this->input->post('u_id');
        $nor = $this->input->post('u_nor');
        $no = $this->input->post('u_no');
        $line1 = $this->input->post('u_line1');
		$line2 = $this->input->post('u_line2');
		$line3 = $this->input->post('u_line3');
		$line4 = $this->input->post('u_line4');
		$line5 = $this->input->post('u_line5');
		$tglact = $this->input->post('nor_act_imp_up');
        $item_changes = $this->input->post('u_item_changes');
        $nor_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_nor_plan_imp') ) );

        if ($tglact == "0000-00-00 00:00:00" || $tglact == "1970-01-01 07:00:00" || $tglact == "NaN/aN/NaN") {
        	$nor_act_imp = "0000-00-00 00:00:00";
        }else{
        	$nor_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('nor_act_imp_up') ) );
        }

        // $nor_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_nor_act_imp') ) );
        // var_dump($nor_act_imp);
        // die();

		$result = $this->dc_model->updateDc($id,$nor,$no,$item_changes,$line1,$line2,$line3,$line4,$line5,$nor_plan_imp,$nor_act_imp);

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
		$ak_plan_imp 	= $_POST['ak_plan_imp'];
		
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
				'ak_act_imp'=>"0000-00-00 00:00:00",
				'status'=>"not updated",  // Ambil dan set data alamat sesuai index array dari $index
				
			));
			$set = [
			'status' => "On Progress",
		];
		$this->db->where('nor',$nor[$index]);
		$this->db->where('no',$no[$index]);
		$this->db->update('nor',$set);
			$index++;
		}

		$sql = $this->dc_model->newactivity($data);

		echo json_encode($sql);
	}

	// Membuat fungsi UPDATE
	public function updateActivity()
	{	 
		date_default_timezone_set("Asia/Jakarta");
        $null = "0000-00-00 00:00:00";

        $status=$this->input->post('status');
		$nor = $this->input->post('nor_act_up');
        $no = $this->input->post('no_act_up');
		$jml1 = $this->dc_model->countDate($nor,$no);
		$jml = $jml1[0]['count(ak_act_imp)'];
		$tglact = $this->input->post('ak_act_imp_up');
		$id = $this->input->post('u_id_act');
        $nama_dvs = $this->input->post('nama_dvs_up');
        $nama_act = $this->input->post('nama_act_up');
        $ak_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('ak_plan_imp_up') ) );
        if ($tglact == "0000-00-00 00:00:00" || $tglact == "1970-01-01 07:00:00" || $tglact == "NaN/aN/NaN") {
        	$ak_act_imp = "0000-00-00 00:00:00";
        }else{
        	$ak_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('ak_act_imp_up') ) );
        }
        
		$this->dc_model->updateStatus($jml,$nor,$no);
		$result = $this->dc_model->updateActivity($id,$nama_act,$ak_plan_imp,$ak_act_imp,$nama_dvs,$nor,$no);
		echo json_encode($result);		
	}

	// Membuat fungsi create
	public function deleteActivity()
	{	  
		// $id = $this->input->post('deleteDcku');

		$result = $this->dc_model->deleteActivity();
		echo json_encode($result);
	}

	public function select_no()
	{
		$data['no'] = $this->dc_model->get_no();
		$this->load->view('agenda/select_no',$data);
	}

	public function select_nor()
	{
		$data['nor'] = $this->dc_model->get_nor();
		$this->load->view('agenda/select_nor',$data);
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

		$this->load->view('agenda/Modal_Detail',$data);
	}

	public function listUser()
	{
		$count=$this->dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		$data['countuserwaiting'] = $count2;
		$this->load->view("account/header",$data); 
		$this->load->view("account/listUser");
		$this->load->view("account/footer");
	}

	public function getListUser()
	{
        echo json_encode( $this->dc_model->getListUser());
	}

	public function updateuser()
	{
		$id=$this->input->post('u_id');
		$status=$this->input->post('u_status');

		$result = $this->dc_model->updateUser($id,$status);
		echo json_encode($result);
	}

	public function deleteUser()
	{	  
		// $id = $this->input->post('deleteDcku');

		$result = $this->dc_model->deleteUser();
		echo json_encode($result);
	}

	public function listActivity()
	{
		$count=$this->dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		$data['countuserwaiting'] = $count2;

		$this->load->view("activity/header",$data); 
		$this->load->view("activity/listActivity");
		$this->load->view("activity/footer");
	}

	public function getListActivity()
	{
        echo json_encode( $this->dc_model->getListAct());
	}

	public function newmActivity()
	{
		$nama = $this->input->post('nama');
		$result = $this->dc_model->newMasterAct($nama);

		echo json_encode($result);
	}

	public function updatemActivity()
	{
		$nama = $this->input->post('unama');
		$id = $this->input->post('uid');
		$result = $this->dc_model->updateMasterAct($id,$nama);

		echo json_encode($result);
	}

	public function deletemActivity()
	{
		$result=$this->dc_model->deleteMasterAct();
		echo json_encode($result);
	}

	public function confirmActivity()
	{
		$id = $this->input->post('id');
		$nor = $this->input->post('nor');
		$no = $this->input->post('no');

		$jml1 = $this->dc_model->countDate($nor,$no);
		$jml = $jml1[0]['count(ak_act_imp)'];
		
		$this->dc_model->updateStatus2($jml,$nor,$no);
		$result = $this->dc_model->confirmActivity($id,$nor,$no);

		echo json_encode($result);
	}

}

