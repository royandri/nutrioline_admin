<div class="row">
    <div class="col-md-7">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-align-justify"></i> Kategori
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <!-- <div class="row">
                    <form action="" method="POST" id="form-cari">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="negara">Kategori</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="Cth. Admin Pusat" name="cariNama" id="cariNama">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-7"><br><button class="btn btn-primary" type="button" name="tampilkan" id="tampilkan"><i class="fa fa-search"></i> Tampilkan</button></div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr> -->
                <table id="tabel-kategori" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th width="">Nama Kategori</th>
                            <th width="">Akses Data</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-row" id="isi-kategori">
                    </tbody>

                    <tfoot>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5" id="masking_loading">
        <div class="square">   
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-align-justify"></i> <b>Form</b> Kategori
                </div>
                <div class="box-body">
                    <form id="form_kategori" name="form_kategori" method="post">
                        <input type="hidden" required class="form-control" name="id" id="idKategori" value="">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" class="form-control" name="nama" id="namaKategori"
                                    placeholder="Cth. Admin Pusat" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Akses Data</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select class="form-control" name="akses-data" id="akses-data">
                                    <option value="">Pilih Akses Data</option>
                                    <option value="super">Super</option>
                                    <option value="global">Global</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.form group -->   
                        <div id="loading" style="text-align: center"></div>
                        <div>   
                            <button type="button" name="simpankategori" onclick="postKategori()" id="simpankategori" class="btn btn-success"><i class="fa fa-save"></i>
                                Simpan</button>
                            <button id="batal" onclick="hideBatal('batal', 'clear');" type="button" style="display:none;" class="btn btn-danger">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>