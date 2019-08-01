<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->

<div class="container-fluid row">
	<!-- view tabel Calendar -->
	<nav class="navbar navbar-default navbar-fixed-bottom footer" style="background-color: transparent;" role="navigation">
		<div class="container-fluid">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<button type="button" class="btn btn-primary btn-lg disabled" id="time"></button>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div class="runtext-container">
					<div class="main-runtext">
						<marquee direction="" onmouseover="this.stop();"onmouseout="this.start();">
							<div class="text-container"> 
							</div>
						</marquee>
					</div>
				</div>
			</div> 
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
				<button type="button" class="btn btn-primary btn-lg disabled" style="align-items: center;"> 
					<?php
					date_default_timezone_set("Asia/Jakarta");
					echo " " . date("d:M:Y");
					?>
				</button>
			</div>
		</div>	
	</nav>
	<div class="calendaragenda">
		<div style="background-color: #FFF; padding: 0px; height: 100%">

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
						<div class="row" align="left">

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<img src="#" width="10px">&nbsp Tidak Ada Nor<br>
								<img src="<?=base_url()?>assets/image/1.png" width="10px">&nbsp Ada 1 Nor<br>
								<img src="<?=base_url()?>assets/image/2.png" width="10px">&nbsp Ada 2 Nor<br>
								<img src="<?=base_url()?>assets/image/6.png" width="10px">&nbsp Activity Close<br>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<img src="<?=base_url()?>assets/image/3.png" width="10px">&nbsp Ada 3 Nor<br>
								<img src="<?=base_url()?>assets/image/4.png" width="10px">&nbsp Ada 4 Nor<br>
								<img src="<?=base_url()?>assets/image/5.png" width="10px">&nbsp Ada >=5 Nor<br>
								<img src="<?=base_url()?>assets/image/7.png" width="10px">&nbsp Activity Open<br>
							</div>
						</div>
					</center>
				</div>
			</div>

		</div>
	</div>

	<!-- view tabel agenda -->
	<div class="agendaview">
		<div style="background-color: #FFF; padding-right: 0px;">
			<div class="boddy card">
				<center><h5 class="namatitel card-header">NOR SCHEDULE</h5></center>
				<div class="card-body">
					<div class="pull-right"><a href="javascript:void(0);" class="btn btn-success float-right" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Schedule</a></div>
					
					<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall">
						<thead>
							<tr style="background-color: #E8E8E8;">
								<!-- <th style="width: 5%;">No</th> -->
								<th style="text-align: center;" hidden>Id</th>
								<th style="text-align: center; width: 20% ">Nor-No</th>
								<th style="text-align: center; width: 30%">Item Changes</th>
								<th style="text-align: center; width: 10%">Line</th>
								<th style="text-align: center; width: 5%">Plan Implementation</th>
								<th style="text-align: center; width: 5%">Act. Implementation</th>
								<th style="text-align: center; width: 10%">Status</th>
								<th style="text-align: center; width: 20%">Action</th>
							</tr>
						</thead>
						<tbody id="tbl_agendakegiatan" style="text-align: center;">

						</tbody> 
					</table>
				</div>
			</div>	
		</div>
	</div>
	
	<div class="minipengumuman" style="border: 2px; padding-right: 0px; padding-top: 5px; width: 100%">
		<div class="boddy card" style="width: 100%">
			<center><h5 class="namatitel card-header">ACTIVITY SCHEDULE</h5></center>
			<div class="card-body">
				<div class="pull-right">
					
				
				<div class="btn-group float-right">
						<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="fa fa-plus"></span> Add Activity
						</button>
						<div class="dropdown-menu">
							<a href="javascript:void(0);" class="dropdown-item" data-toggle="modal" data-target="#Modal_Import">Import</a>
							<a href="javascript:void(0);" class="dropdown-item" data-toggle="modal" data-target="#Modal_Add2">Add</a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall2">
					<thead>
						<tr style="background-color: #E8E8E8;">
							<!-- <th style="width: 5%;">No</th> -->
							<th style="text-align: center;" hidden>Id</th>
							<th style="text-align: center; width: 10%">Nor-No</th>
							<th style="text-align: center; width: 5%">Section</th>
							<th style="text-align: center; width: 35%">Activity</th>
							<th style="text-align: center; width: 15%">Plan Implementation</th>
							<th style="text-align: center; width: 5%">Status</th>
							<th style="text-align: center; width: 15%">Actual Implementation</th>
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
									<label for="#">Plan Implementation </label>
									<div class="input-daterange input-group" id="datepickers">
										<input  class="form-control" name="nor_plan_imp" id="nor_plan_imp" placeholder="DD. (Plan)" required autocomplete="off" />
									</div>
								</div>
							</div>
							<div class="form-group col-lg-12 row">
								<div class="col-4">
									<label>Item Changes</label>
									<textarea type="text" id="item_changes" class="form-control" rows="4" placeholder="Masukkan item Changes"  required></textarea>
								</div>
								<div class="col-8 row">
									<div class="col-lg-2 pr-1 pl-1">
									<label>Line1</label>
									<input type="text" id="line1" class="form-control" placeholder="Line1" required>
									</div>
									<div class="col-lg-2 pr-1 pl-1">
									<label>Line2</label>
									<input type="text" id="line2" class="form-control" placeholder="Line2">
									</div>
									<div class="col-lg-2 pr-1 pl-1">
									<label>Line3</label>
									<input type="text" id="line3" class="form-control" placeholder="Line3">
									</div>
									<div class="col-lg-2 pr-1 pl-1">
									<label>Line4</label>
									<input type="text" id="line4" class="form-control" placeholder="Line4">
									</div>
									<div class="col-lg-2 pr-1 pl-1">
									<label>Line5</label>
									<input type="text" id="line5" class="form-control" placeholder="Line5">
									</div>
								</div>

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

