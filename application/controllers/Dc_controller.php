<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dc_model');
		// $this->load->helper('download');
		$this->load->library('excel');
		if ($this->session->userdata('signin')==TRUE) 
		{
			// redirect('Dc_Controller/index');
		}else{	
			redirect('login');
		}

	}

	public function index()
	{
		$data['nor'] = $this->Dc_model->get_nor();
		$data['no'] = $this->Dc_model->get_no();
		$this->load->view("agenda/header",$data); 
		$this->load->view('agenda/agenda_view',$data);
		$this->load->view("agenda/footer");
	}

	public function get_notif()
	{
		$count=$this->Dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		echo $count2;
	}

	public function get_notif2()
	{
		$count=$this->Dc_model->countActivityWaiting();
		$count2=$count[0]['count(status)'];
		echo $count2;
	}

	public function indexx()
	{
		$data['nor'] = $this->Dc_model->get_nor();
		$data['no'] = $this->Dc_model->get_no();
		$count=$this->Dc_model->countUserWaiting();
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
        echo json_encode( $this->Dc_model->get_dc_sched($month,$year));
	}

	public function getDcMonth()
	{
        echo json_encode( $this->Dc_model->get_dc());
	}

	// Membuat fungsi create
	public function newDc()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$nor = $this->input->post('nor');
		$no = $this->input->post('no');
		$meeting_date = $this->input->post('meeting_date');
		$line1 = $this->input->post('line1');
		$line2 = $this->input->post('line2');
		$line3 = $this->input->post('line3');
		$line4 = $this->input->post('line4');
		$line5 = $this->input->post('line5');
		$item_changes = $this->input->post('item_changes');
		// $carline = $this->input->post('carline');
		$nor_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('nor_plan_imp') ) );
		// $nor_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('nor_act_imp') ) );
		
		$result = $this->Dc_model->newDc($nor,$no,$meeting_date,$item_changes,$line1,$line2,$line3,$line4,$line5,$nor_plan_imp);

		echo json_encode($result);
	}

	// Membuat fungsi UPDATE
	public function updateDc()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$id = $this->input->post('u_id');
        $nor = $this->input->post('u_nor');
        $no = $this->input->post('u_no');
        $meeting_date = date( 'Y-m-d H:i:s', strtotime( $this->input->post('u_meeting_date') ) );
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

		$result = $this->Dc_model->updateDc($id,$nor,$no,$meeting_date,$item_changes,$line1,$line2,$line3,$line4,$line5,$nor_plan_imp,$nor_act_imp);

		echo json_encode($result);
	}

	// Membuat fungsi delete
	public function deleteDc()
	{	  
		// $id = $this->input->post('deleteDcku');


		$result = $this->Dc_model->deleteDc();
		echo json_encode($result);
	}

	public function getCountAgenda()
	{
		echo json_encode($this->Dc_model->get_count_agenda());
	}

	public function getCountWeekAgenda()
	{
		echo json_encode($this->Dc_model->get_count_week_agenda());
	}
