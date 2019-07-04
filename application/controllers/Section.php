<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

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
		$data['sec'] = $this->session->section;

		$this->load->view("section/header"); 
		$this->load->view('section/section_view');
		$this->load->view("section/footer");
	}

	public function getSectionSched()
	{
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
		$section = $this->session->section;
		$data['act'] = $this->dc_model->get_activity_section($month,$year,$section);
		$data['cact'] = $this->dc_model->get_act_line_month($month,$year,$section);

        echo json_encode($data);
	}

	public function updateSection()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$id = $this->input->post('u_id');
        
        $ak_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_ak_act_imp') ) );

		$result = $this->dc_model->updateSection($id,$ak_act_imp);

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

 		$data['act'] = $this->dc_model->get_activity_sched_section($date,$month,$year,$section);
 		
		$this->load->view('section/modal_detail',$data);
	}
}

/* End of file Section.php */
/* Location: ./application/controllers/Section.php */