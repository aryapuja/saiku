
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

		$(document).ready(function(){

			//call function show all agenda berdasarkan bulan dan tahun 
			refresh_notif();
            refresh_notif2();
            showAccount();
	        
	        function showAccount(){
    		$.ajax({
    		type  : 'POST',
    		url   : '<?php echo base_url()?>index.php/Dc_controller/getListUser',
    		async : false,
    		dataType : 'json',
    		success : function(data){
    			var html = '';
    			var i;
    			for(i=0; i<data.length; i++){
    				var ii = i+1;
    				status="";
    				status = data[i].status;
    				if(data[i].status == "off"){
    					cls="#FF0000";
    				}else if(data[i].status == "on"){
    					cls="#00FF00";
    				}else{
    					cls="#ffff1a";
    				}
    				html += '<tr>'+
    				'<td>'+ii+'</td>'+
    				'<td>'+data[i].name+'</td>'+
    				'<td>'+data[i].nik+'</td>'+
    				'<td>'+data[i].section+'</td>'+
    				'<td>'+data[i].jabatan+'</td>'+
    				'<td style="background-color:'+cls+';">'+data[i].status+'</td>'+
    				'<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit_user" data-id_user="'+data[i].id_user+'" data-name="'+data[i].name+'" data-nik="'+data[i].nik+'" data-section="'+data[i].section+'" data-jabatan="'+data[i].jabatan+'" data-password="'+data[i].password+'" data-status="'+data[i].status+'"> <span class="fa fa-edit"></span> </a>'+ 
    				'     '+
    				'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_user" data-id_user="'+data[i].id_user+'" data-name="'+data[i].name+'" data-section="'+data[i].section+'"> <span class="fa fa-trash"></span> </a>'+
    				'</td>'+
    				'</tr>';
    			}
    			$('#listuser').DataTable().destroy();
    			$('#listuser').find('tbody').empty();
    			$('#tbl_user').html(html);
    			$('#listuser').DataTable({
    				destroy			: true,
    				'autoWidth'   	: true,
    				'paging'		: true,
    				'lengthChange'	: true,
    				'searching'   	: true,
    				'ordering'    	: true,
    				'info'        	: true
    			});
    		}

    	});
    }

    //UPDATE MASTER to database (submit button)
    $('#listuser').on('click','.item_edit_user',function(){
        // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
        var upid            = $(this).data('id_user');
        var upname          = $(this).data('name'); 
        var upnik        	= $(this).data('nik'); 
        var upsection       = $(this).data('section');
        var upjabatan       = $(this).data('jabatan'); 
        var uppassword     	= $(this).data('password'); 
        var upstatus 	    = $(this).data('status'); 


        // memasukkan data ke form updatean
        $('[name="u_id"]').val(upid);
        $('[name="u_name"]').val(upname);
        $('[name="u_nik"]').val(upnik);
        $('[name="u_section"]').val(upsection);
        $('[name="u_jabatan"]').val(upjabatan);
        $('[name="u_password"]').val(uppassword);
        $('[name="u_status"]').val(upstatus);

        $('#Modal_Updatelist').modal('show');
    });
    
    //UPDATE MASTER to database (submit button)
    $('#formupdatelistuser').submit(function(e){
        e.preventDefault(); 
        // memasukkan data dari form update ke variabel untuk update db
        var up_id                = $('#u_id').val();
        var up_name      	 	 = $('#u_name').val();
        var up_nik      	 	 = $('#u_nik').val();
        var up_section        	 = $('#u_section').val();
        var up_jabatan           = $('#u_jabatan').val();
        var up_password         	 = $('#u_password').val();
        var up_status 	      	 = $('#u_status').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/Dc_controller/updateUser",
            dataType : "JSON",
            data : { 
                u_id:up_id,
                u_name:up_name,
                u_nik:up_nik,
                u_section:up_section,
                u_jabatan:up_jabatan,
                u_password:up_password,
                u_status:up_status,
            },

            success: function(data){
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil memperbarui data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                $('#Modal_Updatelist').modal('hide'); 
                $("#listuser").DataTable().destroy();
                $("#listuser").find('tbody').empty();
                document.getElementById('formupdatelistuser').reset();
                showAccount();
            }
        });
        return false;
    });

     $('#listuser').on('click','.item_delete_user',function(){
    	var id = $(this).data('id_user');
    	var name = $(this).data('name'); 
    	var section = $(this).data('section'); 

    	$('#Modal_Deleteuser').modal('show');
    	document.getElementById("msg").innerHTML='Nama: "'+name+'"-"'+section+'"';
    	$('[name="id_del"]').val(id);
    });

    //delete record to database
    $('#formdeleteuser').submit(function(e){
    	e.preventDefault(); 
    	var id = $('#id_del').val();

    	$.ajax({
    		type : "POST",
    		url  : "<?php echo site_url(); ?>/Dc_controller/deleteUser",
    		dataType : "JSON",
    		data : {id:id},
    		success: function(){
    			$('[name="id_del"]').val("");
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil menghapus user ',
                            showConfirmButton: false,
                            timer: 1500
                        })
    			$('#Modal_Deleteuser').modal('hide'); 
    			$("#listuser").DataTable().destroy();
                $("#listuser").find('tbody').empty();
                document.getElementById('formdeleteuser').reset();
                showAccount();
    		}
    	});
    	return false;
    });
//   ===============================  NOR ==========================================
});

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