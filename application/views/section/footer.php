
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
			<button type="button" class="btn btn-info btn-lg disabled" style="align-items: center;"> 
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
<script src="<?php echo base_url() ?>assets/js/sweetalert2@8.js"></script>


<script type="text/javascript">
		var lineku = null;
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

		$(document).ready(function(data){
			refresh_notif();
			var section=data.section;

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
	        let currentDate = today.getDate();
	        let currentMonth = today.getMonth();
	        let currentYear = today.getFullYear();

			//call function show all agenda berdasarkan bulan dan tahun 
			showAgendaandCalendar(currentMonth,currentYear,section);
            // showAct(currentDate,currentMonth,currentYear); 

			// event click previous and next button month
			document.getElementById("previous").addEventListener("click",previous);
			document.getElementById("next").addEventListener("click",next);

			// fungsi next month
			function next() {
				currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
				currentMonth = (currentMonth + 1) % 12;
				showAgendaandCalendar(currentMonth, currentYear, section);
			}

			// fungsi previous month
			function previous() {
				currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
				currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
				showAgendaandCalendar(currentMonth, currentYear, section);
			}

	        //function show NOR berdasarkan bulan dan tahun
	        function showAgendaandCalendar(month,year,section){
	        	var agenda=null;
	        	var mm =(month+1);
	        	// var dd =


	        	$.ajax({
	        		async: false,
	        		type : "POST",
	        		url   : '<?php echo base_url();?>index.php/Section/getSectionSched',
	        		dataType : 'json',
	        		data : { 
	        			month_p:mm,
	        			year_p:year,
	        			section:section
	        		},

	        			success : function(data){
	        				var dataList = data.act;
	        				actt = data.cact;
	        				// cline2 = data.cline2;
	        				// alert(actt);
	        				var agend=[];
	        				var html='';
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

	        				for(i=0; i<dataList.length; i++){ 
	        					a=i+1;   
	                    	// mengkonversi tanggal yang akan ditampilkan
	                    	const tgl_a = new Date(dataList[i].ak_act_imp);
	                    	var tgl_awal = (parseInt(tgl_a.getMonth(), 10)+1)+"/"+('0'+tgl_a.getDate()).slice(-2)+"/"+tgl_a.getFullYear();
	                    	
	                    	const tgl_b = new Date(dataList[i].ak_plan_imp);
	                    	var tgl_awal2 = month[tgl_b.getMonth()]+", "+('0'+tgl_b.getDate()).slice(-2)+" "+tgl_b.getFullYear();

	                    	const tgl_c = new Date(dataList[i].ak_act_imp);
	                    	var tgl_awal3 = month[tgl_c.getMonth()]+", "+('0'+tgl_c.getDate()).slice(-2)+" "+tgl_c.getFullYear();

	                    	const tgl_d = new Date(dataList[i].ak_plan_imp);
	                    	var tgl_awal4 = (parseInt(tgl_d.getMonth(), 10)+1)+"/"+('0'+tgl_d.getDate()).slice(-2)+"/"+tgl_d.getFullYear();

	                    	tanggal="";
	                    	if (dataList[i].ak_act_imp == "0000-00-00 00:00:00") {
	                    		tanggal="belum terimplementasi";
	                    	}else{
		                    	tanggal =  month[tgl_c.getMonth()]+", "+('0'+tgl_c.getDate()).slice(-2)+" "+tgl_c.getFullYear();
	                    	}

	                    	btn="";
	                    	color="";
	                    	if (dataList[i].astatus == "not updated") {
	                    		color='<span class="badge badge-secondary">'+dataList[i].astatus+'</span>';
	                    		btn='<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+dataList[i].idact+'" data-nor="'+dataList[i].nor+'" data-no="'+dataList[i].no+'" data-nama_act="'+dataList[i].nama_act+'" data-line="'+dataList[i].line+'" data-ak_plan_imp="'+tgl_awal4+'" data-ak_act_imp="'+tgl_awal+'">Update</a>';
	                    	}else if(dataList[i].astatus == "waiting"){
	                    		color='<span class="badge badge-warning">'+dataList[i].astatus+'</span>';
	                    		btn='<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+dataList[i].idact+'" data-nor="'+dataList[i].nor+'" data-no="'+dataList[i].no+'" data-nama_act="'+dataList[i].nama_act+'" data-line="'+dataList[i].line+'" data-ak_plan_imp="'+tgl_awal4+'" data-ak_act_imp="'+tgl_awal+'">Update</a>';
	                    	}else if(dataList[i].astatus =="verified"){
	                    		color='<span class="badge badge-success">'+dataList[i].astatus+'</span>';
	                    		btn='<a href="javascript:void(0);" class="btn btn-success btn-sm item_edit disabled" data-id="'+dataList[i].idact+'" data-nor="'+dataList[i].nor+'" data-no="'+dataList[i].no+'" data-nama_act="'+dataList[i].nama_act+'" data-line="'+dataList[i].line+'" data-ak_plan_imp="'+tgl_awal4+'" data-ak_act_imp="'+tgl_awal+'"><span class="form-check-label"></span>Done</a>';
	                    	}


	                    	var ag = {
	                    		tanggal_a:tgl_a,
	                    		tanggal_b:tgl_b,
	                    		tanggal_c:tgl_c,
	                    		tanggal_d:tgl_d,
	                    		// status:status
	                        	}
	                        // memasukkan dataList agenda kedalam array yang nantinya akan diolah untuk coloring calendar
	                        agend.push(ag);

	                        html += '<tr>';
	                        html +=	
	                        '<td hidden>'+dataList[i].idact+'</td>'+
	                        '<td >'+dataList[i].nor+'-'+dataList[i].no+'</td>'+
		                            // '<td>'+dataList[i].rev+'</td>'+
		                            '<td style="text-align: left;">'+dataList[i].nama_act+'</td>'+
		                            '<td>'+dataList[i].line+'</td>'+
		                            '<td>'+tgl_awal2+'</td>'+
		                            '<td>'+color+'</td>'+
		                            '<td>'+tanggal+'</td>'+
		                            // '<td><span class="badge badge-'+cls+'">'+status+'</span></td>'+
		                            '<td>'+
		                            btn+
		                            // '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" dataList-id="'+dataList[i].id+'" dataList-nor="'+dataList[i].nor+'" dataList-no="'+dataList[i].no+'">Hapus</a>'+
		                            '</td>'+
		                            '</tr>';
		                        } 
	                    // memasukkan dataList agenda lokal ke variabel agenda global
	                    agenda=agend;

	                    $("#agendaall").DataTable().destroy();
	                    $('#agendaall').find('tbody').empty();
	                    // memasukkan hatml agenda ke id tblagendakegiatan & set datatables
	                    $('#tbl_agendakegiatan').html(html);
	                    $("#agendaall").DataTable({
	                    	destroy:true,
	                    	"ordering": true,
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
	        				// html+='<td>';
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

			            				for (var iz = 0; iz < actt.length; iz++) {
			            					if (actt[iz].tgl == date) {
			            						asign=actt[iz].jml;
			            					}
			            				}

			            				if (new Date(currentYear,currentMonth,date) >= agenda[ia].tanggal_d && new Date(currentYear,currentMonth,date)<=agenda[ia].tanggal_d) { 
			            					
			            				} 
			            			} 
			            		}
			            		// penentuan warna warna
			            		if (asign==null) {
			            			html+='<td style="border: 1px solid #dddddd;" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+','+section+')">'; 
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font color="black">'+date+'</font>';
			            			}
			            			html+='</td>'; 
			            		}else if(asign==1){ 
			            			html+='<td bgcolor="#1ab2ff" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+','+section+')">'; //1 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{ 
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==2){
			            			html+='<td bgcolor="#FFF8CD" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+','+section+')">'; //2 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==3){
			            			html+='<td bgcolor="#ffff1a" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+','+section+')">'; //3 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign==4){
			            			html+='<td bgcolor="#ffc54a" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+','+section+')">'; //4 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else if(asign >= 5){
			            			html+='<td bgcolor="#ff7b24" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+','+section+')">'; //>=5 NOR
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #000;">'+date+'</font>';
			            			}
			            			html+='</td>';
			            		}else{
			            			html+='<td style="border: 1px solid #dddddd;" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+','+section+')">'; 
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font color="black">'+date+'</font>';
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

