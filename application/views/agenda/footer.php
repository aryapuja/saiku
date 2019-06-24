
<!-- navbar jam dan tanggal bottom -->
<nav class="navbar navbar-default navbar-fixed-bottom footer" style="background-color: transparent;" role="navigation">
	<div class="container-fluid" >
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<button type="button" class="btn btn-warning btn-lg disabled" id="time"></button>
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
			<button type="button" class="btn btn-danger btn-lg disabled" style="align-items: center;"> 
				<?php
				date_default_timezone_set("Asia/Jakarta");
				echo " " . date("d:M:Y");
				?>
			</button>
		</div>
	</div>	
</nav>

<!-- =============== Bootstrap & datatables datepicker JavaScript ============== -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 
<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

		// timer jam refresh in detik
		function display_c(){
			var refresh=1000; // Refresh rate in milli seconds
			mytime=setTimeout('display_ct()',refresh)
		}
		function display_ct() {
			var x = new Date()
			var x1 =  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
			document.getElementById('time').innerHTML = x1;
			display_c();
		}

		$(document).ready(function(){
			// fungsi date picker tanggal mulai
			var datepickerss= $("#datepickerss");
			datepickerss.datepicker({ 
				startDate: "today",  
				todayHighlight: true
			}) 
	        // fungsi date picker tanggal selesai
	        datepickerss= $("#datepickers");
	        datepickerss.datepicker({    
	        	todayHighlight: true
	        })  

	        // deklarasi variabel tanggal sekarang
	        let today = new Date();
	        let currentMonth = today.getMonth();
	        let currentYear = today.getFullYear();

			//call function show all agenda berdasarkan bulan dan tahun 
			showAgendaandCalendar(currentMonth,currentYear); 

			// event click previous and next button month
			document.getElementById("previous").addEventListener("click",previous);
			document.getElementById("next").addEventListener("click",next);

			// fungsi next month
			function next() {
				currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
				currentMonth = (currentMonth + 1) % 12;
				showAgendaandCalendar(currentMonth, currentYear);
			}

			// fungsi previous month
			function previous() {
				currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
				currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
				showAgendaandCalendar(currentMonth, currentYear);
			}

	        //function show agenda berdasarkan bulan dan tahun
	        function showAgendaandCalendar(month,year){
	        	var agenda=null;
	        	var mm =(month+1);

	        	$.ajax({
	        		async: false,
	        		type : "POST",
	        		url   : '<?php echo base_url();?>index.php/Dc_controller/getDcSched',
	        		dataType : 'json',
	        		data : { 
	        			month_p:mm,
	        			year_p:year},

	        			success : function(data){ 
	        				var agend=[];
	        				var html='';

	        				for(i=0; i<data.length; i++){ 
	        					a=i+1;   
	                    	// mengkonversi tanggal yang akan ditampilkan
	                    	const tgl_a = new Date(data[i].date_plan);
	                    	var tgl_awal = ('0'+tgl_a.getDate()).slice(-2)+"/"+(parseInt(tgl_a.getMonth(), 10)+1)+"/"+tgl_a.getFullYear();
	                    	const tgl_b = new Date(data[i].end);
	                    	var tgl_ahir = tgl_b.getDate()+"/"+(parseInt(tgl_b.getMonth(), 10)+1)+"/"+tgl_b.getFullYear();

	                    	var ag = {
	                    		tanggal_a:tgl_a,
	                    		tanggal_b:tgl_b
	                        			// level:data[i].level
	                        		}
	                        // memasukkan data agenda kedalam array yang nantinya akan diolah untuk coloring calendar
	                        agend.push(ag);

	                        html += '<tr>';
	                        html +=	
	                        '<td hidden>'+data[i].id+'</td>'+
	                        '<td >'+data[i].nor+'-'+data[i].no+'</td>'+
		                            // '<td>'+data[i].rev+'</td>'+
		                            '<td>'+data[i].item_changes+'</td>'+
		                            '<td>'+data[i].line+'</td>'+
		                            '<td>'+tgl_awal+'</td>'+
		                            '<td>'+
		                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].id+'" data-nor="'+data[i].nor+'" data-no="'+data[i].no+'" data-item_changes="'+data[i].item_changes+'" data-line="'+data[i].line+'" data-date_plan="'+tgl_awal+'">Edit</a>   '+


		                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'" data-nor="'+data[i].nor+'" data-no="'+data[i].no+'">Hapus</a>'+
		                            '</td>'+
		                            '</tr>';
		                        } 
	                    // memasukkan data agenda lokal ke variabel agenda global
	                    agenda=agend;

	                    $("#agendaall").DataTable().destroy();
	                    $('tbody').empty();
	                    // memasukkan hatml agenda ke id tblagendakegiatan & set datatables
	                    $('#tbl_agendakegiatan').html(html);
	                    $("#agendaall").DataTable({
	                    	destroy:true,
	                    	"lengthMenu": [[5], [5]]
	                    }); 
	                }
	            });

	            // nama bulan calendarrr nya
	            const monthName = ["January","February","March","April","May","June","July","August","September","October","November","December"];

	            var html = '';
	            let today = new Date();
	            let currentMonth = month;
	            let currentYear = year;

	            document.getElementById("thismonth").innerHTML=""+monthName[currentMonth]+"&nbsp "+currentYear;

				// pembuatan tabel calendar
				let firstDay = (new Date(currentYear, currentMonth)).getDay();
				let daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

	        	// variabel tanggal dimulai tgl 1
	        	let date = 1;
	        	for (let i = 0; i < 6; i++) {
    				// creates a table row calendar
    				html+='<tr>';

	        		//creating individual cells, filing them up with data.
	        		for (let j = 0; j < 7; j++) {

	        			if (i === 0 && j < firstDay) {
	        				html+='<td>';
	        				html+='';
	        				html+='</td>';
	        			} else if (date > daysInMonth) {
	        				break;
	        			} else {	
			            		// variabel info agar tidak terjadi doubel
			            		var asign=null;

			            		// pengecekan calendar jika ada agenda di tanggal ini(date)
			            		for (var ia = (agenda.length-1); ia >=0 ; ia--) {
			            			for (var ib = 0; ib < agenda.length; ib++) {

			            				if (new Date(currentYear,currentMonth,date) >=agenda[ia].tanggal_a && new Date(currentYear,currentMonth,date)<=agenda[ia].tanggal_a) {
			            					
			            					// pemberian warna jika level bupati
			            					if (asign==null) {
			            						asign=1;
			            					}else if (asign==1) { 
			            						asign=2; 
			            					}else if (asign==2) { 
			            						asign=3; 
			            					}else if (asign==3) { 
			            						asign=4; 
			            					}else{ 
			            						asign=5;
			            					}

			            					break; 
			            				} 
			            			} 
			            		}

			            		// penentuan warna warna
			            		// 1 bupati normal
			            		// 3 bupati & kominfo
			            		// 2 jam parah (bupati dan kominfo)
			            		// 4 bupati parah (dua kali kegiatan)

			            		if (asign==null) {
			            			html+='<td style="border: 1px solid #dddddd;">'; 
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font>'+date+'</font>';
			            			}
			            			html+='</td>'; 
			            		}else if(asign==1){ 
			            			html+='<td bgcolor="#53ff1a">'; //1 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{ 
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==2){
			            			html+='<td bgcolor="#ffff66">'; //2 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==3){
			            			html+='<td bgcolor="#ffd633">'; //3 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==4){
			            			html+='<td bgcolor="#ff9933">'; //4 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==5){
			            			html+='<td bgcolor="#b36b00">'; //>=5 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}
   							// tanngal bertambah
   							date++;
   						}
   					}

   					html+='</tr>';	        		
   				} 
   				$('#calendarbody').html(html);  

   			}

//   ========================  Start ADD RECORD ====================================
	        //Save kegiatan baru
	        $('#formbaru').submit(function(e){
	        	        e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var nor 				= $('#nor').val();
        		var no 					= $('#no').val();
        		var line 				= $('#line').val();
        		var item_changes 		= $('#item_changes').val();
        		var date_plan 			= $('#date_plan').val();

        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Dc_controller/newDc",
        			dataType : "JSON",
        			data : {
        				nor:nor,
        				no:no,
        				line:line,
        				item_changes:item_changes,
        				date_plan:date_plan
        			},

        			success: function(){ 
        				$('#Modal_Add').modal('hide'); 
                        // method clear form & calendar agenda
                        refresh();
                    }
                });

        		return false;
        	});
