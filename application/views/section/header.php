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


    <body class="admin-body" onload=display_ct()>

        <!-- navigasi bar -->
        <nav class=" navbar navbar-expand-md navbar-dark bg-uno box-shadowf"role="" style="background:#EEE8AA">
            <div class="container-fluid">
                <div class="navbar-header" style="color: #ffffff" href="#"> 
                    <img class ="navbar-brand" src="<?=base_url()?>assets/logoaja.png" width="75px">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainnavbar">
                    <ul class="navbar-nav mr-auto">             
                        <li class="nav-item active">
                            <a class="nav-link" href="#" style="font-size: 15px;color: black">STATUS LOGIN: <?php echo strtoupper($this->session->section) ?> SECTION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'index.php/Section'?>" style="font-size: 15px;color: black">Activity <sup><span class="badge" id="notifsection"></span></sup> </a>
                        </li>
                    </ul>
                    <div class="dropdown" style="padding-right: 0px">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 15px;color: black">
                              <?php echo strtoupper($this->session->name) ?>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#Modal_changepass">Change Password</a>
                              <a class="dropdown-item" href="<?php echo base_url().'index.php/Login/logout'?>">Logout</a>
                          </div>
                    </div>
<!--                     <div class="btn-group" role="group" aria-label="Data baru">
                        <a class="btn-group btn btn-danger" href="<?php echo base_url().'/index.php/Login/logout'?>" >LOGOUT</a>
                    </div> -->
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
                <?php echo anchor('login/logout', 'Keluar', array('class' => 'btn btn-danger col-md-3')); ?>
              </div>

            </div>
          </div>
        </div>  
    </form>
    <form id="formchangepass">
        <div class="modal fade" id="Modal_changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                       
                    </div>
                    <div class="modal-body">               
                        <div class="container-fluid">   
                            <div class="row">        
                                <!-- form inputan nama kegiatan -->
                                <div class="form-group col-lg-12 ">
                                    <div class="col-lg-12">
                                        <label>Password Lama</label>
                                        <input type="password" id="passold" class="form-control" minlength="6" placeholder="Masukkan Password Lama" style="width: 100%" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Password Baru</label>
                                        <input type="password" id="passnew" class="form-control" minlength="6" placeholder="Masukkan Password Baru" style="width: 100%" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Konfirmasi Password Baru</label>
                                        <input type="password" id="passnew2" class="form-control" minlength="6" placeholder="Masukkan Password Baru" style="width: 100%" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- inputan button simpan dan Cancel -->
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                                    <button type="submit" id="btn_push" class="btn btn-primary ">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>