//================================================================Acivity================================================================
	
	public function getActSched()
	{
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
        echo json_encode( $this->Dc_model->get_activity_sched($month,$year));
	}

	public function getActivityMonth()
	{
        echo json_encode( $this->Dc_model->get_activity());
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

		$sql = $this->Dc_model->newactivity($data);

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
		$jml1 = $this->Dc_model->countDate($nor,$no);
		$jml = $jml1[0]['count(ak_act_imp)'];
		$tglact = $this->input->post('ak_act_imp_up');
		$id = $this->input->post('u_id_act');
        $nama_dvs = $this->input->post('nama_dvs_up');
        $nama_act = $this->input->post('nama_act_up');
        $ak_plan_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('ak_plan_imp_up') ) );
		$ta1 = $this->Dc_model->getTanggalAkhir($nor,$no);
		$ta = $ta1[0]['ak_act_imp'];
        if ($tglact == "0000-00-00 00:00:00" || $tglact == "1970-01-01 07:00:00" || $tglact == "NaN/aN/NaN") {
        	$ak_act_imp = "0000-00-00 00:00:00";
        }else{
        	$ak_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('ak_act_imp_up') ) );
			$this->Dc_model->updateNorAct($nor,$no,$ta,$ak_act_imp);
        }
        
		$this->Dc_model->updateStatus($jml,$nor,$no,$ak_act_imp);
		$result = $this->Dc_model->updateActivity($id,$nama_act,$ak_plan_imp,$ak_act_imp,$nama_dvs,$nor,$no);
		echo json_encode($result);		
	}

	// Membuat fungsi create
	public function deleteActivity()
	{	
		$nor = $this->input->post('nor');
        $no = $this->input->post('no');
		$jml1 = $this->Dc_model->countDate($nor,$no);
		$jml = $jml1[0]['count(ak_act_imp)'];
		$ak_act_imp = date( 'Y-m-d H:i:s', strtotime( $this->input->post('act') ) );
		
		$this->Dc_model->updateStatus($jml,$nor,$no,$ak_act_imp);

		$result = $this->Dc_model->deleteActivity();
		echo json_encode($result);
	}

	public function select_no()
	{
		$data['no'] = $this->Dc_model->get_no();
		$this->load->view('agenda/select_no',$data);
	}

	public function select_nor()
	{
		$data['nor'] = $this->Dc_model->get_nor();
		$this->load->view('agenda/select_nor',$data);
	}

	public function select_no2()
	{
		$data['no'] = $this->Dc_model->get_no2();
		$this->load->view('downloadNor/select_no',$data);
	}

	public function select_nor2()
	{
		$data['nor'] = $this->Dc_model->get_nor2();
		$this->load->view('downloadNor/select_nor',$data);
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
 		$data['sch'] = $this->Dc_model->get_dc_sched_user($date,$month,$year);
 		$data['act'] = $this->Dc_model->get_activity_sched_user($date,$month,$year);

		$this->load->view('agenda/Modal_Detail',$data);
	}

	public function listUser()
	{
		$count=$this->Dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		$data['countuserwaiting'] = $count2;
		$this->load->view("agenda/header",$data); 
		$this->load->view("account/listUser");
		$this->load->view("account/footer");
	}

	public function getListUser()
	{
        echo json_encode( $this->Dc_model->getListUser());
	}

	public function updateuser()
	{
		$id=$this->input->post('u_id');
		$name=$this->input->post('u_name');
		$nik=$this->input->post('u_nik');
		$password=$this->input->post('u_password');
		$section=$this->input->post('u_section');
		$jabatan=$this->input->post('u_jabatan');
		$status=$this->input->post('u_status');

		$result = $this->Dc_model->updateUser($id,$name,$nik,$password,$section,$jabatan,$status);
		echo json_encode($result);
	}

	public function deleteUser()
	{	  
		// $id = $this->input->post('deleteDcku');

		$result = $this->Dc_model->deleteUser();
		echo json_encode($result);
	}

	public function listActivity()
	{
		$count=$this->Dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		$data['countuserwaiting'] = $count2;

		$this->load->view("agenda/header",$data); 
		$this->load->view("activity/listActivity");
		$this->load->view("activity/footer");
	}

	public function getListActivity()
	{
        echo json_encode( $this->Dc_model->getListAct());
	}

	public function newmActivity()
	{
		$nama = $this->input->post('nama');
		$result = $this->Dc_model->newMasterAct($nama);

		echo json_encode($result);
	}

	public function updatemActivity()
	{
		$nama = $this->input->post('unama');
		$id = $this->input->post('uid');
		$result = $this->Dc_model->updateMasterAct($id,$nama);

		echo json_encode($result);
	}

	public function deletemActivity()
	{
		$result=$this->Dc_model->deleteMasterAct();
		echo json_encode($result);
	}

	public function confirmActivity()
	{
		$id = $this->input->post('id');
		$nor = $this->input->post('nor');
		$no = $this->input->post('no');

		$jml1 = $this->Dc_model->countDate($nor,$no);
		$ta1 = $this->Dc_model->getTanggalAkhir($nor,$no);
		$jml = $jml1[0]['count(ak_act_imp)'];
		$ta = $ta1[0]['ak_act_imp'];
		
		$this->Dc_model->updateStatus2($jml,$nor,$no);
		$this->Dc_model->updateNorAct2($nor,$no,$ta);
		$result = $this->Dc_model->confirmActivity($id,$nor,$no);

		echo json_encode($result);
	}

	public function downloadformat()
	{
		force_download('Format_NewActivity.xlsx',NULL);
	}

	public function import(){

		if(isset($_FILES["fileku"]["name"])){
			$path = $_FILES["fileku"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
			$objWriter->save('uploadActivity/Activity.xlsx');
			foreach($object->getWorksheetIterator() as $worksheet){
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++){
					$activity = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$section = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$plan = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$plan2 = \PHPExcel_Style_Numberformat::toFormattedString($plan, 'YYYY-MM-DD');
					if ($plan != null) {
						
					$data[] = array(
						'nor'  => $this->input->post('nor_act'),
						'no'   => $this->input->post('no_act'),
						'nama_act'   => $activity,
						'nama_dvs'   => $section,
						'ak_plan_imp'   => $plan2,
						'ak_act_imp'   => "0000-00-00 00:00:00",
					);
					$set = [
							'status' => "On Progress",
						];
						$this->db->where('nor',$this->input->post('nor_act'));
						$this->db->where('no',$this->input->post('no_act'));
						$this->db->update('nor',$set);
					}
				}
			}
			$result=$this->Dc_model->newactivity($data);
			echo json_encode($result);
		}

	}

	public function dataNor()
	{
		$count=$this->Dc_model->countUserWaiting();
		$count2=$count[0]['count(status)'];
		$data['countuserwaiting'] = $count2;
		$data['nor'] = $this->Dc_model->get_nor();
		$data['no'] = $this->Dc_model->get_no();
		$data['id'] = $this->Dc_model->get_id();

		$this->load->view("agenda/header",$data); 
		$this->load->view("downloadNor/dataNor",$data);
		$this->load->view("downloadNor/footer");
	}

	public function previewNor()
	{
		$nor = $this->input->post('nor');
		$no = $this->input->post('no');
		$data=$this->Dc_model->getPreview($nor,$no);
		// $data['norku']=$this->Dc_model->getTopNor();
		echo json_encode($data);
	}

	public function exportNor($nor,$no)
	{
		$fileName = "Format_download_nor";
		// include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
		// include APPPATH . 'third_party/PHPExcel/PHPExcel/IOFactory.php';

		// Read the file
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($fileName.'.xlsx'); 

		// Change the file
		$nor2=str_replace("_", " ", $nor);
		$no2=str_replace("_", " ", $no);
		$no3=str_replace("-", ",", $no2);

		$getnor=$this->Dc_model->getDataNor($nor2,$no3);
    	// var_dump($result);
        $row = 11;
        // $sum = 0;
        $a="";
        $line[]= "";

       	$line[0]=$getnor[0]['line'];
       	$line[1]=$getnor[0]['line2'];
       	$line[2]=$getnor[0]['line3'];
       	$line[3]=$getnor[0]['line4'];
       	$line[4]=$getnor[0]['line5'];
       	for ($b = 0; $b < count($line); $b++) {
       		if ($line[$b] != null) {
       			if ($b>0) {
       				$a+=",".$line[$b];	                        		
       				// print_r($line[$b]);
       				// die();
       			}else{
       				$a=$line[$b];
       			}
       		}

       	}
       	// die();

       	$plan=date('d-m-Y', strtotime($getnor[0]['nor_plan_imp']));
       	$act=date('d-m-Y', strtotime($getnor[0]['nor_act_imp']));
       	$md=date('d-m-Y', strtotime($getnor[0]['meeting_date']));


         $objPHPExcel->getActiveSheet()->setCellValue('C3',$getnor[0]['nor'].'-'.$getnor[0]['no']);
         $objPHPExcel->getActiveSheet()->setCellValue('C4',$md);
         $objPHPExcel->getActiveSheet()->setCellValue('C5',strval($a));
         $objPHPExcel->getActiveSheet()->setCellValue('C6',$getnor[0]['item_changes']);
         $objPHPExcel->getActiveSheet()->setCellValue('C7',$plan);
         $objPHPExcel->getActiveSheet()->setCellValue('C8',$act);

         $styleArray = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		    )
		  )
		);

        $styleFontArray = array(
		    'font'  => array(
		        'bold'  => true,
		        'size'  => 18,
		        'name'  => 'Tahoma'
		    ));

        foreach($getnor as $n){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,strtoupper($n['nama_dvs']));
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n['nama_act']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,date('d-m-Y', strtotime($n['ak_plan_imp'])));
            if ($n['ak_act_imp'] == "0000-00-00 00:00:00") {
            	$objPHPExcel->getActiveSheet()->setCellValue('E'.$row," ");
            }else{
            	$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,date('d-m-Y', strtotime($n['ak_act_imp'])));
            }
            $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':E'.$row)->applyFromArray($styleArray); 
            $objPHPExcel->getActiveSheet()->mergeCells('B'.$row.':C'.$row); 

            // $sum += doubleval($n->amountprice);
            $row++;
            // $no++;
        }

		unset($styleArray);

		$row+=1;
		// $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,'TOTAL');
		// $objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$sum);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':E'.$row)->applyFromArray($styleFontArray);



		// // Write the 

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    	header('Content-Disposition: attachment; filename="'.str_replace('_','-',$getnor[0]['nor'].'-'.$getnor[0]['no']).'.xlsx"'); // Set nama file excel nya
    	header('Cache-Control: max-age=0');
    	ob_end_clean();

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$objWriter->save('php://output');
		}

	public function deleteAll()
	{	  
		$result['nor'] = $this->Dc_model->deleteAll();
		$result['activity'] = $this->Dc_model->deleteAll2();
		echo json_encode($result);
	}
	}

