
<!-- navbar jam dan tanggal bottom -->

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
            showAct(currentMonth,currentYear); 

			// event click previous and next button month
			document.getElementById("previous").addEventListener("click",previous);
			document.getElementById("next").addEventListener("click",next);

			// fungsi next month
			function next() {
				currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
				currentMonth = (currentMonth + 1) % 12;
				showAgendaandCalendar(currentMonth, currentYear);
            	showAct(currentMonth,currentYear); 

			}

			// fungsi previous month
			function previous() {
				currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
				currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
				showAgendaandCalendar(currentMonth, currentYear);
            	showAct(currentMonth,currentYear); 
			}

	        //function show NOR berdasarkan bulan dan tahun
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
	        				// var d = new Date();
							var month = new Array();
							month[0] = "January";
							month[1] = "February";
							month[2] = "March";
							month[3] = "April";
							month[4] = "May";
							month[5] = "June";
							month[6] = "July";
							month[7] = "August";
							month[8] = "September";
							month[9] = "October";
							month[10] = "November";
							month[11] = "December";
							// var n = month[d.getMonth()];

	        				for(i=0; i<data.length; i++){ 
	        					a=i+1;   
	                    	// mengkonversi tanggal yang akan ditampilkan
	                    	const tgl_a = new Date(data[i].nor_plan_imp);
	                    	var tgl_awal = (parseInt(tgl_a.getMonth(), 10)+1)+"/"+('0'+tgl_a.getDate()).slice(-2)+"/"+tgl_a.getFullYear();
	                    	const tgl_b = new Date(data[i].nor_plan_imp);
	                    	var tgl_awal2 = month[tgl_a.getMonth()]+", "+('0'+tgl_a.getDate()).slice(-2)+" "+tgl_a.getFullYear();

	                    	const tgl_c = new Date(data[i].nor_act_imp);
	                    	var tgl_awal3 = (parseInt(tgl_c.getMonth(), 10)+1)+"/"+('0'+tgl_c.getDate()).slice(-2)+"/"+tgl_c.getFullYear();
	                    	const tgl_d = new Date(data[i].nor_act_imp);
	                    	var tgl_awal4 = month[tgl_d.getMonth()]+", "+('0'+tgl_d.getDate()).slice(-2)+" "+tgl_d.getFullYear();

	                    	var ag = {
	                    		tanggal_a:tgl_a,
	                    		tanggal_b:tgl_b,
	                    		tanggal_c:tgl_c,
	                    		tanggal_d:tgl_d

	                        			// level:data[i].level
	                        		}
	                        // memasukkan data agenda kedalam array yang nantinya akan diolah untuk coloring calendar
	                        agend.push(ag);

	                        html += '<tr>';
	                        html +=	
	                        '<td hidden>'+data[i].id+'</td>'+
	                        '<td >'+data[i].nor+'-'+data[i].no+'</td>'+
		                            // '<td>'+data[i].rev+'</td>'+
		                            '<td style="text-align: left;">'+data[i].item_changes+'</td>'+
		                            '<td>'+data[i].line+'</td>'+
		                            '<td>'+tgl_awal2+'</td>'+
		                            '<td>'+tgl_awal3+'</td>'+
		                            '<td>'+
		                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].id+'" data-nor="'+data[i].nor+'" data-no="'+data[i].no+'" data-item_changes="'+data[i].item_changes+'" data-line="'+data[i].line+'" data-nor_plan_imp="'+tgl_awal+'" data-nor_act_imp="'+tgl_awal3+'">Edit</a>   '+


		                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'" data-nor="'+data[i].nor+'" data-no="'+data[i].no+'">Hapus</a>'+
		                            '</td>'+
		                            '</tr>';
		                        } 
	                    // memasukkan data agenda lokal ke variabel agenda global
	                    agenda=agend;

	                    $("#agendaall").DataTable().destroy();
	                    $('#agendaall').find('tbody').empty();
	                    // memasukkan hatml agenda ke id tblagendakegiatan & set datatables
	                    $('#tbl_agendakegiatan').html(html);
	                    $("#agendaall").DataTable({
	                    	destroy:true,
	                    	"order": [[ 4, "asc" ]],
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
			            		if (asign==null) {
			            			html+='<td style="border: 1px solid #dddddd;"  onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; 
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font>'+date+'</font>';
			            			}
			            			html+='</td>'; 
			            		}else if(asign==1){ 
			            			html+='<td bgcolor="#1ab2ff" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; //1 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{ 
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==2){
			            			html+='<td bgcolor="#FFF8CD" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; //2 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==3){
			            			html+='<td bgcolor="#ffff1a"onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; //3 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==4){
			            			html+='<td bgcolor="#ffc54a" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; //4 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==5){
			            			html+='<td bgcolor="#ff7b24" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; //>=5 NOR
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

   			//function show Activity berdasarkan bulan dan tahun
	        function showAct(month,year){
	        	var agenda=null;
	        	var mm =(month+1);
	        	var month = new Array();
				month[0] = "January";
				month[1] = "February";
				month[2] = "March";
				month[3] = "April";
				month[4] = "May";
				month[5] = "June";
				month[6] = "July";
				month[7] = "August";
				month[8] = "September";
				month[9] = "October";
				month[10] = "November";
				month[11] = "December";

	        	$.ajax({
	        		async: false,
	        		type : "POST",
	        		url   : '<?php echo base_url();?>index.php/Dc_controller/getActSched',
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
	                    	const tgl_a = new Date(data[i].ak_plan_imp);
	                    	var tgl_awal = month[tgl_a.getMonth()]+", "+('0'+tgl_a.getDate()).slice(-2)+" "+tgl_a.getFullYear();
	                    	const tgl_b = new Date(data[i].ak_act_imp);
	                    	var tgl_awal2 = month[tgl_b.getMonth()]+", "+('0'+tgl_b.getDate()).slice(-2)+" "+tgl_b.getFullYear();

	                    	const tgl_c = new Date(data[i].ak_plan_imp);
	                    	var tgl_awal3 = (parseInt(tgl_c.getMonth(), 10)+1)+"/"+('0'+tgl_c.getDate()).slice(-2)+"/"+tgl_c.getFullYear();
	                    	const tgl_d = new Date(data[i].ak_act_imp);
	                    	var tgl_awal4 = (parseInt(tgl_d.getMonth(), 10)+1)+"/"+('0'+tgl_d.getDate()).slice(-2)+"/"+tgl_d.getFullYear();

	                    	var ag = {
	                    		tanggal_a:tgl_a,
	                    		tanggal_b:tgl_b,
	                    		tanggal_c:tgl_c,
	                    		tanggal_d:tgl_d,

	                        			// level:data[i].level
	                        		}
	                        // memasukkan data agenda kedalam array yang nantinya akan diolah untuk coloring calendar
	                        agend.push(ag);

	                        html += '<tr>';
	                        html +=	
	                        '<td hidden>'+data[i].id+'</td>'+
	                        '<td >'+data[i].nor+'-'+data[i].no+'</td>'+
		                            '<td>'+data[i].nama_dvs+'</td>'+
		                            '<td style="text-align: left;">'+data[i].nama_act+'</td>'+
		                            '<td>'+tgl_awal+'</td>'+
		                            '<td>'+tgl_awal2+'</td>'+
		                            '<td>'+
		                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit2" data-id="'+data[i].id+'" data-nor="'+data[i].nor+'" data-no="'+data[i].no+'" data-act="'+data[i].nama_act+'" data-dvs="'+data[i].nama_dvs+'" data-ak_plan_imp="'+tgl_awal3+'" data-ak_act_imp="'+tgl_awal4+'">Edit</a>   '+


		                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete2" data-id="'+data[i].id+'" data-nor="'+data[i].nor+'" data-no="'+data[i].no+'" data-act="'+data[i].nama_act+'">Hapus</a>'+
		                            '</td>'+
		                            '</tr>';
		                        } 
	                    // memasukkan data agenda lokal ke variabel agenda global
	                    agenda=agend;

	                    $("#agendaall2").DataTable().destroy();
	                    $('#agendaall2').find('tbody').empty();
	                    // memasukkan hatml activity ke id tblagendakegiatan & set datatables
	                    $('#tbl_agendaactivity').html(html);
	                    $("#agendaall2").DataTable({
	                    	destroy:true,
	                    	"order": [[ 1, "asc" ]],
	                    	"lengthMenu": [[5], [5]]
	                    }); 
	                }
	            });
   			}

