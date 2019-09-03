<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=base_url()?>assets/1.png">
    <title>PT. SAI</title>

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/fontawesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/fontawesome.css" /> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/all.css" crossorigin="anonymous"/>
    <script src="<?php echo base_url() ?>assets/fa/js/fontawesome.min.js"></script>
    <script src="<?php echo base_url() ?>assets/fa/js/fontawesome.js"></script>
    <script src="<?php echo base_url() ?>assets/fa/js/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/fa/js/all.js"></script>

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dropify.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dropify.min.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
            <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style_admin.css">
            <!-- datatables css & date picker -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/datatables.min.css"> 
            <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker3.css">
            <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/dropify.js"></script>
            <script src="<?php echo base_url() ?>assets/js/dropify.min.js"></script>
<!--             <script src="<?php echo base_url() ?>assets/fonts/dropify.woff"></script>
            <script src="<?php echo base_url() ?>assets/fonts/dropify.ttf"></script> -->

        </head>
        <style>
            body {
              padding-right: 0 !important;
          }
      </style>


      <body class="admin-body" onload="display_ct()">

        <!-- navigasi bar -->
        <nav class=" navbar navbar-expand-md navbar-light" role="" style="background:#EEE8AA">
            <div class="container-fluid">
                <div class="navbar-header" style="color: #ffffff" href="#"> 
                    <img class ="navbar-brand" src="<?=base_url()?>assets/logoaja.png" width="80px">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainnavbar">
                    <ul class="navbar-nav mr-auto" id="nav">             
                        <li class="nav-item ">
                           <a class="nav-link" href="<?php echo base_url().'index.php/Dc_controller'?>" >Admin View <sup><span class="badge" id="notifaccount2"></span></sup></a>
                       </li>
                       <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url().'index.php/Dc_controller/dataNor'?>" >Download Nor</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url().'index.php/Dc_controller/listUser'?>" >Daftar Akun <sup><span class="badge" id="notifaccount"></span></sup></a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url().'index.php/Dc_controller/listActivity'?>" >Master Activity</a>
                        </li> -->
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url().'index.php/Dc_controller/indexx'?>" >Preview</a>
                        </li>
                    </ul>
<!--                     <div class="btn-group" role="group" aria-label="Data baru">
                        <a class="btn-group btn btn-danger" href="<?php echo base_url().'index.php/Login/logout'?>" >LOGOUT</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#Modal_profile">Change Profile</a>
                              <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#Modal_changepass">Change Password</a>
                              <a class="dropdown-item" href="<?php echo base_url().'index.php/Login/logout'?>">Logout</a>
                          </div>
                    </div> -->
                    <div class="dropdown" style="padding-right: 0px">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 15px;color: black">
                              <!-- <font id="sessionku"></font> --><span class="fa fa-bars"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                              <!-- <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#Modal_profile">Change Profile</a> -->
                              <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#Modal_delall">Delete All Data</a>
                              <a class="dropdown-item" href="<?php echo base_url().'index.php/Login/logout'?>">Logout</a>
                          </div>
                    </div>
                </div>
            </div>
        </nav>
        
<!-- Modal Keluar -->
<form id="form_keluar">
    <div class="modal fade" id="modal_keluar" style="background-color:currentColor; " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="judul_p"><b> Peringatan !! </b></h5>      
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlTextarea3" id="tanggal_m">Apakah yakin ingin keluar ?</label>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default col-md-3" data-dismiss="modal" aria-label="Close">Batal</button>
            <?php echo anchor('Login/logout', 'Keluar', array('class' => 'btn btn-danger col-md-3')); ?>
        </div>

    </div>
</div>
</div>  
</form>

<form id="formdeleteall">
        <div class="modal fade" id="Modal_delall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                       
                    </div>
                    <div class="modal-body">               
                        <div class="container-fluid">   
                            <div class="row">        
                                <!-- form inputan nama kegiatan -->
                                <div class="form-group col-lg-12 ">
                                    <b><font>Apa anda yakin ingin menghapus semua data?</font><br>
                                    <font>(hanya data Nor dan Activity)</font></b>
                                </div>
                                <div class="modal-footer">
                                    <!-- inputan button simpan dan Cancel -->
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                                    <button type="submit" id="btn_push" class="btn btn-danger ">Delete All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

<script type="text/javascript">
    $(function() {
    $('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
});
</script>