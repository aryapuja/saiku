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
		<div style="background-color: #FFF; padding: 15px;">
			<div class="boddy card">
				<center><h4 class="namatitel card-header">AGENDA KEGIATAN</h4></center>
				<div class="card-body">
					<div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Schedule</a></div>

					<table class="table table-striped table-bordered table-responsive-md tblcus" style="table-layout:all; width: 100%" id="agendaall">
						<thead>
							<tr style="background-color: #E8E8E8;">
							   <!-- <th style="width: 5%;">No</th> -->
							   <th style="text-align: center;" hidden>Id_dc</th>
							   <th style="text-align: center; width: 10% ">Nor-No</th>
							   <th style="text-align: center; width: 5%">Rev</th>
							   <th style="text-align: center; width: 50%">Item Changes</th>
							   <th style="text-align: center; width: 10%">Implement Date</th>
							   <th style="text-align: center; width: 5%">Carline</th>
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
	
	<!-- View Tabel Detail -->
	<div class="minipengumuman" style="border: 2px; padding-top: 20px; width: 100%">
		<div style="background-color: #FFF; padding: 15px;">
				<form id="tampil">
					
				<div class="card text-black bg-default mb-2">
					<div class="card-header">
						<button type="submit" class="btn btn-success pull-right" id="btn_submit" disabled="true">Update Data</button> 
						<h2> <b> Detail Info </b>  </h2> 
					</div>
						
					<div class="row">
						<input type="text" class="form-control"  name="v_dc_id" id="v_dc_id"  hidden />
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>Nor: </b>
					        <input type="text" class="form-control "  name="v_nor" id="v_nor"  disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>No: </b>
					        <input type="text" class="form-control "  name="v_no" id="v_no" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>Rev: </b>
					        <input type="text" class="form-control "  name="v_rev" id="v_rev" disabled="true" />
					      </div>
						</div>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>Carline: </b>
					        <input type="text" class="form-control "  name="v_carline" id="v_carline" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>Item Changes: </b>
					        <input type="text" class="form-control "  name="v_item_changes" id="v_item_changes" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>Implemented Date: </b>
					        <input type="text" class="form-control datepicker"  name="v_start" id="v_start" disabled="true" />
					      </div>
						</div>
					</div>


					</div>

					<div class="card-header"><h2><b> Due Date (PLAN) </b></h2></div>

					<div class="row">

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header" > <b>DE - EPL: </b>
					        <input type="text" class="form-control datepicker"  name="v_de_epl" id="v_de_epl" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>DE-COMM CCT, TUBE: </b>
					        <input type="text" class="form-control datepicker"  name="v_de_com" id="v_de_com" disabled="true" />
					      </div>
						</div>
					</div>
					  
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>DE-ENG DWG: </b>
					        <input type="text" class="form-control datepicker"  name="v_de_eng" id="v_de_eng" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>NYS-KANBAN CCT: </b>
					        <input type="text" class="form-control datepicker"  name="v_nys_kb_cct" id="v_nys_kb_cct" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>NYS-KANBAN MATERIAL: </b>
					        <input type="text" class="form-control datepicker"  name="v_nys_kb_material" id="v_nys_kb_material" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>NYS-MCL: </b>
					        <input type="text" class="form-control datepicker"  name="v_nys_mcl" id="v_nys_mcl" disabled="true" />
					      </div>
						</div>
					</div>	  

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PP-SWCT: </b>
					        <input type="text" class="form-control datepicker"  name="v_pp_swct" id="v_pp_swct" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PP-MATRIK: </b>
					        <input type="text" class="form-control datepicker"  name="v_pp_matrik" id="v_pp_matrik" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>QP-SWCT: </b>
					        <input type="text" class="form-control datepicker"  name="v_qp_swct" id="v_qp_swct" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>QP-DWG INSPEK: </b>
					        <input type="text" class="form-control datepicker"  name="v_qp_dwg" id="v_qp_dwg" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PPC-REQ PRICE: </b>
					        <input type="text" class="form-control datepicker"  name="v_ppc_req" id="v_ppc_req" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PPC-RELEASE: </b>
					        <input type="text" class="form-control datepicker"  name="v_ppc_release" id="v_ppc_release" disabled="true" />
					      </div>
						</div>
					</div>					
					
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PROD-IMPLEMENTASI: </b>
					        <input type="text" class="form-control datepicker"  name="v_prod_imp" id="v_prod_imp" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PROD-PENGOSONGAN WIP: </b>
					        <input type="text" class="form-control datepicker"  name="v_prod_pengosongan" id="v_prod_pengosongan" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PROD-KARANTINA CIK, NP, LABEL: </b>
					        <input type="text" class="form-control datepicker"  name="v_prod_karantina" id="v_prod_karantina" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>PROD-CUTTING & SUPPLY CCT, TUBE: </b>
					        <input type="text" class="form-control datepicker"  name="v_prod_cutting" id="v_prod_cutting" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>QMP-TRIAL EC: </b>
					        <input type="text" class="form-control datepicker"  name="v_qmp_trial" id="v_qmp_trial" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>QMP-VALIDASI MATRIK INSPEKSI: </b>
					        <input type="text" class="form-control datepicker"  name="v_qmp_vld_mat" id="v_qmp_vld_mat" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>QMP-VALIDASI JIG: </b>
					        <input type="text" class="form-control datepicker"  name="v_qmp_vld_jig" id="v_qmp_vld_jig" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>ENGINEERING-SAO: </b>
					        <input type="text" class="form-control datepicker"  name="v_eng_sao" id="v_eng_sao" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>ENGINEERING-HOUSING: </b>
					        <input type="text" class="form-control datepicker"  name="v_eng_housing" id="v_eng_housing" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>ENGINEERING-JIG BOARD: </b>
					        <input type="text" class="form-control datepicker"  name="v_eng_jig" id="v_eng_jig" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>ENGINEERING-MATRIK: </b>
					        <input type="text" class="form-control datepicker"  name="v_eng_matrik" id="v_eng_matrik" disabled="true" />
					      </div>
						</div>
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    <div class="card">
					      <div class="card-header"> <b>ENGINEERING-SETTING MCL: </b>
					        <input type="text" class="form-control datepicker"  name="v_eng_setting" id="v_eng_setting" disabled="true" />
					      </div>
						</div>
					</div>
					</div>

				</div>
				</form>
			
		</div>
	</div>

