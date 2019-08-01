
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

		$(document).ready(function(){

			refresh_notif();
            refresh_notif2();

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
			showAgendaandCalendar(currentDate,currentMonth,currentYear);
            showAct(currentDate,currentMonth,currentYear); 

			function next() {
				currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
				currentMonth = (currentMonth + 1) % 12;
				showAgendaandCalendar(currentDate,currentMonth, currentYear);
			}

			// fungsi previous month
			function previous() {
				currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
				currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
				showAgendaandCalendar(currentDate, currentMonth, currentYear);
			}

	        //function show NOR berdasarkan bulan dan tahun
	        function showAgendaandCalendar(day,month,year){
	        	var agenda=null;
	        	var mm =(month+1);
	        	// var dd =


	        	$.ajax({
	        		async: false,
	        		type : "POST",
	        		url   : '<?php echo base_url();?>index.php/User/getDcSchedUser',
	        		dataType : 'json',
	        		data : { 
	        			date_p:day,
	        			month_p:mm,
	        			year_p:year},

	        			success : function(data){
	        				var dataList = data.sch;
	        				// alert(data.cline2[0].jml);
	        				// lineku = data.cline;
	        				cline2 = data.cline2;
	        				na=data.na;
	        				// alert(JSON.stringify(data.na));
	        				// alert(cline2);
	        				 // alert(lineku2);
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
	                    	const tgl_a = new Date(dataList[i].nor_plan_imp);
	                    	var tgl_awal = (parseInt(tgl_a.getMonth(), 10)+1)+"/"+('0'+tgl_a.getDate()).slice(-2)+"/"+tgl_a.getFullYear();
	                    	const tgl_b = new Date(dataList[i].nor_plan_imp);
	                    	var tgl_awal2 = month[tgl_a.getMonth()]+", "+('0'+tgl_a.getDate()).slice(-2)+" "+tgl_a.getFullYear();

	                    	const tgl_c = new Date(dataList[i].nor_act_imp);
	                    	var tgl_awal3 = (parseInt(tgl_c.getMonth(), 10)+1)+"/"+('0'+tgl_c.getDate()).slice(-2)+"/"+tgl_c.getFullYear();
	                    	const tgl_d = new Date(dataList[i].nor_act_imp);
	                    	var tgl_awal4 = month[tgl_d.getMonth()]+", "+('0'+tgl_d.getDate()).slice(-2)+" "+tgl_d.getFullYear();


	                        status = "";
	                        if(dataList[i].count_nan == '0'){
	                        	status = "close";
	                        	cls="success";
	                        }else{
	                        	status = "open";
	                        	cls="danger";
	                        
	                        }
	                        var line = new Array();
	                        line[0]=dataList[i].line;
	                        line[1]=dataList[i].line2;
	                        line[2]=dataList[i].line3;
	                        line[3]=dataList[i].line4;
	                        line[4]=dataList[i].line5;
	                        a="";
	                        
	                        for (var b = 0; b < 5; b++) {
	                        	if (line[b] != null) {
		                        	if (b>0) {
										a+=","+line[b];	                        		
		                        	}else{
		                        		a+=line[b];
		                        	}
	                        	}

	                        }
	                        
	                        var ag = {
	                    		tanggal_a:tgl_a,
	                    		tanggal_b:tgl_b,
	                    		tanggal_c:tgl_c,
	                    		tanggal_d:tgl_d,
	                        	// line:line
	                        		}
	                        // memasukkan dataList agenda kedalam array yang nantinya akan diolah untuk coloring calendar
	                        agend.push(ag);

	                        html += '<tr>';
	                        html +=	
	                        '<td hidden>'+dataList[i].id+'</td>'+
	                        '<td >'+dataList[i].nor+'-'+dataList[i].no+'</td>'+
		                            // '<td>'+dataList[i].rev+'</td>'+
		                            '<td style="text-align: left;">'+dataList[i].item_changes+'</td>'+
	                        		'<td >'+a+'</td>'+
		                            '<td>'+tgl_awal2+'</td>'+
		                            // '<td><span class="badge badge-'+cls+'">'+status+'</span></td>'+
		                            
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
	                    	"order": [[ 1, "asc" ]],
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
				// alert(daysInMonth);
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
			            		var anu=new Date();
			            		var t=anu.setDate(anu.getDate() - 1);
			            		// alert(agenda.length) nilaine 0;
			            		// alert(cline2.length) jumlah e 31;
			            		// pengecekan calendar jika ada agenda di tanggal ini(date)
			            		for (var ia = (na.length); ia >=0 ; ia--) {
			            			for (var ib = 0; ib < na.length; ib++) {
				            				for (var iz = 0; iz < cline2.length; iz++) {
				            							// alert(cline2[iz].tgl);
						            					if (cline2[iz].tgl == date ) {
						            						asign=parseInt(cline2[iz].jml)+parseInt(cline2[iz].jml2)+parseInt(cline2[iz].jml3)+parseInt(cline2[iz].jml4)+parseInt(cline2[iz].jml5);
						            					}
				            				}
			            				
			            				 
			            			} 
			            		}
			            		// penentuan warna warna
			            		if (asign==null) {
			            			html+='<td style="border: 1px solid #dddddd;" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; 
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font color="black">'+date+'</font>';
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
			            			html+='<td bgcolor="#ffff1a" onclick="openDetailModal('+date+','+currentMonth+','+currentYear+')">'; //3 NOR
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
			            		}else{
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
	        function showAct(day,month,year){
	        	var agenda=null;
	        	var mm =(month+1);

	        	$.ajax({
	        		async: false,
	        		type : "POST",
	        		url   : '<?php echo base_url();?>index.php/User/getDcActUser',
	        		dataType : 'json',
	        		data : { 
	        			date_p:day,
	        			month_p:mm,
	        			year_p:year},

	        			success : function(data){ 
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

	        				for(i=0; i<data.length; i++){ 
	        					a=i+1;   
	                    	// mengkonversi tanggal yang akan ditampilkan
	                    	const tgl_a = new Date(data[i].ak_plan_imp);
	                    	var tgl_awal = month[tgl_a.getMonth()]+", "+('0'+tgl_a.getDate()).slice(-2)+" "+tgl_a.getFullYear();
	                    	const tgl_b = new Date(data[i].ak_act_imp);
	                    	var tgl_awal2 = month[tgl_b.getMonth()]+", "+('0'+tgl_b.getDate()).slice(-2)+" "+tgl_b.getFullYear();

	                    
	                    	const tgl_e = new Date(data[i].nor_plan_imp);
	                    	var tgl_awal5 = month[tgl_e.getMonth()]+", "+('0'+tgl_e.getDate()).slice(-2)+" "+tgl_e.getFullYear();

	                    	tanggal="";
	                    	if (data[i].ak_act_imp == "0000-00-00 00:00:00") {
	                    		tanggal="belum terimplementasi";
	                    	}else{
		                    	tanggal =  month[tgl_b.getMonth()]+", "+('0'+tgl_b.getDate()).slice(-2)+" "+tgl_b.getFullYear();
	                    	}

	                    	var ag = {
	                    		tanggal_a:tgl_a,
	                    		tanggal_b:tgl_b,
	                    		tanggal_e:tgl_e,

	                        			// level:data[i].level
	                        		}
	                        // memasukkan data agenda kedalam array yang nantinya akan diolah untuk coloring calendar
	                        agend.push(ag);

	                        html += '<tr>';
	                        html +=	
	                        '<td hidden>'+data[i].id+'</td>'+
	                        '<td >'+data[i].nor+'-'+data[i].no+'</td>'+
		                            // '<td>'+tgl_awal5+'</td>'+
		                            '<td>'+data[i].nama_dvs+'</td>'+
		                            '<td style="text-align: left;">'+data[i].nama_act+'</td>'+
		                            '<td>'+tgl_awal+'</td>'+
		                            '<td>'+tanggal+'</td>'+
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

    });

function openDetailModal(date,month,year) {
        	$.ajax({
        		url : "<?php echo site_url('User/getModalDetail') ?>",
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

        window.setInterval(function(){
        	refresh_notif();
        	refresh_notif2();
        	},5000);

        function refresh_notif() {
        	$.ajax({
            	url : "<?php echo site_url('Dc_controller/get_notif') ?>",
            	success : function(data){
            		if(data == "0"){
            			$('#notifaccount').addClass('badge-light');
            		}else{
            			$("#notifaccount").addClass('badge-danger');
            		}
            		$('#notifaccount').html(data);

            	}
            })
        }
        function refresh_notif2() {
        	$.ajax({
            	url : "<?php echo site_url('Dc_controller/get_notif2') ?>",
            	success : function(data){
            		if(data == "0"){
            			$('#notifaccount2').addClass('badge-light');
            		}else{
            			$("#notifaccount2").addClass('badge-danger');
            		}
            		$('#notifaccount2').html(data);
            	}
            })
        }
	
</script>
</body>
</html>