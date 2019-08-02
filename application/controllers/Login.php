<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Dc_model');
		}

		public function index()
		{
			$this->form_validation->set_rules('nik', 'nik', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('v_login');
			}else {
				$nik = $this->input->post('nik');
				$password = $this->input->post('password');
				// print_r($nik);
				// die();

				$cek = $this->Dc_model->login($nik,$password);
				if ($cek->num_rows() == 1) {

					$value = $cek->row();

					$userdata = array(
						'id_user' => $value->id_user,
						'nik' => $value->nik,
						'name' => $value->name,
						'password' => $value->password,
						'section' => $value->section,
						'jabatan' => $value->jabatan,
						'status' => $value->status,
						'signin' => TRUE
					);
					$this->session->set_userdata($userdata);

					if($value->status == "on"){
						if($value->section=='ppc'){
							redirect('Dc_controller','refresh');
						}else{
							redirect('Section','refresh');
						}
					}else if($value->status == "waiting"){
							$this->session->set_flashdata('waitinglah', 'waiting');
							$this->load->view('v_login');
							// echo "<script>alert('Akun anda belum dikonfirmasi. Silahkan hubungi PPC untuk keterangan lebih lanjut') </script>";
							// redirect('Login','refresh');
					}else{
							$this->session->set_flashdata('offlah', 'off');
							$this->load->view('v_login');
							// echo "<script>alert('Akun anda telah dinonaktifkan') </script>";
							// redirect('Login','refresh');
					}
				} else {
							$this->session->set_flashdata('gagal_login', 'gagal_login');
							$this->load->view('v_login');
					// echo "<script>alert('Informasi Akun yang Anda Masukkan Salah') </script>";
					// redirect('Login','refresh');
				}
			}
			
		}

			/*=========================================================== LOGIN ===========================================================*/

		public function logout()
		{
			$userdata = array('username','status');
			$this->session->unset_userdata($userdata);
			echo "<script>alert('Logout Success') </script>";
			redirect('Login','refresh');
		}

		public function newAccount()
		{
			$data = [];
			$name = $this->input->post('name');
			$nik = $this->input->post('nik');
			$section = $this->input->post('section');
			$jabatan = $this->input->post('jabatan');
			$password = $this->input->post('password');
			$ceknik = $this->Dc_model->getNik($nik);
			if ($ceknik == true) {
				$data =['code' => 2];
				
			}else{
				$data=['result' => $this->Dc_model->register($name,$nik,$section,$jabatan,$password),
						'code' => 1] ;
			}
			echo json_encode($data);
		}
		
	}

		
	
	/* End of file login.php */
	/* Location: ./application/controllers/login.php */