//   ===============================  NOR ==========================================
//   ========================  Start ADD RECORD ====================================
	        //Save kegiatan baru
	        $('#formbaru').submit(function(e){
	        	        e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var nor 				= $('#nor').val();
        		var no 					= $('#no').val();
        		var line 				= $('#line').val();
        		var item_changes 		= $('#item_changes').val();
        		var nor_plan_imp 		= $('#nor_plan_imp').val();
        		var nor_act_imp 			= $('#nor_act_imp').val();

        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Dc_controller/newDc",
        			dataType : "JSON",
        			data : {
        				nor:nor,
        				no:no,
        				line:line,
        				item_changes:item_changes,
        				nor_plan_imp:nor_plan_imp,
        				nor_act_imp:nor_act_imp
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
            	var upnor_plan_imp 	= $(this).data('nor_plan_imp'); 
            	var upnor_act_imp 	= $(this).data('nor_act_imp'); 

                // memasukkan data ke form updatean
                $('[name="u_id"]').val(upid);
                $('[name="u_nor"]').val(upnor);
                $('[name="u_no"]').val(upno);
                $('[name="u_item_changes"]').val(upitem_changes);
                $('[name="u_line"]').val(upline);
                $('[name="u_nor_plan_imp"]').val(upnor_plan_imp);
                $('[name="u_nor_act_imp"]').val(upnor_act_imp);


                $('#Modal_Update').modal('show');
                
            });
            
            //UPDATE record to database (submit button)
            $('#formupdate').submit(function(e){
            	e.preventDefault(); 
        		// memasukkan data dari form update ke variabel untuk update db
        		var up_id 			= $('#u_id').val();
        		var up_nor 			= $('#u_nor').val();
        		var up_no 			= $('#u_no').val();
        		var up_line 			= $('#u_line').val();
        		var up_item_changes 	= $('#u_item_changes').val();
        		var up_nor_plan_imp 	= $('#u_nor_plan_imp').val();
        		var up_nor_act_imp 	= $('#u_nor_act_imp').val();

        		// alert(up_date_plan);

				// alert("id:"+up_id+"|nor:"+up_nor+"|no:"+up_no+"|lin:"+up_line+"|item:"+up_item_changes+"|date:"+up_date_plan);        		
        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Dc_controller/updateDc",
        			dataType : "JSON",
        			data : { 
        				u_id:up_id,
        				u_nor:up_nor,
        				u_no:up_no,
        				u_item_changes:up_item_changes,
        				u_line:up_line,
        				u_nor_plan_imp:up_nor_plan_imp,
        				u_nor_act_imp:up_nor_act_imp
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



//   ============================= ACTIVITY ========================================
//   ========================= Start ADD RECORD ====================================
	        //Save kegiatan baru
	        $('#add_activity').submit(function(e){
	        	e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var nor 				= $('#slct_nor').val();
        		var no 					= $('#slct_no').val();
        		var nama_dvs 			= $('#nama_dvs').val();
        		var nama_act 			= $('#nama_act').val();
        		var ak_plan_imp 			= $('#ak_plan_imp').val();
        		var ak_act_imp 		= $('#ak_act_imp').val();

        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Dc_controller/newActivity",
        			dataType : "JSON",
        			data : $('#add_activity').serialize(),

        			success: function(data){ 
        				$('#Modal_Add2').modal('hide'); 
                        // method clear form & calendar agenda
                        refresh2();
                    }
                });

        		return false;
        	});

        	$('#Modal_Add2').on('shown.bs.modal',function(){
        		$.ajax({
        			url: "<?php echo site_url(); ?>/Dc_controller/select_nor",
        			success : function(data){
        				$('#slct_nor').html(data);
        			}
        		});
        	});


//  ===================  START UPDATE Record ===============================================
            //get data for UPDATE record show prompt
            $('#agendaall2').on('click','.item_edit2',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
            	var upid 			= $(this).data('id');
            	var upnor 			= $(this).data('nor'); 
            	var upno 			= $(this).data('no');
            	var updvs			= $(this).data('dvs'); 
            	var upact 			= $(this).data('act'); 
            	var upak_plan_imp 	= $(this).data('ak_plan_imp'); 
            	var upak_act_imp 	= $(this).data('ak_act_imp'); 

                // memasukkan data ke form updatean
                $('[name="u_id_act"]').val(upid);
                $('[name="nor_act_up"]').val(upnor);
                $('[name="no_act_up"]').val(upno);
                $('[name="nama_act_up"]').val(upact);
                $('[name="nama_dvs_up"]').val(updvs);
                $('[name="ak_plan_imp_up"]').val(upak_plan_imp);
                $('[name="ak_act_imp_up"]').val(upak_act_imp);

                $('#Modal_Update2').modal('show');
                
            });
            
            //UPDATE record to database (submit button)
            $('#update_activity').submit(function(e){
            	e.preventDefault(); 
        		// memasukkan data dari form update ke variabel untuk update db
        		var up_id 			= $('#u_id_act').val();
        		var up_nor 			= $('#slct_nor_up').val();
        		var up_no 			= $('#slct_no_up').val();
        		var up_dvs 			= $('#nama_dvs_up').val();
        		var up_act 			= $('#nama_act_up').val();
        		var up_ak_plan_imp 	= $('#ak_plan_imp_up').val();
        		var up_ak_act_imp 	= $('#ak_act_imp_up').val();

        		// alert(up_date_plan);

				// alert("id:"+up_id+"|nor:"+up_nor+"|no:"+up_no+"|lin:"+up_line+"|item:"+up_item_changes+"|date:"+up_date_plan);        		
        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Dc_controller/updateActivity",
        			dataType : "JSON",
        			data : { 
        				u_id_act:up_id,
        				nor_act_up:up_nor,
        				no_act_up:up_no,
        				nama_dvs_up:up_dvs,
        				nama_act_up:up_act,
        				ak_plan_imp_up:up_ak_plan_imp,
        				ak_act_imp_up:up_ak_act_imp
        			},

        			success: function(data){
        				$('#Modal_Update2').modal('hide'); 
        				refresh();
        			}
        		});
        		return false;
        	});