//   ========================  END ADD RECORD ====================================


//  ===================  START UPDATE Record ===============================================
            //get data for UPDATE record show prompt
            $('#agendaall').on('click','.item_edit',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
            	var upid 			= $(this).data('id');
            	var upnor 			= $(this).data('nor'); 
            	var upno 			= $(this).data('no');
            	var upitem_changes	= $(this).data('item_changes'); 
            	var upline 			= $(this).data('line'); 
            	var update_plan 	= $(this).data('date_plan'); 

                // memasukkan data ke form updatean
                $('[name="u_id"]').val(upid);
                $('[name="u_nor"]').val(upnor);
                $('[name="u_no"]').val(upno);
                $('[name="u_item_changes"]').val(upitem_changes);
                $('[name="u_line"]').val(upline);
                $('[name="u_date_plan"]').val(update_plan);

                $('#Modal_Update').modal('show');
                
            });
            
            //UPDATE record to database (submit button)
            $('#formupdate').submit(function(e){
            	e.preventDefault(); 
        		// memasukkan data dari form update ke variabel untuk update db
        		var upid 			= $('#u_id').val();
        		var upnor 			= $('#u_nor').val();
        		var upno 			= $('#u_no').val();
        		var upline 			= $('#u_line').val();
        		var upitem_changes 	= $('#u_item_changes').val();
        		var update_plan 	= $('#u_date_plan').val();

        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Dc_controller/updateDc",
        			dataType : "JSON",
        			data : { 
        				id:upid,
        				nor:upnor,
        				no:upno,
        				item_changes:upitem_changes,
        				line:upline,
        				date_plan:update_plan,
        			},

        			success: function(data){
        				$('#Modal_Update').modal('hide'); 
        				refresh();
        			}
        		});
        		return false;
        	});
 //   ========================  END UPDATE RECORD ====================================



