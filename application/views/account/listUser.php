<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
	<div class="container-fluid">
		
		<div class="listview">
			<div style="background-color: #FFF; padding: 5px;">
				<div class="boddy card">
					<center><h4 class="namatitel card-header">List User</h4></center>
					<div class="card-body">
						<!-- <div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Schedule</a></div> -->
						<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="listuser">
							<thead>
								<tr style="background-color: #E8E8E8;">
									<!-- <th style="width: 5%;">No</th> -->
									<th style="text-align: center; width: 5%" >No</th>
									<th style="text-align: center; width: 15% ">Nama</th>
									<th style="text-align: center; width: 15%">NIK</th>
									<th style="text-align: center; width: 15%">Section</th>
									<th style="text-align: center; width: 15%">Jabatan</th>
									<th style="text-align: center; width: 15%">Status</th>
									<th style="text-align: center; width: 15%">Action</th>
								</tr>
							</thead>
							<tbody id="tbl_user" style="text-align: center;">

							</tbody> 
						</table>
					</div>
				</div>	
			</div>
		</div>
		
		

<!--MODAL NOR START UPDATEEE UPDATEEE-->
<form id="formupdatelistuser">
	<div class="modal fade" id="Modal_Updatelist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 70%">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
				</div>
				<div class="modal-body">			   
					<div class="container-fluid">   
						<div class="row">        
							<!-- form inputan nama kegiatan -->
							<div class="form-group col-lg-12 row">
								<div class="col-4">
									<label>Nama: </label>
									<input type="text" id="u_name" name="u_name" class="form-control" placeholder="Masukkan Nama" style="width: 100%" required >
								</div>
								<div class="col-4">
									<label>NIK: </label>
									<input type="text" id="u_nik" name="u_nik" class="form-control" placeholder="Masukkan nik" style="width: 100%" required >
								</div>
								<div class="col-4">
									<label>Section: </label>
									<select class="form-control" name="u_section" id="u_section">
								                 <option disabled selected hidden>Pilih Section</option>
								                 <option value="de">DE</option>
								                 <option value="pp">PP</option>
								                 <option value="qp">QP</option>
								                 <option value="qmp">QMP</option>
								                 <option value="eng">ENGINEERING</option>
								                 <option value="nys">NYS</option>
								                 <option value="prod">PROD</option>
								                 <option value="ppc">PPC</option>
								                 <option value="ppc">IC</option>
								                 <option value="ppc">WHS</option>
								                 <option value="ppc">EXIM</option>
								                 <option value="ppc">FA</option>
							               </select> 
								</div>
							</div>
							<div class="form-group col-lg-12 row">
								<div class="col-4">
									<label>Jabatan: </label>
									<input type="text" id="u_jabatan" name="u_jabatan" class="form-control" placeholder="Masukkan jabatan"  > 
								</div>
								<div class="col-4">
									<label>Password: </label>
										<input type="password" id="u_password" name="u_password" class="form-control" placeholder="Masukkan Password" required><span class="glyphicon glyphicon-eye-open"></span>
								</div>
								<div class="col-4">
									
									<label for="#">Status </label>
											<select class="form-control" name="u_status" id="u_status">
								                 <option selected hidden>Pilih Status</option>
								                 <option value="on">on</option>
								                 <option value="off">off</option>
								        	</select>
									
								</div>

							</div>
							<!--  -->
							<div class="modal-footer">
								<!-- inputan button simpan dan batal -->
								<input type="hidden" id="u_id" name="u_id" value="">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button type="submit" id="btn_update" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END NOR UPDATEEE UPDATEEE-->

<!--MODAL NOR Delete-->
<form id="formdeleteuser">
	<div class="modal fade" id="Modal_Deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
				</div>
				<div class="modal-body">			              

					<div class="form-group col-lg-12">
						<label>Apa Anda Yakin Ingin Meng<font style="color: red;"><b>Hapus</b></font>akun ini?</label>
						<br><br>
						<center><H5 id="msg"></H5></center>
						<input type="hidden" name="id_del" id="id_del" class="form-control">

					</div>
					<br />
					<center>
						<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal" style="margin-right: 20px">Batal</button>
						<button type="submit" id="btn_delete" class="btn btn-danger col-md-3">Hapus</button>	
					</center>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>
</form>
	

<!--END MODAL NOR Delete -->
</main>