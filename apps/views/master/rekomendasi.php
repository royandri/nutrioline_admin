<style>
.dt-center {
    text-align: center !important;
}

</style>

<div>
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Master Rekomendasi</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="ti-home"></i></a></li>
            <li><a href="#"><?php echo ucfirst($controller);?></a></li>
            <?php if(ucfirst($controller) != $title) { ?>
            <li class="active"><?php echo $title;?></li>
            <?php } ?>
        </ol>
    </div>

    <div id="page-content">
        <div class="panel">
            <div class="panel-heading">
            <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <h3 class="panel-title">Rekomendasi</h3>
                    </div>
                    <div class="col-md-9 col-xs-9 text-right">
                        <div style="padding: 5px">
                            <button disabled id="delete-rekomendasi-btn" class="btn btn-danger"><i class="ti-trash"></i> Delete</button>
                            <button disabled id="edit-rekomendasi-btn" class="btn btn-primary"><i class="ti-eraser"></i> Edit</button>
                            <button onclick="modalRekomendasi('Tambah')" id="demo-dt-delete-btn" class="btn btn-success"><i class="ti-plus"></i> New</button>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 0px;">
            </div>
            <div class="panel-body">
                <table id="table-rekomendasi" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="header-table">
                            <th>No</th>
                            <th nowrap>Umur</th>
                            <th nowrap>Pembarian Makanan</th>
                            <th nowrap>Tahap Perkembangan </th>
                            <th nowrap>Rangsangan Perkembangan</th>
                            <th nowrap>Tip Sehat </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- modal rekomendasi -->
    <div class="modal fade" id="modal-rekomendasi" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="modal-title"></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body" style="overflow-y: auto; height: 400px">
                    <form id="rekomendasif" name="rekomendasif" action="">
                        <div class="form-group">
                            <label class="control-label">Umur (Bulan) <span style="color: red">*</span></label>
                            <input type="hidden" name="id" id="id" class="form-control">
                            <input type="number" name="umur" id="umur" class="form-control">
                        </div>
                        <div class="form-group" >
                            <label class="control-label">Pemberian Makanan <span style="color: red">*</span></label>
                            <div id="pemberian-makanan"></div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">Tahap Perkembangan <span style="color: red">*</span></label>
                            <div id="tahap-perkembangan"></div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">Rangsangan Perkembangan <span style="color: red">*</span></label>
                            <div id="rangsangan-perkembangan"></div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">Tip Sehat <span style="color: red">*</span></label>
                            <div id="tip-sehat"></div>
                        </div>
                    </form>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button id="btn-save-rekomendasi" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal rekomendasi -->
</div>