//  ===================  START Delete Record ===================================
            //get data for delete record show prompt modal
            $('#agendaall').on('click','.item_delete',function(){
            	var id = $(this).data('id');
            	var nor = $(this).data('nor'); 
            	var no = $(this).data('no'); 

            	$('#Modal_Delete').modal('show');
            	document.getElementById("msg").innerHTML='Nor-No: "'+nor+'-'+no+'"';

            	$('[name="deleteDcku"]').val(id);
            });

            //delete record to database
            $('#formdelete').submit(function(e){
            	        e.preventDefault(); 
            	var id = $('#deleteDcku').val();

            	$.ajax({
            		type : "POST",
            		url  : "<?php echo site_url(); ?>/Dc_controller/deleteDc",
            		dataType : "JSON",
            		data : {id:id},
            		success: function(){
            			$('[name="deleteDcku"]').val("");
            			$('#Modal_Delete').modal('hide'); 
            			refresh();
            		}
            	});
            	return false;
            });
 //   ==================  END DELETE RECORD ====================================


 		// fungsi refresh reset data all form dan calendar
 		function refresh() {
 			$("#agendaall").DataTable().destroy();
 			$('tbody').empty();
 			document.getElementById('formbaru').reset();
 			document.getElementById('formupdate').reset();
 			document.getElementById('formdelete').reset();

            showAgendaandCalendar(currentMonth,currentYear); //call function show all agenda 
        }



    });

