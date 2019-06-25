<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
	<br>
	<div class="container-fluid row">
		<!-- view tabel Calendar -->
		<div class="calendaragenda">
			<div style="background-color: #FFF; padding: 5px; height: 100%">

				<div class="boddy card">
					<center><h4 class="namatitel card-header">KALENDER KEGIATAN</h4></center>
					<div class="card-body">
						<div class="row card-title">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<button class="btn btn-outline-primary col-md-12" id="previous"><font style="margin-left: -8px;">Previous</font></button>	
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<h5 style="text-align: center;" id="thismonth"></h5>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<button class="btn btn-outline-primary col-md-12" id="next">Next</button>	
							</div>
						</div>

						<center>
							<table class="table table-bordered table-responsive-lg" id="calendar">
								<thead>
									<tr>
										<th>Sun</th>
										<th>Mon</th>
										<th>Tue</th>
										<th>Wed</th>
										<th>Thur</th>
										<th>Fri</th>
										<th>Sat</th>
									</tr>
								</thead>
								<tbody id="calendarbody"> </tbody>
							</table>
						</center>
					</div>
				</div>

			</div>
		</div>

		<!-- view tabel agenda -->
		<div class="agendaview">
			<div style="background-color: #FFF; padding: 5px;">
				<div class="boddy card">
					<center><h4 class="namatitel card-header">NOR SCHEDULE</h4></center>
					<div class="card-body">
						<div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Schedule</a></div>
						<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall">
							<thead>
								<tr style="background-color: #E8E8E8;">
									<!-- <th style="width: 5%;">No</th> -->
									<th style="text-align: center;" hidden>Id</th>
									<th style="text-align: center; width: 15% ">Nor-No</th>
									<!-- <th style="text-align: center; width: 5%">Rev</th> -->
									<th style="text-align: center; width: 50%">Item Changes</th>
									<th style="text-align: center; width: 10%">Line</th>
									<th style="text-align: center; width: 10%">Date Plan</th>
									<th style="text-align: center; width: 15%">Action</th>
								</tr>
							</thead>
							<tbody id="tbl_agendakegiatan" style="text-align: center;">

							</tbody> 
						</table>
					</div>
				</div>	
			</div>
		</div>
		

	<div class="minipengumuman" style="border: 2px; padding-top: 20px; width: 100%">
		<div class="boddy card" style="width: 100%">
			<center><h4 class="namatitel card-header">ACTIVITY SCHEDULE</h4></center>
			<div class="card-body">
				<div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add2"><span class="fa fa-plus"></span> Add Activity</a></div>
				<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall2">
					<thead>
						<tr style="background-color: #E8E8E8;">
							<!-- <th style="width: 5%;">No</th> -->
							<th style="text-align: center;" hidden>Id</th>
							<th style="text-align: center; width: 10%">Nor-No</th>
							<th style="text-align: center; width: 5%">Divisi</th>
							<th style="text-align: center; width: 60%">Activity</th>
							<th style="text-align: center; width: 5%">Plan Date</th>
							<th style="text-align: center; width: 5%">Actual Date</th>
							<th style="text-align: center; width: 15%">Action</th>
						</tr>
					</thead>
					<tbody id="tbl_agendaactivity" style="text-align: center;">

					</tbody> 
				</table>
			</div>
		</div>	
	</div>

	</div>  
	<!-- end container  -->

	<!--MODAL NOR Baru-->
	<form id="formbaru">
		<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 70%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Schedule</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			   
						<div class="container-fluid">   
							<div class="row">        
								<!-- form inputan nama kegiatan -->
								<div class="form-group col-lg-12 row">
									<div class="col-4">
										<label>Nor</label>
										<input type="text" id="nor" class="form-control" placeholder="Masukkan Nor" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>No</label>
										<input type="text" id="no" class="form-control" placeholder="Masukkan No" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Line</label>
										<input type="text" id="line" class="form-control" placeholder="Masukkan Line" required>
									</div>
								</div>
								<div class="form-group col-lg-12 row">
									<div class="col-6">
										<label>Item Changes</label>
										<textarea type="text" id="item_changes" class="form-control" rows="4" placeholder="Masukkan item Changes"  required></textarea>
									</div>
									<div class="col-6">
										<label for="#">Implemented Plan </label>
										<div class="input-daterange input-group" id="datepickers">
											<input  class="form-control" name="date_plan" id="date_plan" placeholder="Date (Plan)" required/>
										</div>
									</div>

								</div>
								<!--  -->
								<div class="modal-footer">
									<!-- inputan button simpan dan batal -->
									<button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
									<button type="submit" id="btn_push" class="btn btn-primary ">Tambah</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--END MODAL NOR baru-->

	<!--MODAL NOR START UPDATEEE UPDATEEE-->
	<form id="formupdate">
		<div class="modal fade" id="Modal_Update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 70%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Schedule</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			   
						<div class="container-fluid">   
							<div class="row">        
								<!-- form inputan nama kegiatan -->
								<div class="form-group col-lg-12 row">
									<div class="col-4">
										<label>Nor: </label>
										<input type="text" id="u_nor" name="u_nor" class="form-control" placeholder="Masukkan Nor" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>No: </label>
										<input type="text" id="u_no" name="u_no" class="form-control" placeholder="Masukkan No" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Line: </label>
										<input type="text" id="u_line" name="u_line" class="form-control" placeholder="Masukkan Line" required>
									</div>
								</div>
								<div class="form-group col-lg-12 row">
									<div class="col-6">
										<label>Item Changes: </label>
										<textarea type="text" id="u_item_changes" name="u_item_changes" class="form-control" rows="4" placeholder="Masukkan item Changes"  required></textarea>
									</div>
									<div class="col-6">
										<label for="#">Implemented Plan: </label>
										<div class="input-daterange input-group">
											<input  class="form-control datepicker" name="u_date_plan" id="u_date_plan" placeholder="Date (Plan)" required/>
										</div>
									</div>

								</div>
								<!--  -->
								<div class="modal-footer">
									<!-- inputan button simpan dan batal -->
									<input type="hidden" id="u_id" name="u_id" value="">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
									<button type="submit" id="btn_update" class="btn btn-primary">Update</button>
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
	<form id="formdelete">
		<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Delete Schedule</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			              

						<div class="form-group col-lg-12">
							<label>Apa Anda Yakin Ingin Meng<font style="color: red;"><b>Hapus</b></font> ini?</label>
							<br><br>
							<center><H4 id="msg"></H4></center>
							<input type="hidden" name="deleteDcku" id="deleteDcku" class="form-control">

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
	<!--END MODAL NOR Delete-->

	<!--MODAL Activity Baru-->
	<form id="formbaru2">
		<div class="modal fade" id="Modal_Add2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 70%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Activity</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			   
						<div class="container-fluid">   
							<div class="row">        
								<!-- form inputan nama kegiatan -->
								<div class="form-group col-lg-12 row">

									<div class="form-group col-lg-2">
										<label>Nomor Nor</label>
										<select class="form-control" id="slct_nor" name="nor[]" required="">
											<option disabled selected hidden> Pilih Nomor Nor</option>
											<?php foreach ($nor as $key) { ?>
											<option value="<?php  echo $key->nor ?>"> <?php  echo $key->nor ?> </option>
											<?php }  ?>
										</select>
									</div>

									<div class="form-group col-lg-2">
										<label>Nomor No</label>
										<select class="form-control" id="slct_no" name="no[]" required="">
											<option disabled selected hidden> Pilih Nomor No</option>
											<?php foreach ($nor as $key) { ?>
											<option value="<?php  echo $key->no ?>"> <?php  echo $key->no ?> </option>
											<?php }  ?>
										</select>
									</div>
									
									<div class="col-2">
										<label>Divisi</label>
										<div class="form-group">
							                <select class="form-control" name="nama_dvs[]">
							                  <option disabled selected hidden>Pilih Divisi</option>
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

									<div class="col-2">
										<label>Activity</label>
										<input type="text" id="activity" name="activity[]" class="form-control" placeholder="Masukkan Activity" required></input>
									</div>

									<div class="col-2">
										<label for="#">Implemented Date Plan</label>
										<div class="input-daterange input-group">
											<input  class="form-control datepickers" name="date_plan[]" id="date_plan" placeholder="Date (Plan)" required/>
										</div>
									</div>

									<div class="col-2">
										<label for="#">Implemented Date Act</label>
										<div class="input-daterange input-group">
											<input  class="form-control datepickers" name="date_actual[]" id="date_actual" placeholder="Date (Actual)" required/>
										</div>
									</div>

								</div>
								<!--  -->
								<div class="modal-footer">
									<!-- inputan button simpan dan batal -->
									<button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
									<button type="submit" id="btn_push" class="btn btn-primary ">Tambah</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--END MODAL Activity baru-->

	<script type="text/javascript">
	 $(function(){
	  $(".datepicker").datepicker({
	  	// var tgl_ahir = tgl_b.getDate()+"/"+(parseInt(tgl_b.getMonth(), 10)+1)+"/"+tgl_b.getFullYear();
	   //    format: ,
	      autoclose: true,
	      todayHighlight: true,
	  });
	 });
	</script>

</main>