<!--END MODAL NOR baru-->

<!--MODAL NOR START UPDATEEE UPDATEEE-->
<form id="formupdate">
	<div class="modal fade" id="Modal_Update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 70%">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Schedule</h4>
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
									<label>Line 1: </label>
									<input type="text" id="u_line1" name="u_line1" class="form-control" placeholder="Line 1" required>
								</div>
							</div>
								<div class="form-group col-lg-12 row">
								<div class="col-3">
									<label>Line 2: </label>
									<input type="text" id="u_line2" name="u_line2" class="form-control" placeholder="Line 2">
								</div>
								<div class="col-3">
									<label>Line 3: </label>
									<input type="text" id="u_line3" name="u_line3" class="form-control" placeholder="Line 3">
								</div>
								<div class="col-3">
									<label>Line 4: </label>
									<input type="text" id="u_line4" name="u_line4" class="form-control" placeholder="Line 4">
								</div>
								<div class="col-3">
									<label>Line 5: </label>
									<input type="text" id="u_line5" name="u_line5" class="form-control" placeholder="Line 5">
								</div>
							</div>
							<div class="form-group col-lg-12 row">
								<div class="col-6">
									<label>Item Changes: </label>
									<textarea type="text" id="u_item_changes" name="u_item_changes" class="form-control" rows="4" placeholder="Masukkan item Changes"  required></textarea>
								</div>
								<div class="col-6">
									<label for="#">Plan Implementation: </label>
									<div class="input-daterange input-group">
										<input  class="form-control datepicker" name="u_nor_plan_imp" id="u_nor_plan_imp" placeholder="DD. (Plan)" required autocomplete="off" />
									</div>
									<label for="#">Actual Implementation: </label>
									<div class="input-daterange input-group">
										<input  class="form-control datepicker" name="u_nor_act_imp" id="u_nor_act_imp" placeholder="DD. (Actual)" autocomplete="off" />
									</div>
								</div>

							</div>
							<!--  -->
							<div class="modal-footer">
								<!-- inputan button simpan dan Cancel -->
								<input type="hidden" id="u_id" name="u_id" value="">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
						<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal" style="margin-right: 20px">Cancel</button>
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