</div>  <!-- end container  -->	


<!--MODAL Baru-->
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
						<label>Rev</label>
					<input type="text" id="rev" class="form-control" placeholder="Masukkan Rev" required>
					</div>
				</div>
				<div class="form-group col-lg-12 row">
               		<div class="col-6">
					<label>Item Changes</label>
					<textarea type="text" id="item_changes" class="form-control" rows="4" placeholder="Masukkan item Changes"  required></textarea>
					</div>
					<div class="col-6">
					<label>Carline</label>
					<input type="text" id="carline" class="form-control" placeholder="Masukkan Carline" required>
					<label for="#">Implemented Plan </label>
					<div class="input-daterange input-group" id="datepickerss">
					<input  class="form-control" name="start" id="start" placeholder="Due Date (Plan)" required/>
				</div>
					</div>

				</div>
				
				<!-- <div class="form-group col-lg-12 row">
					<div class="input-daterange input-group" id="datepickerss">
               		<div class="col-6">
					<label for="#">Implemented Plan </label>
					<input  class="form-control" name="start" id="start" placeholder="Tanggal Mulai" required/>
					</div> -->
<!-- 					<div class="col-6">
					<label>Implemented Actual</label>
					<input   class="form-control" name="end" id="end" placeholder="Due Date (Plan)" required/>
					</div> -->
				<!-- </div>
				</div> -->

				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">DE</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#">EPL </label>
					    <input  class="form-control datepicker" name="de_epl" id="de_epl" placeholder="Due Date (Plan)"/>
					</div>
					<div class="col-4">
					<label>COMM CCT, TUBE</label>
					    <input   class="form-control datepicker" name="de_com" id="de_com" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>ENG DWG</label>
					    <input   class="form-control datepicker" name="de_eng" id="de_eng" placeholder="Due Date (Plan)" />
					</div>
				</div>
					</div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">PP</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-6">
					<label for="#">SWCT </label>
					   <input  class="form-control datepicker" name="pp_swct" id="pp_swct" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-6">
					<label>Matrik</label>
					    <input   class="form-control datepicker" name="pp_matrik" id="pp_matrik" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">QP</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-6">
					<label for="#">SWCT </label>
					   <input  class="form-control datepicker" name="qp_swct" id="qp_swct" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-6">
					<label>DWG INSPEK</label>
					    <input   class="form-control datepicker" name="qp_dwg" id="qp_dwg" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">QMP</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#"> TRIAL EC </label>
					   <input  class="form-control datepicker" name="qmp_trial" id="qmp_trial" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>VALIDASI MATRIK</label>
					    <input   class="form-control datepicker" name="qmp_vld_mat" id="qmp_vld_mat" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>VALIDASI JIG</label>
					    <input   class="form-control datepicker" name="qmp_vld_jig" id="qmp_vld_jig" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">ENGINEERING</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#"> SAO </label>
					   					    <input  class="form-control datepicker" name="eng_sao" id="eng_sao" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label for="#"> HOUSING </label>
					   <input   class="form-control datepicker" name="eng_housing" id="eng_housing" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label for="#"> JIG BOARD </label>
					   <input   class="form-control datepicker" name="eng_jig" id="eng_jig" placeholder="Due Date (Plan)" />
					</div>
				</div>
			
				<div class="form-group col-lg-12 row">
					<div class="input-daterange input-group">
					<div class="col-4">
					<label for="#"> MATRIK </label>
					  <input   class="form-control datepicker" name="eng_matrik" id="eng_matrik" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>SETTING MCL</label>
					    <input   class="form-control datepicker" name="eng_setting" id="eng_setting" placeholder="Due Date (Plan)" />
					</div>
				</div>
			</div>
				</div>
				</div>
				</div>
				
				            	<!-- form inputan pilihan tanggal -->
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">NYS</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#"> KANBAN CCT </label>
					   <input  class="form-control datepicker" name="nys_kb_cct" id="nys_kb_cct" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>KANBAN MATERIAL</label>
					    <input   class="form-control datepicker" name="nys_kb_material" id="nys_kb_material" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>MCL</label>
					    <input   class="form-control datepicker" name="nys_mcl" id="nys_mcl" placeholder="Due Date (Plan)" />
					</div>
				</div></div></div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">PROD</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-3">
					<label for="#"> IMPLEMENTASI </label>
					   <input  class="form-control datepicker" name="prod_imp" id="prod_imp" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-3">
					<label>PENGOSONGAN WIP</label>
					    <input   class="form-control datepicker" name="prod_pengosongan" id="prod_pengosongan" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-3">
					<label>KARANTINA CIK NP LABEL</label>
					    <input   class="form-control datepicker" name="prod_karantina" id="prod_karantina" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-3">
					<label>CUT. & SUPPLY CCT TUBE</label>
					    <input   class="form-control datepicker" name="prod_cutting" id="prod_cutting" placeholder="Due Date (Plan)" />
					</div>
				</div></div></div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">PPC</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-6">
					<label for="#"> REQ PRICE </label>
					   <input  class="form-control datepicker" name="ppc_req" id="ppc_req" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-6">
					<label>RELEASE NOR & KARTU IMP.</label>
					    <input   class="form-control datepicker" name="ppc_release" id="ppc_release" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
            </div></div>
            <div class="modal-footer">
            	<!-- inputan button simpan dan batal -->
            	<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Batal</button>
				<button type="submit" id="btn_push" class="btn btn-primary col-md-3">Tambah</button>
            </div>
          </div>
        </div>
        </div>
      </div>
    </form>
