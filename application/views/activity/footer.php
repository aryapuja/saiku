
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
            showmActivity();
	        
	        function showmActivity(){
    		$.ajax({
    		type  : 'POST',
    		url   : '<?php echo base_url()?>index.php/Dc_controller/getListActivity',
    		async : false,
    		dataType : 'json',
    		success : function(data){
    			var html = '';
    			var i;


    			for(i=0; i<data.length; i++){
    				var ii = i+1;
    				html += '<tr>'+
    				'<td hidden>'+data[i].id+'</td>'+
    				'<td>'+ii+'</td>'+
    				'<td>'+data[i].namaActivity+'</td>'+
    				'<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].id+'" data-nama="'+data[i].namaActivity+'" > <span class="fa fa-edit"></span> </a>'+ 
    				'     '+
    				'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'" data-nama="'+data[i].namaActivity+'"> <span class="fa fa-trash"></span> </a>'+
    				'</td>'+
    				'</tr>';
    			}
    			$('#listactivity').DataTable().destroy();
    			$('#listactivity').find('tbody').empty();
    			$('#tbl_act').html(html);
    			$('#listactivity').DataTable({
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

     //Save kegiatan baru
            $('#formaddact').submit(function(e){
                        e.preventDefault();
                // memasukkan data inputan ke variabel
                var namaActivity                 = $('#namaAct').val();

                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Dc_controller/newmActivity",
                    dataType : "JSON",
                    data : {
                        nama:namaActivity,
                    },

                    success: function(){ 
                        Swal.fire({
                            type: 'success',
                            title: 'Berhasil menambahkan data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#Modal_AddAct').modal('hide'); 
                        $("#listactivity").DataTable().destroy();
                        $("#listactivity").find('tbody').empty();
                        document.getElementById('formaddact').reset();
                        showmActivity();
                    }
                });

                return false;
            });

    //UPDATE MASTER to database (submit button)
    $('#listactivity').on('click','.item_edit',function(){
        // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
        var upid            = $(this).data('id');
        var upnama          = $(this).data('nama'); 


        // memasukkan data ke form updatean
        $('[name="u_id"]').val(upid);
        $('[name="u_namaact"]').val(upnama);

        // alert(upnama);
        $('#Modal_UpdatelistAct').modal('show');
    });
    
    //UPDATE MASTER to database (submit button)
    $('#formupdatelistAct').submit(function(e){
        e.preventDefault(); 
        // memasukkan data dari form update ke variabel untuk update db
        var up_id                = $('#u_id').val();
        var up_namaact 	      	 = $('#u_namaact').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/Dc_controller/updatemActivity",
            dataType : "JSON",
            data : { 
                uid:up_id,
                unama:up_namaact,
            },

            success: function(data){
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil memperbarui data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                $('#Modal_UpdatelistAct').modal('hide'); 
                $("#listactivity").DataTable().destroy();
                $("#listactivity").find('tbody').empty();
                document.getElementById('formupdatelistactivity').reset();
                showmActivity();
            }
        });
        return false;
    });

     $('#listactivity').on('click','.item_delete',function(){
    	var id = $(this).data('id');
    	var nama = $(this).data('nama'); 

    	$('#Modal_Deletelistact').modal('show');
    	document.getElementById("msg").innerHTML='Nama Activity: "'+nama+'"';
    	$('[name="id_del"]').val(id);
    });

    //delete record to database
    $('#formdeleteact').submit(function(e){
    	e.preventDefault(); 
    	var id = $('#id_del').val();

    	$.ajax({
    		type : "POST",
    		url  : "<?php echo site_url(); ?>/Dc_controller/deletemActivity",
    		dataType : "JSON",
    		data : {id:id},
    		success: function(){
    			$('[name="id_del"]').val("");
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil menghapus list activity ',
                            showConfirmButton: false,
                            timer: 1500
                        })
    			$('#Modal_Deletelistact').modal('hide'); 
    			$("#listactivity").DataTable().destroy();
                $("#listactivity").find('tbody').empty();
                document.getElementById('formdeleteact').reset();
                showmActivity();
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