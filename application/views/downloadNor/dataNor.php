<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
		
	<div class="container-fluid">
	<div class="col-lg-12 row" style="padding: 0px; margin: 0px">
		
		<div class="col-lg-4" style="padding: 0px; margin: 0px">
			<form id="downloadnor">
				<div style="background-color: #FFF; padding: 0px;">
					<div class="boddy card">
						<center><h5 class="namatitel card-header">Form Download</h5></center>
						<div class="card-body">
							<div class="row">
								
							<div class="form-group col-lg-12">
								<label>Nor</label>
								<select class="form-control slct_nor" id="slct_nor" name="nor_act" required="" onchange="change_second2($(this).val(),this)">
									<option disabled selected hidden> Pilih Nor</option>

								</select>
								<label>No</label>
								<select class="form-control slct_no" id="slct_no" name="no_act" required="">
									<option disabled selected hidden class="nomor-not"> Pilih No</option>
									<?php foreach ($no as $key) { ?>
										<option value="<?php echo $key->no ?>" class="nomor-nor-<?php echo $key->nor ?>"> <?php  echo $key->no ?> </option>
									<?php }  ?>
								</select>
								<!-- <input type="text" name="id" name="id"> -->
							</div>
							</div>
							<button type="submit" id="btn_push" class="btn btn-primary float-right">Preview</button>
							<button type="button" id="btn_push" class="btn btn-success" onclick="downloadExcel();">Download</button>
						</div>	
					</div>
				</div>
			</form>
		</div>

		<div class="col-lg-8">
			<div class="listview">
			<div style="background-color: #FFF; padding: 0px;">
				<div class="boddy card">
					<center><h5 class="namatitel card-header">Preview</h5></center>
					<div class="card-body">
						<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="dataNor">
							<thead>
								<tr style="background-color: #E8E8E8;">
									<!-- <th style="width: 5%;">No</th> -->
									<th style="text-align: center; width: 15%">Section</th>
									<th style="text-align: center; width: 15%">Activity</th>
									<th style="text-align: center; width: 15%">Due Date Activity</th>
									<th style="text-align: center; width: 15%">Actual Implementation</th>
								</tr>
							</thead>
							<tbody id="tbl_preview" style="text-align: center;">

							</tbody> 
						</table>
					</div>
				</div>	
			</div>
		</div>
		</div>
	</div>

	</div>
<script type="text/javascript">

	$(document).ready(function(){
		var i=1;  
		$.ajax({
			url: "<?php echo site_url(); ?>/Dc_controller/select_nor2",
			success : function(data){
				$('#downloadnor').find('#slct_nor').html(data);
			}
		});
		$.ajax({
			url: "<?php echo site_url(); ?>/Dc_controller/select_no2",
			success : function(data){
				$('#downloadnor').find('#slct_no').html(data);
			}
		});

		
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
	
</script>
</main>