//   ===============================  NOR ==========================================
//  ===================  START UPDATE Record ===============================================
            //get data for UPDATE record show prompt
            $('#agendaall').on('click','.item_edit',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
            	var upid 			= $(this).data('id');
            	var upnor 			= $(this).data('nor'); 
            	var upno 			= $(this).data('no');
            	var upactivity		= $(this).data('nama_act'); 
            	var upline 			= $(this).data('line'); 
            	var upak_plan_imp 	= $(this).data('ak_plan_imp'); 
            	var upak_act_imp 	= $(this).data('ak_act_imp'); 

                // memasukkan data ke form updatean
                $('[name="u_id"]').val(upid);
                $('[name="u_nor"]').val(upnor);
                $('[name="u_no"]').val(upno);
                $('[name="u_nama_act"]').val(upactivity);
                $('[name="u_line"]').val(upline);
                $('[name="u_ak_plan_imp"]').val(upak_plan_imp);
                $('[name="u_ak_act_imp"]').val(upak_act_imp);

                $('#Modal_Update').modal('show');

            });
            
            //UPDATE record to database (submit button)
            $('#update_activity').submit(function(e){
            	e.preventDefault(); 
        		// memasukkan data dari form update ke variabel untuk update db
        		var up_id 			= $('#u_id').val();
        		var up_nor 			= $('#u_nor').val();
        		var up_no 			= $('#u_no').val();
        		var up_line 		= $('#u_line').val();
        		var up_nama_act 	= $('#u_nama_act').val();
        		var up_ak_plan_imp 	= $('#u_ak_plan_imp').val();
        		var up_ak_act_imp 	= $('#u_ak_act_imp').val();

        		// alert(up_date_plan);

				// alert("id:"+up_id+"|nor:"+up_nor+"|no:"+up_no+"|lin:"+up_line+"|item:"+up_item_changes+"|date:"+up_date_plan);        		
        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Section/updateSection",
        			dataType : "JSON",
        			data : { 
        				u_id:up_id,
        				u_ak_act_imp:up_ak_act_imp
        			},

        			success: function(data){
        				Swal.fire({
        					type: 'success',
        					title: 'Berhasil mengupdate implementasi actual',
        					showConfirmButton: false,
        					timer: 1500
        				})
        				$('#Modal_Update').modal('hide'); 
        				refresh();
        			}
        		});
        		return false;
        	});
