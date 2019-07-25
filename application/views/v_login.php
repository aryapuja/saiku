<!DOCTYPE html>
<html lang="en">
<head>
	<title>PT. SAI: PPC SECTION</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url()?>assets/logoaja2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/main.css">

<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action="<?php echo base_url().'index.php/login'?>" method='post'>
					<span class="login100-form-title p-b-33">
						<img class ="navbar-brand" src="<?=base_url()?>assets/logoaja.png" style="width: 100%; height: auto;" >
					</span>
					<span class="login100-form-title p-b-33">
						CONTROL SCHEDULING DESIGN CHANGE ACTIVITY
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan Nik">
						<input class="input100" type="text" name="nik" placeholder="nik">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Masukkan Password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn mt-md-1">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>
				</form>
				<div class=" row">
					<div class="col-6" style="padding-right: 1px">
					<div class="container-login100-form-btn mt-md-1">
						<a href="javascript:void(0);" class="login100-form-btn-link" data-toggle="modal" data-target="#Modal_register"> <button class="login100-form-btn-link">
							Sign Up
						</button></a>
					</div>
					</div>
					<div class="col-6" style="padding-left: 1px">
					<div class="container-login100-form-btn mt-md-1">
						<a href="<?php echo base_url().'index.php/user'?>" class="login100-form-btn-link"> <button class="login100-form-btn-link">
							Lihat Jadwal
					</button> </a>
					</div>
					</div>
				</div>
			</div>
					
			</div>
		</div>
	</div>
	<form id="formregister">
		<div class="modal fade" id="Modal_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Register Account</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			   
						<div class="container-fluid">   
							<div class="row">        
								<!-- form inputan nama kegiatan -->
								<div class="form-group col-lg-12 ">
									<div class="col-lg-12">
										<label>Nama</label>
										<input type="text" id="name" class="form-control" placeholder="Masukkan nama" style="width: 100%" required>
									</div>
									<div class="col-lg-12">
										<label>NIK</label>
										<input type="text" id="nik" class="form-control" placeholder="Masukkan nik" style="width: 100%" required>
									</div>
									<div class="col-lg-12">
										<label>Section</label>
											<select class="form-control" name="section" id="section">
								                 <option disabled selected hidden>Pilih Section</option>
								                 <option value="de">de</option>
								                 <option value="pp">pp</option>
								                 <option value="qp">qp</option>
								                 <option value="qmp">qmp</option>
								                 <option value="eng">eng</option>
								                 <option value="nys">nys</option>
								                 <option value="prod">prod</option>
								                 <option value="ppc">ppc</option>
							               </select>
									</div>
								</div>
								<div class="form-group col-lg-12">
									<div class="col-lg-12">
										<label>Jabatan</label>
										<input type="text" id="jabatan" class="form-control" placeholder="Masukkan jabatan" style="width: 100%">
										</textarea>
									</div>
									<div class="col-lg-12">
										<label for="#">Password </label>
										<input type="password" id="password" class="form-control" placeholder="Masukkan password" style="width: 100%" required>
									</div>

								</div>
								<!--  -->
								<div class="modal-footer">
									<!-- inputan button simpan dan Cancel -->
									<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
									<button type="submit" id="btn_push" class="btn btn-primary ">Register</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/js/main.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 
	<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/js/sweetalert2@8.js"></script>
	<script type="text/javascript">
		//   ========================  Start ADD RECORD ====================================
	        //Save kegiatan baru
	        $('#formregister').submit(function(e){
	        	        e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var name 			= $('#name').val();
        		var nik 			= $('#nik').val();
        		var section 		= $('#section').val();
        		var jabatan 		= $('#jabatan').val();
        		var password 		= $('#password').val();

        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Login/newAccount",
        			dataType : "JSON",
        			data : {
        				name:name,
        				nik:nik,
        				section:section,
        				jabatan:jabatan,
        				password:password,
        				
        			},

        			success: function(){ 
        				Swal.fire({
        					type: 'success',
        					title: 'Berhasil register. Silahkan tunggu konfirmasi admin PPC ',
        					showConfirmButton: false,
        					timer: 2000
        				})
        				$('#Modal_register').modal('hide'); 
                        // method clear form & calendar agenda
 						document.getElementById('formregister').reset();
                        
                    }
                });

        		return false;
        	});
//   ========================  END ADD RECORD ====================================
	</script>
</body>
</html>