<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
	<div class="container-fluid row"  style="zoom:60%">
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
							<div class="row" align="left">

								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<img src="#" width="10px">&nbsp Tidak Ada Activity<br>
									<img src="<?=base_url()?>assets/image/1.png" width="10px">&nbsp Ada 1 Activity<br>
									<img src="<?=base_url()?>assets/image/2.png" width="10px">&nbsp Ada 2 Activity<br>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<img src="<?=base_url()?>assets/image/3.png" width="10px">&nbsp Ada 3 Activity<br>
									<img src="<?=base_url()?>assets/image/4.png" width="10px">&nbsp Ada 4 Activity<br>
									<img src="<?=base_url()?>assets/image/5.png" width="10px">&nbsp Ada >=5 Activity<br>
								</div>
							</div>
						</center>
					</div>
				</div>

			</div>
		</div>

		<!-- view tabel agenda -->
		<div class="agendaview">
			<div style="background-color: #FFF; padding: 0px;">
				<div class="boddy card">
					<center><h4 class="namatitel card-header">ACTIVITY SCHEDULE</h4></center>
					<div class="card-body">
						<!-- <div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Schedule</a></div> -->
						<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall">
							<thead>
								<tr style="background-color: #E8E8E8;">
									<!-- <th style="width: 5%;">No</th> -->
									<th style="text-align: center;" hidden>Id</th>
									<th style="text-align: center; width: 15% ">Nor-No</th>
									<th style="text-align: center; width: 35%">Activity</th>
									<th style="text-align: center; width: 5%">Line</th>
									<th style="text-align: center; width: 10%">Plan Implementation</th>
									<th style="text-align: center; width: 10%">Status</th>
									<th style="text-align: center; width: 10%">Actual Implementation</th>
									<th style="text-align: center; width: 5%">Action</th>
								</tr>
							</thead>
							<tbody id="tbl_agendakegiatan" style="text-align: center;">

							</tbody> 
						</table>
					</div>
				</div>	
			</div>
		</div>

	</div>  
	<!-- end container  -->

	<div class="modal fade" id="Modal_Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 70%">
<div class="modal-content">
			</div>
		</div>
	</div>
</div>
</div>
<!--END MODAL NOR baru-->

<!--========================================================== ACTIVITY ========================================================== -->


<!-- Update Modal Activity -->
<div class="form-group">  
	<form name="update_activity" id="update_activity">
		<div class="modal fade" id="Modal_Update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 80%;overflow-y: initial !important">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Activity : Actual Implementation</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>

					<div class="modal-body" id="mdl_bdy" style="max-height: calc(100vh - 200px);overflow-y: auto;">
						<div class="container-fluid scroll">  
							<div class="table-responsive">  
								<table class="table table-bordered" id="dynamic_field">  
									<tr>
										<td>
											<label>Nor</label>
											<input type="text" id="u_nor" name="u_nor" class="form-control" placeholder="Masukkan Activity" required disabled />
										</td>
										<td>
											<label>No</label>
											<input type="text" id="u_no" name="u_no" class="form-control" placeholder="Masukkan Activity" required disabled />

										</td>
										<td> <label>Activity</label>
											<input type="text" id="u_nama_act" name="u_nama_act" class="form-control" placeholder="Masukkan Activity" required disabled />
										</td>
										<td> <label>Line</label>
											<input type="text" id="u_line" name="u_line" class="form-control" placeholder="Masukkan Line" required disabled />
										</td>
										<td> <label>Plan Implementation</label>
											<input class="form-control datepicker" name="u_ak_plan_imp" id="u_ak_plan_imp" placeholder="Date (Plan)" required disabled/>
										</td>
										<td> <label>Actual Implementation</label>
											<input  class="form-control datepicker" name="u_ak_act_imp" id="u_ak_act_imp" placeholder="Date (Actual)" required/>
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
						<input type="hidden" id="u_id" name="u_id" value="">
						<button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
						<button type="submit" id="submit" class="btn btn-success ">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>  
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