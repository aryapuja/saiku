<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main" style="padding-bottom: 0px;">
	<div class="container-fluid row"  style="zoom:20%">
		<!-- view tabel Calendar -->
		<div class="calendaragenda">
			<div style="background-color: #FFF; padding: 5px; height: 100%">

				<div class="boddy card">
					<center><h4 class="namatitel card-header">KALENDER KEGIATAN</h4></center>
					<div class="card-body">
						<div class="row card-title">
							<!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<button class="btn btn-outline-primary col-md-12" id="previous"><font style="margin-left: -8px;">Previous</font></button>	
							</div> -->

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h5 style="text-align: center;" id="thismonth"></h5>
							</div>
							<!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<button class="btn btn-outline-primary col-md-12" id="next">Next</button>	
							</div> -->
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
									<img src="<?=base_url()?>assets/image/8.png" width="10px">&nbsp Tidak Ada Activity<br>
									<img src="<?=base_url()?>assets/image/1.png" width="10px">&nbsp Ada 1 Line<br>
									<img src="<?=base_url()?>assets/image/2.png" width="10px">&nbsp Ada 2 Line<br>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<img src="<?=base_url()?>assets/image/3.png" width="10px">&nbsp Ada 3 Line<br>
									<img src="<?=base_url()?>assets/image/4.png" width="10px">&nbsp Ada 4 Line<br>
									<img src="<?=base_url()?>assets/image/5.png" width="10px">&nbsp Ada >=5 Line<br>
								</div>
							</div>
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
						<!-- <div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Schedule</a></div> -->
						<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall">
							<thead>
								<tr style="background-color: #E8E8E8;">
									<!-- <th style="width: 5%;">No</th> -->
									<th style="text-align: center;" hidden>Id</th>
									<th style="text-align: center; width: 15% ">Nor-No</th>
									<th style="text-align: center; width: 50%">Item Changes</th>
									<th style="text-align: center; width: 10%">Line</th>
									<th style="text-align: center; width: 10%">Plan Implementation</th>
									<!-- <th style="text-align: center; width: 15%">Action</th> -->
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
					<!-- <div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add2"><span class="fa fa-plus"></span> Add Activity</a></div> -->
					<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall2">
						<thead>
							<tr style="background-color: #E8E8E8;">
								<!-- <th style="width: 5%;">No</th> -->
								<th style="text-align: center;" hidden>Id</th>
								<th style="text-align: center; width: 5%">Nor-No</th>
								<!-- <th style="text-align: center; width: 5%">Plan Implementation Nor</th> -->
								<th style="text-align: center; width: 5%">Section</th>
								<th style="text-align: center; width: 75%">Activity</th>
								<th style="text-align: center; width: 5%">Plan Implementation</th>
								<th style="text-align: center; width: 5%">Actual Implementation</th>
								<!-- <th style="text-align: center; width: 15%">Action</th> -->
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
										<label for="#">Plan Implementation </label>
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

	<div class="modal fade" id="Modal_Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 70%">
<div class="modal-content">
			</div>
		</div>
	</div>
</div>
</div>
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
									<label for="#">Plan Implementation: </label>
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
<!--END MODAL NOR Delete -->

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
							<div class="table-responsive">  
								<table class="table table-bordered" id="dynamic_field">  
									<tr id="asw">
										<td>
											<label>Nor</label>
											<select class="form-control slct_nor" id="slct_nor" name="nor_act[]" required="">
												<option disabled selected hidden> Pilih Nomor Nor</option>

											</select>
										</td>
										<td>
											<label>No</label>
											<select class="form-control" id="slct_no" name="no_act[]" required="">
												<option disabled selected hidden class="nomor-not"> Pilih Nomor No</option>
												<?php foreach ($no as $key) { ?>
													<option value="<?php echo $key->no ?>" class="nomor-nor-<?php echo $key->nor ?>"> <?php  echo $key->no ?> </option>
												<?php }  ?>
											</select>
										</td>
										<td> <label>Section</label>
											<select class="form-control" name="nama_dvs[]" id="nama_dvs">
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
										</td>
										<td> <label>Activity</label>
											<input type="text" id="nama_act" name="nama_act[]" class="form-control" placeholder="Masukkan Activity" required />
										</td>
										<td> <label>Date Plan</label>
											<input class="form-control datepicker" name="date_plan_act[]" id="date_plan_act" placeholder="Date (Plan)" required/>
										</td>
										<td> <label>Date Actual</label>
											<input  class="form-control datepicker" name="date_actual[]" id="date_actual" placeholder="Date (Actual)" required/>
										</td>
										<td>
											<label for="hapus">Hapus Form</label><br/>
											<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" disabled>X</button>
										</td>  
									</tr>  
								</table>  
								<div class="input-field">

								</div>
								<!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary"  name="add" id="add">Tambah Data Form</button>
						<button type="submit" id="submit" class="btn btn-success ">Input Data</button>
					</div>
				</div>
			</div>
		</div>
	</form>  
