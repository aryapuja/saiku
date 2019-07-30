<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?=base_url()?>assets/logoaja.png">
        <title>PT. SAI</title>

        <!-- fontawesome icon -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/fontawesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/fontawesome.css" /> 
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/all.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/css/all.css" crossorigin="anonymous"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/js/fontawesome.min.js" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/js/fontawesome.js" /> 
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/js/all.min.js" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/js/all.js" crossorigin="anonymous"/>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style_admin.css">
        <!-- datatables css & date picker -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/datatables.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker3.css">
        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
        
    </head>


    <body class="admin-body mb-3" onload=display_ct()>

        <!-- navigasi bar -->
        <nav class=" navbar navbar-expand-md navbar-dark bg-uno box-shadowf" role="" style="background:#EEE8AA; zoom:50%">
            <div class="container-fluid">
                <div class="navbar-header" style="color: #ffffff" href="#"> 
                    <img class ="navbar-brand" src="<?=base_url()?>assets/logoaja.png" width="75px" >
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainnavbar">
                    <ul class="navbar-nav mr-auto">             
                        <li class="nav-item active">
                            <a class="nav-link" href="#" style="font-size: 20px;color: black"><b>PT. SAI: Design Change Scheduling</b></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto ml-auto">
                        <li class="nav-item active">
                            <!-- <button type="button" class="btn btn-warning btn-lg disabled" id="time"></button> -->
                                <font>
                                    
                <?php
                date_default_timezone_set("Asia/Jakarta");
                echo " " . date("d:M:Y");
                ?>
                                </font>
                            <font id="time"></font>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto ml-auto">
                        <li class="nav-item active">
                            <!-- <button type="button" class="btn btn-info btn-lg disabled" style="align-items: center;"> --> 
            <!-- </button> -->
                        </li>
                    </ul>
                    <div class="btn-group" role="group" aria-label="Data baru">
                         <a class="btn-group btn btn-success" href="<?php echo base_url().'/index.php/Login'?>" >LOGIN</a>
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
                <h5 class="modal-title" id="judul_p"><b> LOGIN ADMIN </b></h5>      
              </div>
    
              <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlTextarea3" id="tanggal_m">Apakah yakin ingin keluar ?</label>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default col-md-3" data-dismiss="modal" aria-label="Close">Batal</button>
                <?php echo anchor('login/logout', 'Keluar', array('class' => 'btn btn-danger col-md-3')); ?>
              </div>

            </div>
          </div>
        </div>  
    </form>
