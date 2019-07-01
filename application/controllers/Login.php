<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('dc_model');
		}

		public function index()
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('v_login');
			}else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$cek = $this->dc_model->login($username,$password);

				if ($cek->num_rows() == 1) {

					$value = $cek->row();

					$userdata = array(
						'id_user' => $value->id_user,
						'username' => $value->username,
						'password' => $value->password,
						'section' => $value->section,
						'status' => TRUE
					);
					$this->session->set_userdata($userdata);
					// $this->session->set_flashdata('user_loggedin', 'You are now logged in');
					redirect('dc_controller','refresh');

				} else {
					echo "<script>alert('Informasi Akun yang Anda Masukkan Salah') </script>";
					redirect('login','refresh');
				}
			}
			
		}

			/*=========================================================== LOGIN ===========================================================*/

		public function logout()
		{
			$userdata = array('username','status');
			$this->session->unset_userdata($userdata);
			echo "<script>alert('Logout Success') </script>";
			redirect('login','refresh');
		}
		
		}
	
	/* End of file login.php */
	/* Location: ./application/controllers/login.php */

?>