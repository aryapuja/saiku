<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dc_model');

		if ($this->session->userdata('signin')==TRUE) 
		{
			// redirect('Section/index');
		}else{	
			redirect('Login');
		}
	}

	public function index()
	{
		$data['sec'] = $this->session->section;

		$this->load->view("section/header"); 
		$this->load->view('section/section_view');
		$this->load->view("section/footer");
	}

	public function get_notif()
	{
		$count=$this->Dc_model->countActivityNotUpdated($this->session->section);
		$count2=$count[0]['count(status)'];
		echo $count2;
	}

	public function getSectionSched()
	{
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
		$section = $this->session->section;
		$data['act'] = $this->Dc_model->get_activity_section($month,$year,$section);
		$data['cact'] = $this->Dc_model->get_act_line_month($month,$year,$section);

        echo json_encode($data);
	}

	public function updateSection()
	{	 
		date_default_timezone_set("Asia/Jakarta");
		$tglact = $this->input->post('ak_act_imp_up');
		$id = $this->input->post('u_id');

        if ($tglact == "0000-00-00 00:00:00" || $tglact == "1970-01-01 07:00:00" || $tglact == "NaN/aN/NaN") {
			$ak_act_imp = "0000-00-00 00:00:00";
        }else{
	        $ak_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_ak_act_imp') ) );
		}

		$result = $this->Dc_model->updateSection($id,$ak_act_imp);
		echo json_encode($result);
	}

	public function getModalDetail()
	{
		$date = $this->input->post('date');
		$month = (int) $this->input->post('month')+1;
		$year = $this->input->post('year');
		$section = $this->session->section;

		$data['tgl'] = [
			'date' => $date,
			'month' => $month,
			'year' => $year,
		];

 		$data['act'] = $this->Dc_model->get_activity_sched_section($date,$month,$year,$section);
 		
		$this->load->view('section/modal_detail',$data);
	}

	public function changePassword()
	{
		$result="";
		$data = [];
		$id = $this->session->id_user;
		$passold = $this->input->post('passold');
		$passnew = $this->input->post('passnew');
		$passnew2 = $this->input->post('passnew2');
		$getpass = $this->Dc_model->getPass($id);
		$getpass2=$getpass[0]['password'];

		if ($passold != $getpass2) {
			$data =['code' => 1];
		}else if ($passnew != $passnew2) {
			$data =['code' => 2];
		}else{
			$data =['code' => 3, 'result' => $this->Dc_model->changePass($id,$passold,$passnew)];
		}

		echo json_encode($data);
	}
}

/* End of file Section.php */
/* Location: ./application/controllers/Section.php */