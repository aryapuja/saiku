
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

	function downloadExcel() {
        var nor = document.getElementById("slct_nor").value;
        var no = document.getElementById("slct_no").value;
        var nor2 = nor.replace(" ","_");
        var no2 = no.replace(" ","_");
        const regex = new RegExp(',', 'g');
        var no3=no2.replace(regex, '-');
        // alert(nor,no);
        var myUrl = "<?php echo site_url(); ?>/Dc_controller/exportNor/"+nor2+"/"+no3;
        // alert(myUrl);
        window.location = myUrl;
    }
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
			<?php if($this->session->flashdata('gagal_download')): ?>
				Swal.fire({
					type: 'warning',
					title: 'Ada Kesalahan',
					text: 'Berkas tidak dapat di download dikarenakan status NOR masih On Progress/Open',
        				})
			<?php endif; ?>
			//call function show all agenda berdasarkan bulan dan tahun 
			refresh_notif();
			refresh_notif2();
			showPreview();

			function showPreview(nor,no){
				if (nor == null && no==null) {
					nor="";
					no="";
				}

				$.ajax({
					type  : 'POST',
					url   : '<?php echo base_url()?>index.php/Dc_controller/previewNor',
					async : false,
					dataType : 'json',
					data : {
						nor:nor,
						no:no,
					},
					success : function(data){
						var html = '';
						var i;
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
                // alert(JSON.stringify(data));
                
                for(i=0; i<data.length; i++){
                	var ii = i+1;
                // alert(data[i].ak_plan_imp);
                const tgl_a = new Date(data[i].ak_plan_imp);
                var tgl_awal = month[tgl_a.getMonth()]+", "+('0'+tgl_a.getDate()).slice(-2)+" "+tgl_a.getFullYear();
                const tgl_b = new Date(data[i].ak_act_imp);
                var tgl_awal2 = month[tgl_b.getMonth()]+", "+('0'+tgl_b.getDate()).slice(-2)+" "+tgl_b.getFullYear();

                tanggal="";
                if (data[i].ak_act_imp == "0000-00-00 00:00:00") {
                	tanggal="belum terimplementasi";
                }else{
                	tanggal =  month[tgl_b.getMonth()]+", "+('0'+tgl_b.getDate()).slice(-2)+" "+tgl_b.getFullYear();
                }

                html += '<tr>';
                html +=	
	                        // '<td hidden>'+data[i].id+'</td>'+
	                        '<td >'+data[i].nama_dvs+'</td>'+
	                        '<td >'+data[i].nama_act+'</td>'+
	                        '<td style="text-align: center;">'+tgl_awal+'</td>'+
	                        '<td style="text-align: center;">'+tanggal+'</td>'+
	                        '</tr>';
	                    }
	                    $('#dataNor').DataTable().destroy();
	                    $('#dataNor').find('tbody').empty();
	                    $('#tbl_preview').html(html);
	                    $('#dataNor').DataTable({
	                    	destroy         : true,
	                    	'autoWidth'     : true,
	                    	'searching'     : true,
	                    	'info'          : true,
	                    	'paging'        : true,
	                    	'lengthChange'  : true,
	                    	'ordering'      : true,

	                    });
	                }
	            });
			}

			$('#downloadnor').submit(function(e){
				e.preventDefault();
        // memasukkan data inputan ke variabel
        var nor 	 = $('#slct_nor').val();
        var no       = $('#slct_no').val();
        $.ajax({
        	type : "POST",
        	url  : "<?php echo site_url(); ?>/Dc_controller/previewNor",
        	dataType : "JSON",
        	data : {
        		nor:nor,
        		no:no
        	},
        	success: function(data){
        		showPreview(nor,no);
        	}
        });
        return false;
    });

		});

		window.setInterval(function(){
			refresh_notif();
			refresh_notif2();
		},2000);

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