</div>
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
												<option value="de">de</option>
												<option value="pp">pp</option>
												<option value="qp">qp</option>
												<option value="qmp">qmp</option>
												<option value="eng">eng</option>
												<option value="nys">nys</option>
												<option value="prod">prod</option>
												<option value="ppc">ppc</option>
											</select>
										</td>
										<td> <label>Activity</label>
											<input type="text" id="nama_act_up" name="nama_act_up" class="form-control" placeholder="Masukkan Activity" required />
										</td>
										<td> <label>Plan Implementation</label>
											<input class="form-control datepicker" name="date_plan_act_up" id="date_plan_act_up" placeholder="Date (Plan)" required/>
										</td>
										<td> <label>Actual Implementation</label>
											<input  class="form-control datepicker" name="date_actual_up" id="date_actual_up" placeholder="Date (Actual)" required/>
										</td>
										<td>
											<!-- <button type="button" name="add" id="add" class="btn btn-success">Add More</button> -->
										</td>  
									</tr>  
								</table>  
								<!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="u_id_act" name="u_id_act" value="">
						<button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary"  name="updatee" id="updatee">Tambah Data Form</button>
						<button type="submit" id="submit" class="btn btn-success ">Input Data</button>
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

					</div>

					<br />
					<center>
						<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal" style="margin-right: 20px">Batal</button>
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
	<div class="row input-header" id="rows">
		<div class="col-md-2">
			<select class="form-control slct_nor" id="slct_nor" name="nor_act[]" required="" onchange="change_second($(this).val(),$(this).parents('.row').attr('id'))">
				<option disabled selected hidden> Pilih Nomor Nor</option>
				<?php foreach($nor as $key) { ?><option value="<?php  echo $key->nor ?>">
					<?php echo $key->nor ?> </option><?php }  ?>
				</select>
			</div>
			<div class="col-md-2">
				<select class="form-control slct_no" id="slct_no" name="no_act[]" required="">
					<option disabled selected hidden> Pilih Nomor No</option>
					<?php foreach($no as $key) { ?>
						<option value="<?php  echo $key->no ?>" class="nomor-nor-<?php echo $key->nor ?>"><?php echo $key->no ?> </option><?php }  ?>
					</select>
				</div>
				<div class="col-md-2">
					<select class="form-control" name="nama_dvs[]" id="nama_dvs">
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
				<div class="col-md-2"><input type="text" id="nama_act" name="nama_act[]" class="form-control" placeholder="Masukkan Activity" required /></div>
				<div class="col-md-2"><input type="date" class="form-control datepicker" name="date_plan_act[]" id="date_plan_act" placeholder="Date (Plan)" required/></div>
				<div class="col-md-2"><input type="date" class="form-control datepicker" name="date_actual[]" id="date_actual" placeholder="Date (Actual)" required/ >
					<button type="button" name="remove" id="" class="btn btn-danger btn_remove">X</button></div>
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
					alert(target);
					target = '#'+target;
					$(target).find('.slct_no').find('option').not('.nomor-not').hide();
					$(target).find('.slct_no').val('0');
					$(target).find('.slct_no').find('.nomor-nor-'+nor).show();
				}
			</script>

		</main>