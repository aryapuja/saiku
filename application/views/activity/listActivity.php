<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
	<div class="container-fluid">
		
		<div class="listview">
			<div style="background-color: #FFF; padding: 5px;">
				<div class="boddy card">
					<center><h4 class="namatitel card-header">List Activity</h4></center>
					<div class="card-body">
						<div class="pull-right"><a href="javascript:void(0);" class="btn btn-success float-right" data-toggle="modal" data-target="#Modal_AddAct"><span class="fa fa-plus"></span> Add</a></div>
						<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="listactivity">
							<thead>
								<tr style="background-color: #E8E8E8;">
									<!-- <th style="width: 5%;">No</th> -->
									<th style="text-align: center;" hidden>Id</th>
									<th style="text-align: center; width: 5%" >No</th>
									<th style="text-align: center; width: 15% ">Nama</th>
									<th style="text-align: center; width: 15%">Action</th>
								</tr>
							</thead>
							<tbody id="tbl_act" style="text-align: center;">

							</tbody> 
						</table>
					</div>
				</div>	
			</div>
		</div>


<!--MODAL NOR Baru-->
<form id="formaddact">
	<div class="modal fade" id="Modal_AddAct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 70%">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">New Activity</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
				</div>
				<div class="modal-body">			   
					<div class="container-fluid">   
						<div class="row">        
							<div class="form-group col-lg-12 row">
									<label>Nama Activity</label>
									<input type="text" id="namaAct" class="form-control" placeholder="Masukkan Activity" style="width: 100%" required>
							</div>
							<!--  -->
							<div class="modal-footer">
								<!-- inputan button simpan dan Cancel -->
								<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
								<button type="submit" id="btn_push" class="btn btn-primary ">Tambah</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
		

<!--MODAL NOR START UPDATEE UPDATEEE-->
<form id="formupdatelistAct">
	<div class="modal fade" id="Modal_UpdatelistAct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 70%">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update List Activity</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
				</div>
				<div class="modal-body">			   
					<div class="container-fluid">   
						<div class="row">        
							<div class="form-group col-lg-12 row">
									<label>Nama Activity</label>
									<input type="text" id="u_namaact" name="u_namaact" class="form-control" placeholder="Masukkan Activity" style="width: 100%" required>
							</div>
							<!--  -->
							<div class="modal-footer">
								<!-- inputan button simpan dan Cancel -->
								<input type="hidden" id="u_id" name="u_id" value="">
								<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
								<button type="submit" id="btn_push" class="btn btn-primary ">Simpan</button>
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
<form id="formdeleteact">
	<div class="modal fade" id="Modal_Deletelistact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete List Activity</h4>
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