<div class="row">
<div class="col-md-4 square" id="square">
        <div class="square">   
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-align-justify"></i> <b>Form</b> Pencarian
                </div>
                <div class="box-body">
                    <form id="form_negara" name="form_negara" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Nama</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" class="form-control" name="nama" id="nama_cari"
                                            placeholder="Cth. admin" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" class="form-control" name="username" id="username_cari"
                                            placeholder="Cth. admin" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.form group -->   
                        <div id="loading" style="text-align: center"></div>
                        <div class="text-right">   
                            <button type="button" name="tampilkan" onclick="loadtabel()" id="tampilkan" class="btn btn-success"><i class="fa fa-search"></i> Tampilkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Data Admin
                </h3>
                <div class="box-tools">
                    <a href="<?php echo base_url().$controller;?>/add" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Tambah Baru</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="tabel-admin" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Kontak</th>
                            <th>Cabang</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-row" id="ads">
                    </tbody>

                    <tfoot>

                    </tfoot>

                </table>
            </div>

        </div>

    </div>
</div>

<div class="modal fade centered-modal" data-backdrop="static" id="modal-layanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="masking_loading" class="modal-content">
            <div class="modal-header" style="background-color: #1D3A5E;">
                <div class="row">
                    <div style="color: white;" class="col-md-9 col-9">
                        <h4 class="modal-title" id="exampleModalLabel">Akses Layanan <b><span id="username"> </span></b>
                        </h4>
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        <button id="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id-user" id="id-user">
                <div class="row" id="box-layanan">

                </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div id="loading-layanan"></div>
                </center>
                <button id="simpan-layanan" type="button" class="btn btn-success" >Simpan</button>
                <button id="batal" type="button"
                    style="text-decoration: none; font-size: 12pt; padding: 5px 12px 5px 12px;" class="btn btn-link"
                    data-dismiss="modal"></i> <b>Batal</b></button>
            </div>
        </div>
    </div>
</div>    