<!--END MODAL baru-->
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

<!--MODAL START UPDATEEE UPDATEEE-->
    <form id="formupdate">
      <div class="modal fade" id="Modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Perbarui Agenda</h4>
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
						<label>Rev</label>
					<input type="text" id="rev" class="form-control" placeholder="Masukkan Rev" required>
					</div>
				</div>
				<div class="form-group col-lg-12 row">
               		<div class="col-6">
					<label>Item Changes</label>
					<textarea type="text" id="item_changes" class="form-control" rows="4" placeholder="Masukkan item Changes"  required></textarea>
					</div>
					<div class="col-6">
					<label>Carline</label>
					<input type="text" id="carline" class="form-control" placeholder="Masukkan Carline" required>
					<label for="#">Implemented Plan </label>
					<div class="input-daterange input-group" id="datepickerss">
					<input  class="form-control" name="start" id="start" placeholder="Due Date (Plan)" required/>
				</div>
					</div>

				</div>
				
				<!-- <div class="form-group col-lg-12 row">
					<div class="input-daterange input-group" id="datepickerss">
               		<div class="col-6">
					<label for="#">Implemented Plan </label>
					<input  class="form-control" name="start" id="start" placeholder="Tanggal Mulai" required/>
					</div> -->
<!-- 					<div class="col-6">
					<label>Implemented Actual</label>
					<input   class="form-control" name="end" id="end" placeholder="Due Date (Plan)" required/>
					</div> -->
				<!-- </div>
				</div> -->

				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">DE</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#">EPL </label>
					    <input  class="form-control datepicker" name="de_epl" id="de_epl" placeholder="Due Date (Plan)"/>
					</div>
					<div class="col-4">
					<label>COMM CCT, TUBE</label>
					    <input   class="form-control datepicker" name="de_com" id="de_com" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>ENG DWG</label>
					    <input   class="form-control datepicker" name="de_eng" id="de_eng" placeholder="Due Date (Plan)" />
					</div>
				</div>
					</div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">PP</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-6">
					<label for="#">SWCT </label>
					   <input  class="form-control datepicker" name="pp_swct" id="pp_swct" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-6">
					<label>Matrik</label>
					    <input   class="form-control datepicker" name="pp_matrik" id="pp_matrik" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">QP</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-6">
					<label for="#">SWCT </label>
					   <input  class="form-control datepicker" name="qp_swct" id="qp_swct" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-6">
					<label>DWG INSPEK</label>
					    <input   class="form-control datepicker" name="qp_dwg" id="qp_dwg" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">QMP</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#"> TRIAL EC </label>
					   <input  class="form-control datepicker" name="qmp_trial" id="qmp_trial" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>VALIDASI MATRIK</label>
					    <input   class="form-control datepicker" name="qmp_vld_mat" id="qmp_vld_mat" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>VALIDASI JIG</label>
					    <input   class="form-control datepicker" name="qmp_vld_jig" id="qmp_vld_jig" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">ENGINEERING</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#"> SAO </label>
					   					    <input  class="form-control datepicker" name="eng_sao" id="eng_sao" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label for="#"> HOUSING </label>
					   <input   class="form-control datepicker" name="eng_housing" id="eng_housing" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label for="#"> JIG BOARD </label>
					   <input   class="form-control datepicker" name="eng_jig" id="eng_jig" placeholder="Due Date (Plan)" />
					</div>
				</div>
			
				<div class="form-group col-lg-12 row">
					<div class="input-daterange input-group">
					<div class="col-4">
					<label for="#"> MATRIK </label>
					  <input   class="form-control datepicker" name="eng_matrik" id="eng_matrik" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>SETTING MCL</label>
					    <input   class="form-control datepicker" name="eng_setting" id="eng_setting" placeholder="Due Date (Plan)" />
					</div>
				</div>
			</div>
				</div>
				</div>
				</div>
				
				            	<!-- form inputan pilihan tanggal -->
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">NYS</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-4">
					<label for="#"> KANBAN CCT </label>
					   <input  class="form-control datepicker" name="nys_kb_cct" id="nys_kb_cct" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>KANBAN MATERIAL</label>
					    <input   class="form-control datepicker" name="nys_kb_material" id="nys_kb_material" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-4">
					<label>MCL</label>
					    <input   class="form-control datepicker" name="nys_mcl" id="nys_mcl" placeholder="Due Date (Plan)" />
					</div>
				</div></div></div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">PROD</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-3">
					<label for="#"> IMPLEMENTASI </label>
					   <input  class="form-control datepicker" name="prod_imp" id="prod_imp" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-3">
					<label>PENGOSONGAN WIP</label>
					    <input   class="form-control datepicker" name="prod_pengosongan" id="prod_pengosongan" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-3">
					<label>KARANTINA CIK NP LABEL</label>
					    <input   class="form-control datepicker" name="prod_karantina" id="prod_karantina" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-3">
					<label>CUT. & SUPPLY CCT TUBE</label>
					    <input   class="form-control datepicker" name="prod_cutting" id="prod_cutting" placeholder="Due Date (Plan)" />
					</div>
				</div></div></div>
				</div>
				<div class="form-group col-lg-12 row">
					<div class="card text-white" style="width: 100%">
						<div class="card-header bg-secondary">PPC</div>
					<div class="card-body text-dark">
					<div class="input-daterange input-group">
               		<div class="col-6">
					<label for="#"> REQ PRICE </label>
					   <input  class="form-control datepicker" name="ppc_req" id="ppc_req" placeholder="Due Date (Plan)" />
					</div>
					<div class="col-6">
					<label>RELEASE NOR & KARTU IMP.</label>
					    <input   class="form-control datepicker" name="ppc_release" id="ppc_release" placeholder="Due Date (Plan)" />
					</div></div></div>
				</div>
				</div>
            </div></div>

            </div>
            <div class="modal-footer">
            	<!-- inputan button simpan dan batal -->
            	<input type="hidden" id="id_kup" name="id_kup" value="">
            	<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Batal</button>
				<button type="submit" id="btn_push" class="btn btn-success col-md-3">Perbarui</button>
            </div>
          </div>
        </div>
      </div>
    </form>
