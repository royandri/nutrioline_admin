<style>
    .tbl-hasil {
        background-color: 
    }
</style>

<div>
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Pengujian Dataset</h1>
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
                <h3 class="panel-title">Uji Dataset</h3>
            </div>
            <div class="panel-body">
                <table id="table-uji" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="header-table">
                            <th>No</th>
                            <th>Hasil Uji</th>
                            <th>Umur (Bulan)</th>
                            <th>Berat (kg)</th>
                            <th>Tinggi (cm) </th>
                            <th>Gaji (Rp) </th>
                            <th>Status Aktual </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center" colspan="7">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel" id="panel-confusion" style="display: none;">
            <div class="panel-heading">
                <h3 class="panel-title">Pengujian Confusion Matrix</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td align="middle" rowspan="5" ><b> <br><br><br><br>Actual</b> </td>
                        <td rowspan="2"></td>
                        <td align="center" colspan="4"> <b>Predict</b> </td>
                    </tr>
                    <tr>
                        <td align="center"> <b>Normal</b> </td>
                        <td align="center"> <b>Kurus</b> </td>
                        <td align="center"> <b>Obesitas</b> </td>
                    </tr>
                    <tr>
                        
                        <td> <b>Normal</b> </td>
                        <td align="center" style="background-color: #25476A; color: white"> <span id="normal-normal"></span> </td>
                        <td align="center"> <span id="normal-kurus"></span> </td>
                        <td align="center"> <span id="normal-obesitas"></span> </td>
                    </tr>
                    <tr>
                        
                        <td> <b>Kurus</b> </td>
                        <td align="center"> <span id="kurus-normal"></span> </td>
                        <td align="center" style="background-color: #25476A; color: white"> <span id="kurus-kurus"></span> </td>
                        <td align="center"> <span id="kurus-obesitas"></span> </td>
                    </tr>
                    <tr>
                        <td> <b>Obesitas</b> </td>
                        <td align="center"> <span id="obesitas-normal"></span> </td>
                        <td align="center"> <span id="obesitas-kurus"></span> </td>
                        <td align="center" style="background-color: #25476A; color: white"> <span id="obesitas-obesitas"></span> </td>
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td>True Positive &nbsp;</td>
                        <td>=</td>
                        <td>&nbsp;<span id="true-positive"></span></td>
                    </tr>
                    <tr>
                        <td>False Negative &nbsp;</td>
                        <td>=</td>
                        <td>&nbsp;<span id="false-negative"></span></td>
                    </tr>
                    <tr>
                        <td collspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Akurasi</td>
                        <td>=</td>
                        <td>&nbsp;<span id="akurasi"></span>%</td>
                    </tr>
                    <tr>
                        <td>Galat &nbsp;</td>
                        <td>=</td>
                        <td>&nbsp;<span id="galat"></span>%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>