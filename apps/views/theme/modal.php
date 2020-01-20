
<?php
				$notif=$action;
				if($notif=="Success"){					
					echo '
					<script type="text/javascript">
					$(function() {
					$("#success").modal("show");
					});
					</script>
					';
				}
				if($notif=="SuccessDelete"){			
					echo '							
					<script type="text/javascript">
					$(function() {
					$("#successdelete").modal("show");
					});
					</script>
					';
				}
				if($notif=="Failed"){
					echo '					
					<script type="text/javascript">
					$(function() {
					$("#gagal").modal("show");
					});
					</script>
					';
				}
				?>

<!-- Success Modal -->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content panel-success">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-ok blue"></i>  Sukses!</h4>
      </div>
	   <div class="modal-body">
	  Data Berhasil Disimpan :)
	      </div>
      <div class="modal-footer">
        <button type="reset"  class="btn btn-warning" data-dismiss="modal">
       Close</button>
      </div>
	   </div>

  </div>
</div>


<!-- Success Modal -->
<div class="modal fade" id="successdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content panel-success">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-trash red"></i>  Dihapus !</h4>
      </div>
	   <div class="modal-body">
	  Data Berhasil Dihapus :)
	      </div>
      <div class="modal-footer">
        <button type="reset"  class="btn btn-danger" data-dismiss="modal">
       Close</button>
      </div>
	   </div>

  </div>
</div>

<!-- Gaggal Modal -->
<div class="modal fade" id="gagal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content panel-danger">
      <div class="modal-header panel-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-remove red"></i> Gagal!</h4>
      </div>
	  <div class="modal-body">
	  Data Gagal Disimpan, Silahkan coba lagi nanti. :(
	      </div>
      <div class="modal-footer">
        <button type="reset"  class="btn btn-warning" data-dismiss="modal">
       Close</button>
      </div>
	    </div>

  </div>
</div>


<!-- Gaggal Modal -->
<div class="modal fade" id="gagalhapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content panel-danger">
      <div class="modal-header panel-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-remove red"></i> Gagal!</h4>
      </div>
	  <div class="modal-body">
	  Data Gagal Dihapus, Silahkan coba lagi nanti. :(
	      </div>
      <div class="modal-footer">
        <button type="reset"  class="btn btn-warning" data-dismiss="modal">
       Close</button>
      </div>
	    </div>

  </div>
</div>

<div class="modal fade" id="confirm-hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-trash red"></i> Konfirmasi !</h4>
            </div>
            <div class="modal-body">
              Apakah Anda yakin menghapus ini ?
            </div>
            <div class="modal-footer">
            
				 <button type="button"  class="btn btn-default" data-dismiss="modal">
       Batal</button>
       <a class="btn btn-danger btn-ok"><i class="ace-icon fa fa-trash-o white"></i> Hapus</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
jQuery('#confirm-hapus').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>