//   ========================  END UPDATE RECORD ====================================
		$('#formchangepass').submit(function(e){
	        	e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var passold 			= $('#passold').val();
        		var passnew 			= $('#passnew').val();
        		var passnew2			= $('#passnew2').val();
        		
        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Section/changePassword",
        			dataType : "JSON",
        			data : {
        				passold:passold,
        				passnew:passnew,
        				passnew2:passnew2,
        			},

        			success: function(data){ 
        				alert(data.code);
        				if (data.code == 1) {
        					Swal.fire({
        						type: 'error',
        						title: 'Ada Kesalahan',
        						text: 'Password Lama Tidak Sesuai',
        					})
        				}else if (data.code == 2) {
        					Swal.fire({
        						type: 'error',
        						title: 'Ada Kesalahan',
        						text: 'Konfirmasi Password Baru Tidak Cocok',
        					})
        				}else{
	        				Swal.fire({
	        					type: 'success',
	        					title: 'Berhasil mengubah password ',
	        					showConfirmButton: false,
	        					timer: 1500
	        				})
	        				$('#Modal_changepass').modal('hide'); 
	                        // method clear form & calendar agenda
	 						document.getElementById('formchangepass').reset();

        				}
                    }
                });

        		return false;
        	});

function refresh() {

 			$("#agendaall").DataTable().destroy();
 			$("#agendaall").find('tbody').empty();

 			document.getElementById('update_activity').reset();

            showAgendaandCalendar(currentMonth,currentYear,section);
        }
    });

window.setInterval(function(){
        	refresh_notif();
        	},5000);

        function refresh_notif() {
        	$.ajax({
            	url : "<?php echo site_url('Section/get_notif') ?>",
            	success : function(data){
            		if(data == "0"){
            			$('#notifsection').addClass('badge-light');
            		}else{
            			$("#notifsection").addClass('badge-danger');
            		}
            		$('#notifsection').html(data);
            	}
            })
        }


function openDetailModal(date,month,year,section) {
        	$.ajax({
        		url : "<?php echo site_url('Section/getModalDetail') ?>",
        		type : "POST",
        		data : {
        			'date' : date,
        			'month' : month,
        			'year' : year,
        		},
        		success : function(data){
        			$('#Modal_Detail').find('.modal-content').html(data)
        			$('#Modal_Detail').modal('show');

        		}
        	})
        }
	
</script>

</body>
</html>