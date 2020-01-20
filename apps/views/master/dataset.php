<style>
.dt-center {
    text-align: center !important;
}

</style>

<div>
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Master Dataset</h1>
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
                        <h3 class="panel-title">Dataset</h3>
                    </div>
                    <div class="col-md-9 col-xs-9 text-right">
                        <div style="padding: 5px">
                            <button disabled id="delete-dataset-btn" class="btn btn-danger"><i class="ti-trash"></i> Delete</button>
                            <button disabled  id="edit-dataset-btn" class="btn btn-primary"><i class="ti-eraser"></i> Edit</button>
                            <button onclick="modalDataset('Tambah')" id="demo-dt-delete-btn" class="btn btn-success"><i class="ti-plus"></i> New</button>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 0px;">
            </div>
            <div class="panel-body">
                <table id="table-dataset" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="header-table">
                            <th>No</th>
                            <th>Umur (Bulan)</th>
                            <th>Berat (kg)</th>
                            <th>Tinggi (cm) </th>
                            <th>Gaji (Rp) </th>
                            <th>Status </th>
                            <!-- <th>Aksi </th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- modal dataset -->
    <div class="modal fade" id="modal-dataset" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="modal-title"></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <form id="datasetf" name="datasetf" action="">
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="umur">Umur (Bulan) <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="hidden" name="id" id="id" class="form-control" placeholder="">
                                <select class="form-control" name="umur" id="umur">
                                    <option  value="">Umur</option>
                                    <?php for($i = 0; $i < 60; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="berat">Berat (kg) <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="number" id="berat" name="berat" class="form-control" placeholder="Masukan berat">
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="tinggi">Tinggi (cm) <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="number" id="tinggi" name="tinggi" class="form-control" placeholder="Masukan tinggi">
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="gaji">Gaji (Rp) <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="number" id="gaji" name="gaji" class="form-control" placeholder="Masukan gaji">
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="hasil">Status <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="hasil" id="hasil">
                                    <option value="">Status</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Kurus">Kurus</option>
                                    <option value="Obesitas">Obesitas</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button id="btn-save-dataset" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal dataset -->

</div>