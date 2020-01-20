<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title><?php echo $title;?> | <?php echo site_title();?></title>
    <link rel="shortcut icon" href="<?php echo asset_url();?>favicon.ico" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo asset_url();?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo asset_url();?>font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo asset_url();?>ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo asset_url();?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo asset_url();?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/iCheck/square/blue.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-yellow fixed layout-top-nav">
    <div class="wrapper">
      <header class="main-header">
        
        <?php include "theme/header.php";?>
        
      </header>
      
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <!-- Main content -->
          <section class="content">
            <div class="box box-warning">
              <div class="box box-header">
                <center>
                  <span class="logo-lg" style="color:#f39c12;"><img src="<?php echo asset_url();?>logo_64.png" width="80px"> <b style="font-size: 36px">Registrasi Exhibitors</b><span>
                </center>
              </div>
              <div class="box box-body">
                <div class="callout callout-warning">
                  <h4>Data Exhibitors! <span class="pull-right"><a href="<?=cdn_url().'Panduan bag. Exhibitors GNP.pdf' ?>" class="btn btn-primary btn-sm" style="text-decoration: none;" download><i class="fa fa-download"></i> Download Panduan Exhibitors</a></span></h4>
                  <p>Silakan lengkapi formulir pendaftaran dibawah ini. </p>
                  <p><strong>Sudah Pernah Mendaftar? Silakan</strong>&nbsp;&nbsp; <span><a href="<?=lempar_login_tenant()?>" class="btn btn-primary btn-sm" style="text-decoration: none;"><i class="fa fa-sign-in"></i> Login</a></span></p>
                </div>                
                <form id="loginf" name="loginf" method="post" action="<?php echo base_url();?>registrasi/aksiRegistrasi" enctype="multipart/form-data">
                  <hr>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Logo Exhibitors *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="file" class="form-control" name="foto_utama" id="foto_utama" placeholder="Masukkan Username Anda" >
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <img src="" id="img_preview" class="img-responsive" width="300px">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Nama Owner / PIC Exhibitors *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Owner / PIC Exhibitors" >
                    </div>
                    <div class="col-md-2">
                      <label>Nama Brand Exhibitors *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="nama_brand" id="nama_brand" placeholder="Masukkan Nama Brand Exhibitors Anda" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Nomor HP / WA *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP/WA Anda" >
                    </div>
                    <div class="col-md-2">
                      <label>Email *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Kontak Outlet</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="outlet" id="outlet" placeholder="Masukkan Kontak Outlet" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Facebook <a href="#" id="cth-fb" data-src="facebook.png"><small>| Contoh</small></a></label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="facebook" id="facebook" placeholder="https://web.facebook.com/KopingJogja/" >
                    </div>
                    <div class="col-md-2">
                      <label>Instagram  <a href="#" id="cth-ig" data-src="instagram.png"><small>| Contoh</small></a></label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="instagram" id="instagram" placeholder="https://www.instagram.com/kopingjogja/">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Alamat *</label>
                    </div>
                    <div class="col-md-10">
                      <textarea class="form-control" name="alamat" id="alamat"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Username *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username Anda" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Password *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Anda">
                    </div>
                    <div class="col-md-2">
                      <label>Ulangi Password *</label>
                    </div>
                    <div class="col-md-4">
                      <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Ulangi Password Anda">
                    </div>
                  </div>

                  <div id="loading" style="text-align: center">
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                      <center>
                      <button id="signin" class="btn btn-warning btn-block btn-flat" style="height:50px">
                        <b style="font-size: 18px"><i class="fa fa-user-plus"></i> Daftar Sekarang</b></button>
                      </center>
                    </div>
                    <div class="col-md-4"></div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
        
      <footer class="main-footer ">
        <div class="container">
            <div class="pull-right hidden-xs">
              <strong>Copyright &copy; 2019 <a href="http://gamainformatika.com">GNP.</a></strong>
            </div>
            <strong><i class="fa fa-food"></i> GNP</strong>
        </div>
      </footer>
        <!-- Control Sidebar -->
        
        <?php //include "theme/controlsidebar.php";?>
        <!-- /.control-sidebar -->
        <div class="control-sidebar-bg"></div>
      </div>

      <div class="modal fade" id="ModalRegistrasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <!-- <h4 class="modal-title" id="myModalLabel">Kode Klaim</h4> -->
                  </div>
                  <div class="modal-body">
                      <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <!-- <h4 id="kode"> </h4> -->
                          <p id="pesan">Berhasil Registrasi Exhibitors</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="ModalFacebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <!-- <h4 class="modal-title" id="myModalLabel">Kode Klaim</h4> -->
                  </div>
                  <div class="modal-body">
                      <img id="contoh" src="" class="img-responsive">
                  </div>
              </div>
          </div>
      </div>
      <!-- ./wrapper -->
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
      <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
      <!-- iCheck -->
      <script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
      <script src="<?php echo asset_url();?>dist/js/demo.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/jquery.form.js"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135928191-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-135928191-1');
      </script>

      <script>
        
        function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            jQuery('#img_preview').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

      jQuery("#foto_utama").change(function() {
        readURL(this);
      });
      jQuery(document).ready(function() {
      $('#btns').addClass('disabled');
      //elements
      var progressbox     = $('#progressbox');
      var progressbar     = $('#progressbar');
      var statustxt       = $('#statustxt');
      var submitbutton    = $("#signin");
      var myform          = $("#loginf");
      var output          = $("#loading");
      var completed       = '0%';
      $(myform).ajaxForm({
      beforeSend: function() { //brfore sending form
      submitbutton.attr('disabled', ''); // disable upload button
      statustxt.empty();
      progressbox.slideDown(); //show progressbar
      output.html("<div class='alert alert-info'><i class='fa fa-refresh fa-spin fa-fw'></i><span class='sr-only'>Loading...</span>Mengecek. . .</div>"); //update element with received data
      progressbar.width(completed); //initial value 0% of progressbar
      statustxt.html(completed); //set status text
      statustxt.css('color','#000'); //initial color of status text
      },
      uploadProgress: function(event, position, total, percentComplete) { //on progress
      progressbar.width(percentComplete + '%') //update progressbar percent complete
      statustxt.html(percentComplete + '%'); //update status text
      output.html("<div class='alert alert-info'><i class='fa fa-refresh fa-spin fa-fw'></i><span class='sr-only'>Loading...</span>Mengecek. . .</div>"); //update element with received data
      if(percentComplete>50)
      {
      statustxt.css('color','#fff'); //change status text to white after 50%
      }
      },
      complete: function(response) { // on complete
      output.html(response.responseText); //update element with received data
      //myform.resetForm();  // reset form
      // $('#ModalRegistrasi').modal('show');
      submitbutton.removeAttr('disabled');
      $('#btns').removeClass('disabled');            //enable submit button
      progressbox.slideUp(); // hide progressbar
      }
      });
      });

      $(document).ready(function() {
          $('#cth-fb, #cth-ig').on('click', function () {
              var src=$(this).attr('data-src');
              $('#contoh').attr('src','<?=cdn_url() ?>'+src)
              $('#ModalFacebook').modal('show');
          });
      });

      </script>
    </body>
  </html>