//   ========================  END UPDATE RECORD ====================================

        	//  ===================  START Delete Activity ===================================
            //get data for delete record show prompt modal
            $('#agendaall2').on('click','.item_delete2',function(){
            	var id = $(this).data('id');
            	var nor = $(this).data('nor'); 
            	var no = $(this).data('no'); 
            	var activity = $(this).data('act'); 

            	$('#Modal_Delete2').modal('show');
            	document.getElementById("msg2").innerHTML=activity;
            	document.getElementById("msg3").innerHTML=nor+'-'+no;

            	$('[name="deleteActku"]').val(id);
            });

            //delete record to database
            $('#formdelete2').submit(function(e){
            	        e.preventDefault(); 
            	var id = $('#deleteActku').val();

            	$.ajax({
            		type : "POST",
            		url  : "<?php echo site_url(); ?>/Dc_controller/deleteActivity",
            		dataType : "JSON",
            		data : {id:id},
            		success: function(){
            			$('[name="deleteActku"]').val("");
            			$('#Modal_Delete2').modal('hide'); 
            			refresh();
            		}
            	});
            	return false;
            });
//   ==================  END DELETE Activity ====================================

 		// fungsi refresh reset data all form dan calendar
 		function refresh() {

 			$("#agendaall").DataTable().destroy();
 			$("#agendaall").find('tbody').empty();
 			$("#agendaall2").DataTable().destroy();
 			$("#agendaall2").find('tbody').empty();

 			document.getElementById('formbaru').reset();
 			document.getElementById('formupdate').reset();
 			document.getElementById('formdelete').reset();

            showAgendaandCalendar(currentMonth,currentYear);
            showAct(currentMonth,currentYear);
        }

        function refresh2() {

 			// document.location.reload('formbaru2'); 
 			$("#agendaall").DataTable().destroy();
 			$("#agendaall").find('tbody').empty();
 			$("#agendaall2").DataTable().destroy();
 			$("#agendaall2").find('tbody').empty();
 			document.getElementById('add_activity').reset();
 			// document.getElementById('update_activity').reset();
 			// document.getElementById('formdelete').reset();
 			// document.getElementById('add_activity').reset();
 			// document.getElementById('formupdate2').reset();
 			// document.getElementById('formdelete2').reset();

            showAgendaandCalendar(currentMonth,currentYear);
            showAct(currentMonth,currentYear);
        }



    });

	function openDetailModal(date,month,year) {
        	$.ajax({
        		url : "<?php echo site_url('Dc_controller/getModalDetail') ?>",
        		type : "POST",
        		data : {
        			'date' : date,
        			'month' : month,
        			'year' : year,
        		},
        		success : function(data){
        			$('#Modal_Detail2').find('.modal-content').html(data)
        			$('#Modal_Detail2').modal('show');

        		}
        	})
        }

</script>

</body>
</html>