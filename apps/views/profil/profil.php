<style>
.header-profil {
    height: 60px;
    background-color: white;
}

.box-profile {
    padding-right: 0px;
    padding-left: 0px;
}

.box-photo-profile {
    width: 100%;
    height: 250px;
    background-color: #1D3A5E;
    margin-top: 20px;
    border-radius: 2px;
    padding-top: 40px;
}

.box-photo-avatar {
    margin: auto;
    width: 125px;
    height: 125px;
    background-color: white;
    border-radius: 3px;
    padding-top: 4px;
    padding-left: 4px;
}

.box-photo-avatar img {
    width: 117px !important;
    height: 117px !important;
}

.informasi-profil {
    margin-top: 20px;
    background-color: white;
    padding: 20px;
    font-size: 11pt;
}

.caption-informasi-profil {
    font-weight: bold;
    font-size: 15pt;
}

.form-profile {
    background-color: white;
    margin-top: 20px;
    border-radius: 3px;
    padding: 20px;
}


.nav-tabs li {
    margin-bottom: -1px;
}

.nav-tabs li a:focus,
.nav-tabs li a:hover {
    background-color: white !important;
    color: #1D3A5E !important;
    border-bottom: 3px solid #ABB7BE !important;
    border-color: transparent;

}

.nav-tabs li.show a,
.nav-tabs li.active {  
    margin: 1px;
    margin-bottom: 0px!important;
    border-bottom: 3px solid #1D3A5E !important;
}

.nav-tabs li.active a{
    color: black !important;
    border: none !important;
}


.nav-tabs li a{ 
    color: black;
    font-size: 12pt;
    border-bottom: 3px solid transparent !important;
}


.nav-tabs li.active a:hover{
    color: black !important;
}

.nav-tabs li.show a,
.nav-tabs li.active:hover {
    color: black !important;
    background-color: white !important;
}

.tab-content h4 {
    font-size: 15pt !important;
}

label{
    font-weight: inherit;
}

.dropify {
    border-radius: 30px !important;
}


@media (min-width: 768px) {
    
    .box-photo-profile{
        margin-top: -56px;
    }

    .box-profile {
        padding-right: 15px;
        padding-left: 15px;
    } 
}

</style>

<div class="row" id="masking_loading">
    <div class="col-xs-12 square">
        <div class="row header-profil">
            <div class="col-xs-12"> 
                <div class="row">
                    <div class="container">
                        <div class="col-md-4"></div>    
                        <div class="col-md-8">
                            <h3 id="nama_user"> 
                                &nbsp;
                                <small>&nbsp;</small>     
                            </h3>
                        </div>
                    </div> 
                </div>
            
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-md-4 box-profile">
                                    <div class="box-photo-profile">
                                        <div class="box-photo-avatar"> 
                                            <img id="avatar" class="img-fluid" src="<?php echo base_url()?>public/images/admin/no-image.png" alt="avatar">
                                        </div>
                                    </div>
                                    <div class="informasi-profil">
                                        <p class="caption-informasi-profil"> 
                                            Informasi 
                                        </p>
                                        <div class="row">
                                            <div class="col-md-5 col-xs-5">
                                                <b>Cabang</b>
                                            </div>
                                            <div id="getCabang" class="col-md-7 col-xs-7">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-xs-5">
                                                <b>Username</b>
                                            </div>
                                            <div id="getUsername" class="col-md-7 col-xs-7">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-xs-5">
                                                <b>No. Kontak</b>
                                            </div>
                                            <div id="getKontak" class="col-md-7 col-xs-7">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 form-profile">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#data-diri">
                                                <i class="fa fa-gear"> </i> Data Diri
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#ganti-password">
                                                <i class="fa fa-key"></i> Ganti Password
                                            </a>
                                        </li>
                                    </ul>
                    
                                    <div class="tab-content">
                                        <div id="data-diri" class="tab-pane fade in active">
                                            <br/>
                                            <h4><b>Informasi Pribadi</b></h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input disabled type="text" id="username" name="username" placeholder="Username" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input disabled type="email" id="email" name="email" placeholder="Email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama">Nama Lengkap</label>
                                                        <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cabang">Cabang</label>
                                                        <input disabled type="text" id="cabang" name="cabang" placeholder="Cabang" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="input-file-max-fs">Gambar Profil</label>
                                                        <br/>
                                                        <small style="color: red"><i>(Maksimal file 2 MB, Eksistensi JPG / JPEG / PNG) *</i></small>
                                                        <input type="file" data-default-file="" data-allowed-file-extensions="jpeg jpg png"  id="input-file-max-fs" name="foto" class="dropify" data-max-file-size="2M" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kontak">No. Kontak</label>
                                                        <input type="text" id="kontak" name="kontak" placeholder="No. Kontak" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="loading" style="text-align: center"></div>

                                            <hr/>
                                            <div class="footer-tab">
                                                <button type="button" id="simpan_profil" class="btn btn-primary">Simpan</button>
                                                <button type="button" id="batal_ubah_profil" class="btn btn-secondary">Batal</button>
                                            </div>
                                        </div>
                                        <div id="ganti-password" class="tab-pane fade">
                                            <br/>
                                            <h4><b>Ganti Password</b></h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="password_lama">Password Lama</label>
                                                        <input type="password" id="password_lama" name="password_lama" placeholder="Password Lama" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="password_baru">Password Baru</label>
                                                        <input type="password" id="password_baru" name="password_baru" placeholder="Password Baru" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="password_konfirmasi">Konfirmasi Password</label>
                                                        <input type="password" id="password_konfirmasi" name="password_konfirmasi" placeholder="Password Konfirmasi" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="loading_password" style="text-align: center"></div>
                                            <hr/>
                                            <div class="footer-tab">
                                                <button type="button" id="simpan_password" class="btn btn-primary">Simpan</button>
                                                <button type="button" id="batal_simpan_password" class="btn btn-secondary">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