<!--END UPDATEEE UPDATEEE-->

<!--MODAL Delete-->
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
<!--END MODAL Delete-->
<script type="text/javascript">
	function klikDetail() {
	  	document.getElementById("btn_submit").disabled 			= true;
	  	document.getElementById("v_nor").disabled 				= true;
	    document.getElementById("v_no").disabled 				= true;
	    document.getElementById("v_rev").disabled 				= true;
	    document.getElementById("v_item_changes").disabled		= true;
	    document.getElementById("v_start").disabled 			= true;
	    document.getElementById("v_carline").disabled 			= true;
	    document.getElementById("v_de_epl").disabled 			= true;
		document.getElementById("v_de_eng").disabled 			= true;
	    document.getElementById("v_de_com").disabled 			= true;
	    document.getElementById("v_pp_swct").disabled 			= true;
	    document.getElementById("v_pp_matrik").disabled 		= true;
	    document.getElementById("v_qp_swct").disabled 			= true;
	    document.getElementById("v_qp_dwg").disabled 			= true;
	    document.getElementById("v_qmp_trial").disabled		 	= true;
	    document.getElementById("v_qmp_vld_mat").disabled 		= true;
	    document.getElementById("v_qmp_vld_jig").disabled 		= true;
	    document.getElementById("v_eng_sao").disabled 			= true;
	    document.getElementById("v_eng_housing").disabled 		= true;
	    document.getElementById("v_eng_jig").disabled 			= true;
	    document.getElementById("v_eng_matrik").disabled 		= true;
	    document.getElementById("v_eng_setting").disabled 		= true;
	    document.getElementById("v_nys_kb_cct").disabled 		= true;
	    document.getElementById("v_nys_kb_material").disabled 	= true;
	    document.getElementById("v_nys_mcl").disabled 			= true;
	    document.getElementById("v_prod_imp").disabled 			= true;
	    document.getElementById("v_prod_pengosongan").disabled	= true;
	    document.getElementById("v_prod_karantina").disabled 	= true;
	    document.getElementById("v_prod_cutting").disabled 		= true;
	    document.getElementById("v_ppc_req").disabled 			= true;
	    document.getElementById("v_ppc_release").disabled 		= true;
	}