<div class="modal fade" id="Modal_Detail2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-width: 70%">
		<div class="modal-content">
		</div>
	</div>
</div>
</div>
</div>

<!--========================================================== ACTIVITY ========================================================== -->

<!--MODAL Activity Create -->
<div class="form-group">  
	<form name="add_activity" id="add_activity">
		<div class="modal fade" id="Modal_Add2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 80%;overflow-y: initial !important">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Activity</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>

					<div class="modal-body" id="mdl_bdy" style="max-height: calc(100vh - 200px);overflow-y: auto;">
						<div class="container-fluid scroll">
							<div class="row input-header" id="row1">
								<div class="col-md-2">
									<label>Nor</label>
									<select class="form-control slct_nor" id="slct_nor" name="nor_act[]" required="" onchange="change_second($(this).val(),$(this).parents('.row').attr('id'))">
										<option disabled selected hidden> Pilih Nomor Nor</option>
										
									</select>
								</div>  
								<div class="col-md-2">
									<label>No</label>
									<select class="form-control slct_no" id="slct_no" name="no_act[]" required="">
										<option disabled selected hidden class="nomor-not"> Pilih Nomor No</option>
										<?php foreach ($no as $key) { ?>
											<option value="<?php echo $key->no ?>" class="nomor-nor-<?php echo $key->nor ?>"> <?php  echo $key->no ?> </option>
										<?php }  ?>
									</select>
								</div>  
								<div class="col-md-2">
									<label>Section</label>
									<select class="form-control" name="nama_dvs[]" id="nama_dvs">
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
								<div class="col-md-3">
									<label>Activity</label>
									<input type="text" id="nama_act" name="nama_act[]" class="form-control" placeholder="Masukkan Activity" list="data" required autocomplete="off" />
									<datalist id="data">
										<?php foreach ($this->db->get('mactivity')->result() as $key => $value) : ?>
										 <option value="<?= $value->namaActivity ?>" data-json='<?php echo json_encode($value) ?>'><?= $value->namaActivity ?>	 	
										 </option>
									<?php endforeach; ?>
									</datalist>
								</div>  
								<div class="col-md-2">
									<label>Plan Implementation</label>
									<input class="form-control datepicker" name="ak_plan_imp[]" id="ak_plan_imp" placeholder="Date (Plan)" required autocomplete="off"/>
								</div>  
								<div class="col-md-1">
									<label for="hapus">Hapus Form</label><br/>
									<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" disabled> X </button> </div>
								</div>

								<div class="input-field">
									
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary"  name="add" id="add">Tambah Data Form</button>
							<button type="submit" id="submit" class="btn btn-success ">Input Data</button>
						</div>
					</div>
				</div>
			</div>
		</form>  
	</div>

	<form id="formimportAct" enctype="multipart/form-data">
	<div class="modal fade" id="Modal_Import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Import Activity From Excel</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
				</div>
				<div class="modal-body">			   
					<div class="container-fluid">   
						<div class="row">        
							<!-- form inputan nama kegiatan -->
							<div class="form-group col-lg-12 row" id="row1">
								<div class="col-md-6">
									<label>Nor</label>
									<select class="form-control slct_nor" id="slct_nor" name="nor_act" required="" onchange="change_second2($(this).val(),this)">
										<option disabled selected hidden> Pilih Nor</option>
										
									</select>
								</div>  
								<div class="col-md-6">
									<label>No</label>
									<select class="form-control slct_no" id="slct_no" name="no_act" required="">
										<option disabled selected hidden class="nomor-not"> Pilih No</option>
										<?php foreach ($no as $key) { ?>
											<option value="<?php echo $key->no ?>" class="nomor-nor-<?php echo $key->nor ?>"> <?php  echo $key->no ?> </option>
										<?php }  ?>
									</select>
								</div>
							</div>
							<div class="form-group col-lg-12 row">
								<div class="col-12">
									<label>Upload File</label>
									<input type="file" name="fileku" id="fileku" class="form-control dropify" data-height="100" required>
									<!-- <br>
									<div class="progress">
										<div id="myBar" class="success" style="height:24px;width:0"></div>
									</div> -->
								</div>
							</div>
							

							<!-- <div class="form-group col-lg-12 row progress">
 				                 <div class=" progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
 				                 	<span id="status"></span>
                  				</div>
                  			</div> -->
						</div>
							<!--  -->
							<div class="modal-footer">
								<!-- inputan button simpan dan Cancel -->
								<a href="<?php echo base_url().'index.php/Dc_controller/downloadformat' ?>" title="Download Format" class="btn btn-success float-left"><span class="fa fa-download"></span> Format</a>
								<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
								<button type="submit" id="btn_push" class="btn btn-primary bd-toogle-animated-progress" onclick="move()">Tambah</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
	<!--END MODAL Activity baru-->
	
	<!-- Update Modal Activity -->
	<div class="form-group">  
		<form name="update_activity" id="update_activity">
			<div class="modal fade" id="Modal_Update2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
				<div class="modal-dialog" role="document" style="max-width: 80%;overflow-y: initial !important">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Update Activity</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
						</div>

						<div class="modal-body" id="mdl_bdy" style="max-height: calc(100vh - 200px);overflow-y: auto;">
							<div class="container-fluid scroll">  
								<div class="table-responsive">  
									<table class="table table-bordered" id="dynamic_field">  
										<tr>
											<td>
												<label>Nor</label>
												<input type="text" id="slct_nor_up" name="nor_act_up" class="form-control" placeholder="Masukkan Activity" required readonly />
											</td>
											<td>
												<label>No</label>
												<input type="text" id="slct_no_up" name="no_act_up" class="form-control" placeholder="Masukkan Activity" required readonly />

											</td>
											<td> <label>Section</label>
												<select class="form-control" name="nama_dvs_up" id="nama_dvs_up">
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
											</td>
											<td> <label>Activity</label>
												<input type="text" id="nama_act_up" name="nama_act_up" class="form-control" placeholder="Masukkan Activity" required />
											</td>
											<td><label>Plan Implementation</label>
												<input class="form-control datepicker" name="ak_plan_imp_up" id="ak_plan_imp_up" placeholder="Date (Plan)" required autocomplete="off"/>
											</td>
											<td> <label>Actual Implementation</label>
												<input  class="form-control datepicker" name="ak_act_imp_up" id="ak_act_imp_up" placeholder="Date (Actual)" autocomplete="off"/>
											</td>
										</tr>  
									</table>  
									<!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" id="u_id_act" name="u_id_act" value="">
							<input type="hidden" id="status_up" name="status_up" value="">
							<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
							<button type="submit" id="submit" class="btn btn-success ">Update Data Activity</button>
						</div>
					</div>
				</div>
			</div>
		</form>  
	</div>

	<!-- Update Modal Activity confirm -->
	<div class="form-group">  
		<form name="confirmation" id="confirmation">
			<div class="modal fade" id="Modal_UpdateStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
				<div class="modal-dialog" role="document" style="max-width: 80%;overflow-y: initial !important">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Confirmation Activity</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
						</div>

						<div class="modal-body" id="mdl_bdy" style="max-height: calc(100vh - 200px);overflow-y: auto;">
							<div class="container-fluid scroll">  
								<div class="table-responsive">  
									<table class="table table-bordered" id="dynamic_field">  
										<tr>
											<td>
												<label>Nor</label>
												<input type="text" id="slct_nor_c" name="nor_act_c" class="form-control" placeholder="Masukkan Activity" required readonly />
											</td>
											<td>
												<label>No</label>
												<input type="text" id="slct_no_c" name="no_act_c" class="form-control" placeholder="Masukkan Activity" required readonly />

											</td>
											<td> <label>Section</label>
												<select class="form-control" name="nama_dvs_c" id="nama_dvs_c" readonly>
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
											</td>
											<td> <label>Activity</label>
												<input type="text" id="nama_act_c" name="nama_act_c" class="form-control" placeholder="Masukkan Activity" required readonly />
											</td>
											<td><label>Plan Implementation</label>
												<input class="form-control datepicker" name="ak_plan_imp_c" id="ak_plan_imp_c" placeholder="Date (Plan)" required readonly/>
											</td>
											<td> <label>Actual Implementation</label>
												<input  class="form-control datepicker" name="ak_act_imp_c" id="ak_act_imp_c" placeholder="Date (Actual)" autocomplete="off"/>
											</td>
										</tr>  
									</table>  
									<!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" id="c_id_act" name="c_id_act" value="">
							<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
							<button type="submit" id="submit" class="btn btn-success ">Confirm</button>
						</div>
					</div>
				</div>
			</div>
		</form>  
	</div>

	<!--MODAL Activity Delete-->
	<form id="formdelete2">
		<div class="modal fade" id="Modal_Delete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Delete Activity</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			              

						<div class="form-group col-lg-12">
							<label>Apa Anda Yakin Ingin MengHapus Activity : </label>
							<center><H4 id="msg2"></H4></center>
							<label><font size="6"> dari nor-no : <b id="msg3"></b> ? </font></label>
							
							<input type="hidden" name="deleteActku" id="deleteActku" class="form-control">
							<input type="hidden" name="norku" id="norku" class="form-control">
						<input type="hidden" name="noku" id="noku" class="form-control">
						<input type="hidden" name="actku" id="actku" class="form-control">

						</div>

						<br />
						<center>
							<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal" style="margin-right: 20px">Cancel</button>
							<button type="submit" id="btn_delete2" class="btn btn-danger col-md-3">Hapus</button>	
						</center>
					</div>
					<div class="modal-footer">

					</div>
				</div>
			</div>
		</div>
	</form>
	<!--END MODAL NOR Delete-->

	<div id="input-container" style="display: none;">
		<div class="row input-header" id="rows" style="margin-top: 1rem">
			<div class="col-md-2">
				<select class="form-control slct_nor" id="slct_nor" name="nor_act[]" required="" onchange="change_second($(this).val(),$(this).parents('.row').attr('id'))">
					<option disabled selected hidden> Pilih Nomor Nor</option>
					<?php foreach($nor as $key) { ?><option value="<?php  echo $key->nor ?>">
						<?php echo $key->nor ?> </option><?php }  ?>
					</select>
				</div>
				<div class="col-md-2">
					<select class="form-control slct_no" id="slct_no" name="no_act[]" required="">
						<option disabled selected hidden class="nomor-not"> Pilih Nomor No</option>
						<?php foreach($no as $key) { ?>
							<option value="<?php  echo $key->no ?>" class="nomor-nor-<?php echo $key->nor ?>"><?php echo $key->no ?> </option><?php }  ?>
						</select>
					</div>
					<div class="col-md-2">
						<select class="form-control" name="nama_dvs[]" id="nama_dvs">
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
					<div class="col-md-3">
						<input type="text" id="nama_act" name="nama_act[]" class="form-control" placeholder="Masukkan Activity" list="data" required />
						<datalist id="data">
										<?php foreach ($this->db->get('mactivity')->result() as $key => $value) : ?>
										 <option value="<?= $value->namaActivity ?>" data-json='<?php echo json_encode($value) ?>'><?= $value->namaActivity ?>	 	
										 </option>
									<?php endforeach; ?>
									</datalist>
					</div>
					<div class="col-md-2"><input type="date" class="form-control datepicker" name="ak_plan_imp[]" id="ak_plan_imp" placeholder="Date (Plan)" required autocomplete="off"/></div>
					<div class="cols-md-1" style="align-items: center;"><center><button type="button" name="remove" id="" class="btn btn-danger btn_remove">X</button></center></div>
				</div>
				<script>

				</script>
			</div>
			<script type="text/javascript">
				$(function(){
					$(".datepicker").datepicker({
	  	// var tgl_ahir = tgl_b.getDate()+"/"+(parseInt(tgl_b.getMonth(), 10)+1)+"/"+tgl_b.getFullYear();
	   //    format: ,
	   autoclose: true,
	   todayHighlight: true,
	});
				});

				$(document).ready(function(){
					var i=1;  
					$('#add').click(function(){  
						i++;  
						$('#input-container').find('.input-header').attr('id','row'+i);
						$('#input-container').find('button[name="remove"]').attr('id',i);
						var html = String($('#input-container').html()); 
						$('.input-field').append(html);  
					});


					$(document).on('click', '.btn_remove', function(){  
						var button_id = $(this).attr("id");   
						$('#row'+button_id+'').remove();  
					});
					$.ajax({
						url: "<?php echo site_url(); ?>/Dc_controller/select_nor",
						success : function(data){
							$('#Modal_Add2').find('#slct_nor').html(data);
							$('#Modal_Import').find('#slct_nor').html(data);
						}
					});
					$.ajax({
						url: "<?php echo site_url(); ?>/Dc_controller/select_no",
						success : function(data){
							$('#Modal_Add2').find('#slct_no').html(data);
							$('#Modal_Import').find('#slct_no').html(data);
						}
					});
						
					$('.dropify').dropify({
						messages: {
							default: 'Drag atau drop untuk memilih File',
							replace: 'Ganti',
							remove:  'Hapus',
							error:   'error',
						}
					});
				});
					
					$('#Modal_Import').on('shown.bs.modal',function(){
						// alert("ASD");
						$.ajax({
						url: "<?php echo site_url(); ?>/Dc_controller/select_nor",
						success : function(data){
							$('#Modal_Add2').find('#slct_nor').html(data);
							$('#Modal_Import').find('#slct_nor').html(data);
						}
						});
						$.ajax({
						url: "<?php echo site_url(); ?>/Dc_controller/select_no",
						success : function(data){
							$('#Modal_Add2').find('#slct_no').html(data);
							$('#Modal_Import').find('#slct_no').html(data);
						}
					});
					});
						

		$('.slct_nor').change(function(){
			let select = $(this).closest("tr");
			// alert(select.attr('id'))
			let nor = $('.slct_nor :selected').val();
			select.find('select[name="no_act[]"]').find('option').not('.nomor-not').hide();
			select.find('select[name="no_act[]"]').val('0');
			select.find('.nomor-nor-'+nor).show();
		
	});

		function change_second(value,target) {
		let nor = value;
		// alert(target);
		target = '#'+target;
		$(target).find('.slct_no').find('option').not('.nomor-not').hide();
		$(target).find('.slct_no').val('0');
		$(target).find('.slct_no').find('.nomor-nor-'+nor).show();
	}

	function change_second2(value,target) {
		let nor = value;
		// alert(target);
		$(target).parents('.row').find('.slct_no').find('option').not('.nomor-not').hide();
		$(target).parents('.row').find('.slct_no').val('0');
		$(target).parents('.row').find('.slct_no').find('.nomor-nor-'+nor).show();
	}

	function move() {
		var elem = document.getElementById("myBar");   
		var width = 1;
		var id = setInterval(frame, 10);
		function frame() {
			if (width >= 100) {
				clearInterval(id);
			} else {
				width++; 
				elem.style.width = width + '%'; 
			}
		}
	}
     
</script>

</main>