//	========================== SHOW DETAIL ==========================
$('#agendaall').on('click','.item_detail',function(){
                //alert($(this).data('isi'));
                var id_dc 				= $(this).data('id_dc');
                var nor 				= $(this).data('nor');
                var no 					= $(this).data('no');
                var rev 				= $(this).data('rev');
                var item_changes 		= $(this).data('item_changes');
                var start				= new Date($(this).data('start'));
                var nstart				= ('0'+start.getDate()).slice(-2)+"/"+(parseInt(start.getMonth(), 10)+1)+"/"+start.getFullYear();
                var carline 			= $(this).data('carline');
                var de_epl 				= $(this).data('de_epl');
                var de_com 				= $(this).data('de_com');
                var de_eng 				= $(this).data('de_eng');
                var pp_swct 			= $(this).data('pp_swct');
                var pp_matrik 			= $(this).data('pp_matrik');
                var qp_swct 			= $(this).data('qp_swct');
                var qp_dwg 				= $(this).data('qp_dwg');
                var qmp_trial 			= $(this).data('qmp_trial');
                var qmp_vld_mat 		= $(this).data('qmp_vld_mat');
                var qmp_vld_jig 		= $(this).data('qmp_vld_jig');
                var eng_sao 			= $(this).data('eng_sao');
                var eng_housing 		= $(this).data('eng_housing');
                var eng_jig 			= $(this).data('eng_jig');
                var eng_matrik 			= $(this).data('eng_matrik');
                var eng_setting 		= $(this).data('eng_setting');
                var nys_kb_cct 			= $(this).data('nys_kb_cct');
                var nys_kb_material 	= $(this).data('nys_kb_material');
                var nys_mcl 			= $(this).data('nys_mcl');
                var prod_imp 			= $(this).data('prod_imp');
                var prod_pengosongan	= $(this).data('prod_pengosongan');
                var prod_karantina 		= $(this).data('prod_karantina');
                var prod_cutting 		= $(this).data('prod_cutting');
                var ppc_req 			= $(this).data('ppc_req');
                var ppc_release 		= $(this).data('ppc_release');

                document.getElementById("v_nor").value				=nor;  
                document.getElementById("v_no").value				=no;
                document.getElementById("v_rev").value				=rev;
                document.getElementById("v_item_changes").value		=item_changes;
                document.getElementById("v_start").value			=nstart;
                document.getElementById("v_carline").value			=carline;
                document.getElementById("v_de_epl").value			=de_epl;
                document.getElementById("v_de_com").value			=de_com;
                document.getElementById("v_de_eng").value			=de_eng;
                document.getElementById("v_pp_swct").value			=pp_swct;
                document.getElementById("v_pp_matrik").value		=pp_matrik;
                document.getElementById("v_qp_swct").value			=qp_swct;
                document.getElementById("v_qp_dwg").value			=qp_dwg;
                document.getElementById("v_qmp_trial").value		=qmp_trial;
                document.getElementById("v_qmp_vld_mat").value		=qmp_vld_mat;
                document.getElementById("v_qmp_vld_jig").value		=qmp_vld_jig;
                document.getElementById("v_eng_sao").value			=eng_sao;
                document.getElementById("v_eng_housing").value		=eng_housing;
                document.getElementById("v_eng_jig").value			=eng_jig;
                document.getElementById("v_eng_matrik").value		=eng_matrik;
                document.getElementById("v_eng_setting").value		=eng_setting;
                document.getElementById("v_nys_kb_cct").value		=nys_kb_cct;
                document.getElementById("v_nys_kb_material").value	=nys_kb_material;
                document.getElementById("v_nys_mcl").value			=nys_mcl;
                document.getElementById("v_prod_imp").value			=prod_imp;
                document.getElementById("v_prod_pengosongan").value	=prod_pengosongan;
                document.getElementById("v_prod_karantina").value	=prod_karantina;
                document.getElementById("v_prod_cutting").value		=prod_cutting;
                document.getElementById("v_ppc_req").value			=ppc_req;
                document.getElementById("v_ppc_release").value		=ppc_release;

            });

		// $('#update').click(function() { 
  //       $('#id_dc').prop('disabled', false);
  //       $('#Nor-No').prop('disabled', false);
  //       $('#v_rev').prop('disabled', false);
  //       $('#v_item_changes').prop('disabled', false);
  //       $('#v_start').prop('disabled', false);
  //       $('#v_carline').prop('disabled', false);
  //       $('#v_de_epl').prop('disabled', false);
  //       $('#v_de_eng').prop('disabled', false);
  //       $('#v_de_com').prop('disabled', false);
  //       $('#v_nys_kb_material').prop('disabled', false);
  //       $('#v_nys_kb_cct').prop('disabled', false);
  //       $('#v_nys_mcls').prop('disabled', false);
  //       $('#v_pp_swct').prop('disabled', false);
  //       $('#v_pp_matrik').prop('disabled', false);
  //       $('#v_qp_swct').prop('disabled', false);
  //       $('#v_qp_dwg').prop('disabled', false);
  //       $('#v_ppc_req').prop('disabled', false);
  //       $('#v_ppc_release').prop('disabled', false);
  //       $('#v_prod_imp').prop('disabled', false);
  //       $('#v_prod_karantina').prop('disabled', false);
  //       $('#v_prod_cutting').prop('disabled', false);
  //       $('#v_prod_pengosongan').prop('disabled', false);
  //       $('#v_qmp_trial').prop('disabled', false);
  //       $('#v_qmp_vld_mat').prop('disabled', false);
  //       $('#v_qmp_vld_jig').prop('disabled', false);
  //       $('#v_eng_sao').prop('disabled', false);
  //       $('#v_eng_housing').prop('disabled', false);
  //       $('#v_eng_jig').prop('disabled', false);
  //       $('#v_eng_matrik').prop('disabled', false);
  //       $('#v_eng_setting').prop('disabled', false);
  //   	});

  //       $('#detail').click(function() { 
  //       $('#id_dc').prop('disabled', true);
  //       $('#Nor-No').prop('disabled', true);
  //       $('#v_rev').prop('disabled', true);
  //       $('#v_item_changes').prop('disabled', true);
  //       $('#v_start').prop('disabled', true);
  //       $('#v_carline').prop('disabled', true);
  //       $('#v_de_epl').prop('disabled', true);
  //       $('#v_de_eng').prop('disabled', true);
  //       $('#v_de_com').prop('disabled', true);
  //       $('#v_nys_kb_material').prop('disabled', true);
  //       $('#v_nys_kb_cct').prop('disabled', true);
  //       $('#v_nys_mcls').prop('disabled', true);
  //       $('#v_pp_swct').prop('disabled', true);
  //       $('#v_pp_matrik').prop('disabled', true);
  //       $('#v_qp_swct').prop('disabled', true);
  //       $('#v_qp_dwg').prop('disabled', true);
  //       $('#v_ppc_req').prop('disabled', true);
  //       $('#v_ppc_release').prop('disabled', true);
  //       $('#v_prod_imp').prop('disabled', true);
  //       $('#v_prod_karantina').prop('disabled', true);
  //       $('#v_prod_cutting').prop('disabled', true);
  //       $('#v_prod_pengosongan').prop('disabled', true);
  //       $('#v_qmp_trial').prop('disabled', true);
  //       $('#v_qmp_vld_mat').prop('disabled', true);
  //       $('#v_qmp_vld_jig').prop('disabled', true);
  //       $('#v_eng_sao').prop('disabled', true);
  //       $('#v_eng_housing').prop('disabled', true);
  //       $('#v_eng_jig').prop('disabled', true);
  //       $('#v_eng_matrik').prop('disabled', true);
  //       $('#v_eng_setting').prop('disabled', true);
  //   });

</script>

</body>
</html>