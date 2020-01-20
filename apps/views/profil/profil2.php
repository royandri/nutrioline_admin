<div class="row">
    <div class="col-md-7">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-align-justify"></i> Edit Profil
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="form_profil" name="form_profil" method="post">
                    <input type="hidden" required class="form-control" disabled name="id" id="idProfil" value="null">
                    <div class="form-group">
                        <label>Cabang</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" class="form-control" name="cabang" disabled id="cabang"
                                placeholder="Cth. Malang" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" disabled name="username" id="username"
                                        placeholder="Cth. admin" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="email" class="form-control" disabled name="email" id="email"
                                        placeholder="Cth. admin@gnp.co.id" value="">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" class="form-control" disabled name="nama" id="nama"
                                placeholder="Cth. Admin" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No. Kontak</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" class="form-control" disabled name="kontak" id="kontak"
                                placeholder="Cth. 085121213" value="">
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label>Foto Profil</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="file" class="form-control" disabled name="foto_user" id="foto_user" value="">
                        </div>
                    </div>
                    <div id="loading" style="text-align: center"></div>
                    <div class="text-right">   
                        <button disabled type="button" name="simpanprofil" onclick="postProfil()" id="simpanprofil" class="btn btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                        <button id="batal" onclick="disableUbah();" type="button" style="display: none    ;" class="btn btn-danger">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="box box-warning">
            <div class="box-body">
                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        <img alt="" src="<?php echo asset_url();?>dist/img/avatar5.png">
                    </div>
                    <div class="info">
                        <div class="title">
                            <a id="det_nama" target="_blank" href="https://scripteden.com/"></a>
                        </div>
                        <div id="det_uname" class="desc"></div>
                        <div id="det_email" class="desc"></div>
                    </div>
                    <div class="bottom">
                        <button type="button" onclick="enableUbah();"  id="ubah" name="ubah" class="btn btn-sm btn-success">Ubah Profil</button>
                        <button data-toggle="modal" data-target="#modalUbahPwd" id="ubahPwd" name="ubahPwd" class="btn btn-sm btn-warning">Ubah Password</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal ubah password -->
<div class="modal fade" id="modalUbahPwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ubah Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="kodekargo" class="col-form-label">Password Lama</label>
            <input type="password" class="form-control" id="pwdLama" name="pwdLama" value="" >
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="asal" class="col-form-label">Password Baru</label>
                    <input type="password" class="form-control" id="pwdBaru" name="pwdBaru" value="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="mdlKeterangan" class="col-form-label">Password Konfirmasi</label>
                    <input type="password" class="form-control" id="pwdConfirm" name="pwdConfirm" value="">
                </div>
              </div>
          </div>
          
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-warning">Simpan</button>
      </div>
    </div>
  </div>
</div>