function klikUpdate(){

		if(document.getElementById("v_nor").value == ""){
			document.getElementById("btn_submit").disabled 			= true;
		  	document.getElementById("v_nor").disabled 				= true;
		    document.getElementById("v_no").disabled 				= true;
		    document.getElementById("v_rev").disabled 				= true;
		    document.getElementById("v_item_changes").disabled		= true;
		    document.getElementById("v_start").disabled 			= true;
		    document.getElementById("v_carline").disabled 			= true;
		    document.getElementById("v_de_eng").disabled 			= true;
		    document.getElementById("v_de_epl").disabled 			= true;
		    document.getElementById("v_de_com").disabled 			= true;
		    document.getElementById("v_pp_swct").disabled 			= true;
		    document.getElementById("v_pp_matrik").disabled 		= true;
		    document.getElementById("v_qp_swct").disabled 			= true;
		    document.getElementById("v_qp_dwg").disabled 			= true;
		    document.getElementById("v_qmp_trial").disabled		 	= true;
		    document.getElementById("v_qmp_vld_mat").disabled 		= true;
		    document.getElementById("v_qmp_vld_jig").disabled 		= true;
		    document.getElementById("v_eng_sao").disabled 			= true;
		    document.getElementById("v_eng_housing").disabled 		= true;
		    document.getElementById("v_eng_jig").disabled 			= true;
		    document.getElementById("v_eng_matrik").disabled 		= true;
		    document.getElementById("v_eng_setting").disabled 		= true;
		    document.getElementById("v_nys_kb_cct").disabled 		= true;
		    document.getElementById("v_nys_kb_material").disabled 	= true;
		    document.getElementById("v_nys_mcl").disabled 			= true;
		    document.getElementById("v_prod_imp").disabled 			= true;
		    document.getElementById("v_prod_pengosongan").disabled	= true;
		    document.getElementById("v_prod_karantina").disabled 	= true;
		    document.getElementById("v_prod_cutting").disabled 		= true;
		    document.getElementById("v_ppc_req").disabled 			= true;
		    document.getElementById("v_ppc_release").disabled 		= true;
		}else{
		  	document.getElementById("btn_submit").disabled			= false;
		    document.getElementById("v_nor").disabled 				= false;
		    document.getElementById("v_no").disabled 				= false;
		    document.getElementById("v_rev").disabled 				= false;
		    document.getElementById("v_item_changes").disabled 		= false;
		    document.getElementById("v_start").disabled 			= false;
		    document.getElementById("v_carline").disabled 			= false;
		    document.getElementById("v_de_epl").disabled 			= false;
		    document.getElementById("v_de_eng").disabled 			= false;
		    document.getElementById("v_de_com").disabled 			= false;
		    document.getElementById("v_pp_swct").disabled			= false;
		    document.getElementById("v_pp_matrik").disabled 		= false;
		    document.getElementById("v_qp_swct").disabled 			= false;
		    document.getElementById("v_qp_dwg").disabled			= false;
		    document.getElementById("v_qmp_trial").disabled 		= false;
		    document.getElementById("v_qmp_vld_mat").disabled 		= false;
		    document.getElementById("v_qmp_vld_jig").disabled 		= false;
		    document.getElementById("v_eng_sao").disabled 			= false;
		    document.getElementById("v_eng_housing").disabled 		= false;
		    document.getElementById("v_eng_jig").disabled 			= false;
		    document.getElementById("v_eng_matrik").disabled 		= false;
		    document.getElementById("v_eng_setting").disabled 		= false;
		    document.getElementById("v_nys_kb_cct").disabled 		= false;
		    document.getElementById("v_nys_kb_material").disabled 	= false;
		    document.getElementById("v_nys_mcl").disabled 			= false;
		    document.getElementById("v_prod_imp").disabled 			= false;
		    document.getElementById("v_prod_pengosongan").disabled	= false;
		    document.getElementById("v_prod_karantina").disabled 	= false;
		    document.getElementById("v_prod_cutting").disabled 		= false;
		    document.getElementById("v_ppc_req").disabled 			= false;
		    document.getElementById("v_ppc_release").disabled 		= false;
		}
	}

</script>
</main>