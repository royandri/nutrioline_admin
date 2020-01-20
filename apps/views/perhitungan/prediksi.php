<div>
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Prediksi Gizi</h1>
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
                <h3 class="panel-title">Prediksi Gizi</h3>
            </div>
            <div class="panel-body">
                <form id="cekf" name="cekf" class="form-inline">
                    <div class="form-group">
                        <label for="nama" class="sr-only">Nama</label>
                        <input type="text" placeholder="Masukan nama" id="nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="demo-inline-inputpass" class="sr-only">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="umur" class="sr-only">Umur</label>
                        <select name="umur" id="umur" class="form-control">
                            <option value="">Umur</option>
                        <?php for($i = 0; $i < 60; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="naam" class="sr-only">Tinggi</label>
                        <input style="max-width: 100px;" type="number" placeholder="Tinggi (cm)" id="tinggi" name="tinggi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="naam" class="sr-only">Berat</label>
                        <input style="max-width: 100px;" type="number" placeholder="Berat (kg)" id="berat" name="berat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="naam" class="sr-only">Pendapatan</label>
                        <input type="number" placeholder="Pendapatan (Rp)" id="gaji" name="gaji" class="form-control">
                    </div>
                    <button id="btn-cek-gizi" class="btn btn-primary" type="button">Cek</button>
                    <div>
                        <small style="color: red">*Semua field harus diisi</small>
                    </div>
                </form>
            </div>
        </div>

        <div id="hasil-perhitungan" style="display: none">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Pengecekan</h3>
                    <hr style="margin-top: 0px;">
                </div>
                <div class="panel-body">
                    Status Gizi: <b id="det-hasil"></b> <br><br>
                    <b>Rekomendasi</b><br>
                    <b>Pemberian Makanan</b>
                    <div id="det-pemberian-makanan"></div><br>
                    <b>Tahap Perkembangan</b>
                    <div id="det-tahap-perkembangan"></div><br>
                    <b>Rangsangan Perkembangan</b>
                    <div id="det-rangsangan-perkembangan"></div><br>
                    <b>Tip Sehat</b>
                    <div id="det-tip-sehat"></div><br>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Perhitungan</h3>
                    <hr style="margin-top: 0px;">
                </div>
                <div class="panel-body">
                    <b>Mean</b><br>
                    <b>1. Mean Obesitas</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="mean-obesitas-umur"></td>
                                <td id="mean-obesitas-gaji"></td>
                                <td id="mean-obesitas-tinggi"></td>
                                <td id="mean-obesitas-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <b>2. Mean Kurus</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="mean-kurus-umur"></td>
                                <td id="mean-kurus-gaji"></td>
                                <td id="mean-kurus-tinggi"></td>
                                <td id="mean-kurus-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <b>3. Mean Normal</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="mean-normal-umur"></td>
                                <td id="mean-normal-gaji"></td>
                                <td id="mean-normal-tinggi"></td>
                                <td id="mean-normal-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <br>
                    <!-- standar deviasi -->
                    <b>Standar Deviasi</b><br>
                    <b>1. SD Obesitas</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="sd-obesitas-umur"></td>
                                <td id="sd-obesitas-gaji"></td>
                                <td id="sd-obesitas-tinggi"></td>
                                <td id="sd-obesitas-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <b>2. SD Kurus</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="sd-kurus-umur"></td>
                                <td id="sd-kurus-gaji"></td>
                                <td id="sd-kurus-tinggi"></td>
                                <td id="sd-kurus-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <b>3. SD Normal</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="sd-normal-umur"></td>
                                <td id="sd-normal-gaji"></td>
                                <td id="sd-normal-tinggi"></td>
                                <td id="sd-normal-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
    
                    <br>
                    <!--Densitas Gaus -->
                    <b>Densitas Gauss</b><br>
                    <b>1. DG Obesitas</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="dg-obesitas-umur"></td>
                                <td id="dg-obesitas-gaji"></td>
                                <td id="dg-obesitas-tinggi"></td>
                                <td id="dg-obesitas-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <b>2. DG Kurus</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="dg-kurus-umur"></td>
                                <td id="dg-kurus-gaji"></td>
                                <td id="dg-kurus-tinggi"></td>
                                <td id="dg-kurus-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <b>3. DG Normal</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Umur (Bulan)</td>
                                <td>Gaji (Rupiah)</td>
                                <td>Tinggi (cm)</td>
                                <td>Berat (kg)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="dg-normal-umur"></td>
                                <td id="dg-normal-gaji"></td>
                                <td id="dg-normal-tinggi"></td>
                                <td id="dg-normal-berat"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <br>
                    <!--PROBABILITAS -->
                    <b>Probabilitas</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Obesitas</td>
                                <td>Kurus</td>
                                <td>Normal</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="probabilitas-obesitas"></td>
                                <td id="probabilitas-kurus"></td>
                                <td id="probabilitas-normal"></td>
                            </tr>
                        </tbody>
                    </table>
    
                    <br>
                    <!--Likelihood -->
                    <b>Likelihood (Normalisasi)</b><br>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Obesitas</td>
                                <td>Kurus</td>
                                <td>Normal</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="likelihood-obesitas"></td>
                                <td id="likelihood-kurus"></td>
                                <td id="likelihood-normal"></td>
                            </tr>
                        </tbody>
                    </table>
    
                </div>
            </div>
        </div>


    </div>
</div>