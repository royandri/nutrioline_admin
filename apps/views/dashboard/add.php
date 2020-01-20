      

    <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();;?>assets/plugins/datepicker/datepicker3.css">
  
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();;?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->



        <div class="row">
        <div class="col-xs-2">
        </div>
        <div class="col-xs-8">
        <div class="row">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Form Voucher Code</h3>
               
            </div>
        
            <div class="box-body">
            
            <form id="form_kupon"  name="form_kupon" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>kupon/processadd">
            
              <div class="form-group">            
                <label>Kode Kupon (Tanpa Spasi)</label>
                <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-cc"></i>
                </div>
               <input type="text" class="form-control" name="kode_kupon" id="kode_kupon" placeholder="Contoh : HAPPYBIRTHDAY20" value="">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


                <div class="row">
                <div class="col-lg-6">
                <label>Tanggal Mulai</label>
                  <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>

                        <input type="text" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Contoh : 20/08/2016" value="">
               
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">

                <label>Tanggal Selesai</label>
                  <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                     <input type="text" class="form-control" name="tanggal_akhir" id="tanggal_akhir" placeholder="Contoh : 30/08/2016" value="">
                 </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>
              <!-- /.row -->

              <br/>
            
               <div class="form-group">            
                <label>Total Kupon</label>
                <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-scissors"></i>
                </div>
               <input type="number" class="form-control" name="jumlah_kupon" id="jumlah_kupon" placeholder="Contoh : 20" value="">
               </div>
                <!-- /.input group -->
             </div>
              <!-- /.form group -->
              

              <div class="form-group">            
                <label>Nilai Kupon</label>
                <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-ils"></i>
                </div>
               <input type="text" class="form-control" name="nilai_kupon" id="nilai_kupon" placeholder="Contoh. 30%" value="">
               <div class="input-group-addon">
                %
                </div>
               </div>
                <!-- /.input group -->
             </div>
              <!-- /.form group -->
              

                <br/>
                <div id="loading" style="text-align: center"></div>
                <div align="center">
                <button name="simpandata" id="simpandata" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan</button>
              
                <a href="<?php echo base_url();?>kupon" name="batal" id="batal" class="btn btn-warning btn-lg"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>                
                </div>
            
            </form>         
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>  
        </div>  

        
        
        
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script>  
  
var $j = jQuery.noConflict();
$j('#tanggal_mulai').datepicker({
    autoclose: true
    });

var $k = jQuery.noConflict();
$k('#tanggal_akhir').datepicker({
    autoclose: true
    });
  </script>


        <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/jquery.form.js"></script>
    <script>
    jQuery.noConflict()(function ($) {

 $(document).ready(function() {
                
                
                             $('#btns').addClass('disabled');       
            //elements
            var progressbox     = $('#progressbox');
            var progressbar     = $('#progressbar');
            var statustxt       = $('#statustxt');
            var submitbutton    = $("#simpandata");
            var myform          = $("#form_kupon");
            var output          = $("#loading");
            var completed       = '0%';
                    $(myform).ajaxForm({
                        beforeSend: function() { //brfore sending form
                            submitbutton.attr('disabled', ''); // disable upload button
                            statustxt.empty();
                            progressbox.slideDown(); //show progressbar                         
                            output.html("<div class='alert alert-info'>Checking. . .</div>"); //update element with received data
                            progressbar.width(completed); //initial value 0% of progressbar
                            statustxt.html(completed); //set status text
                            statustxt.css('color','#000'); //initial color of status text
                        },
                        uploadProgress: function(event, position, total, percentComplete) { //on progress
                            progressbar.width(percentComplete + '%') //update progressbar percent complete
                            statustxt.html(percentComplete + '%'); //update status text
                            output.html("<div class='alert alert-info'>Checking. . .</div>"); //update element with received data
                            if(percentComplete>50)
                                {
                                    statustxt.css('color','#fff'); //change status text to white after 50%
                                }
                            },
                        complete: function(response) { // on complete
                            output.html(response.responseText); //update element with received data
                            //myform.resetForm();  // reset form
                            submitbutton.removeAttr('disabled');
                             $('#btns').removeClass('disabled');                        //enable submit button
                            progressbox.slideUp(); // hide progressbar
                        }
                });
            });
            });

    </script>

