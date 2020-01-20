<div class="row">
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-3">
                <select class="form-control" name="kategori" id="kategori">
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button onclick="postMenuKategori();" class="btn btn-primary" id="simpan" name="simpan"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-danger" id="batal" name="batal"><i class="fa"></i> Batal</button>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="box box-warning" id="masking_loading">
            <div class="box-header">
                <h3 class="box-title">Privileges
                </h3>
            </div>
            <div class="box-body square" id="square">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="container">
                                    <input type="checkbox" data-role="main" class="main" name="checkAll" id="checkAll" /> <span class="caption-check">Check All</span>                
                                </div>
                            </div>
                            <div id="loading" class="col-md-4" style="margin-top: -20px; height: 20px; text-align: center"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="" method="POST" id="form_p    ivilages">
                    <div class="container">
                        <div class="row" id="isi-menu">
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>