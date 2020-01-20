<script>

var dt_resi = {
    modalresi: document.getElementById("modalresi-content")
}

var id_resi='';

$(document).ready(function(){
    $(".modalresi").on("hidden.bs.modal", function() {
        document.getElementById("data-resi").value = "";
        $("#detail-pencarian-resi").hide();

    });

    keyEnter('data-resi','cari-resi-modal');
})

$(document).on("click", "#cari-resi-modal", function() {
    load_data_resi(document.getElementById("data-resi").value);
});

$(document).on("click", "#print-resi", function() {
    printNotaResi();
});


function load_data_resi(id){
    if(!validation()) {
        return;
    }

    var modalresi = document.getElementById("modalresi-content");
    modalresi.className += " _gitable_loading";
    GI.ajaxGet({
        url:"<?php echo api_url()?>resi/detail/get/"+id,
        success:function(data){
            if(data.data.length){
                $("#pesan-pencarian").html(data.message);
                $("#detail-pencarian-resi").show();
                $('.btn-onload-hidden').removeClass('hidden');
                $('.btn-save').removeAttr('disabled');
                id_resi=data.data[0]['id'];
                $('#id_bookng_on_penerima').val(id);
                dttable_resi.gen('tabel-detail-resi', data.data,
                    [
                        'resi',
                        'jasa',
                        'tujuan',
                        'penerima',
                        {col:'tgl_tekirim',tipe:'datetime'},
                        'diterima',
                        'status_pengiriman'
                    ])

                dttable_detail_resi.gen('tabel-detail-resi-kirim', data.data);
                dttable_resi.gen('tabel-detail-resi_riwayat', data.data[0].data_riwayat,
                    [
                        {col:'waktu',tipe:'datetime'},
                        'riwayat'
                    ]
                );
                
                dttable_resi.gen('tabel-detail-resi-barang', data.data,
                    [
                        'volume',
                        'berat',
                        'pajak',
                        {col:'harga_barang',tipe:'curency'},
                        {col:'diskon',tipe:'curency'},
                        {col:'total_harga',tipe:'curency'}
                    ]
                );

                dttable_resi.gen('tabel-detail-resi-volume', data.data[0].data_volume,
                    [
                        '',
                        {col:'panjang',tipe:'cm'},
                        {col:'lebar',tipe:'cm'},
                        {col:'tinggi',tipe:'cm'}
                    ]
                );
                databooking=data.data[0];
                hideNotif("pesan-pencarian");
                 
            } else {
                $("#pesan-pencarian").html(data.message);
                $("#detail-pencarian-resi").hide();
                hideNotif("pesan-pencarian");
            }

            modalresi.classList.remove("_gitable_loading");
        }
    });
}

/*
* Print Resi
* @param
* @return
*/
function printNotaResi(){    
    $.ajax({
        type: "GET",
        url:"<?php echo api_url()?>resi/print_nota/"+id_resi,
        headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            let newWin = window.open('', 'Print', 'top=0,left=0,height=100%,width=auto');
            // var newWin = window.frames["printf"];
            newWin.document.write(data);
            newWin.print();
            newWin.close();
        }
    });
}

/*
* Change null data to -
* @param String data
* @return data
*/
function changeNullToStrip(data) {
    return data !== null ? data : '-';
}

var dttable_detail_resi={
    gen:function (id_table,data) {
        const table=$("#"+id_table);
        const th = (table.find('thead').find('th'));
        var tbody = (table.find('tbody'));
        //var isi="";
        var r="<tr>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Nama</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['pengirim']) +"</td>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Nama</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['penerima'])  +"</td>";
        r=r+"</tr>";     

        r = r + "<tr>"
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Nomor Kontak</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['no_hp_penerima'])  +"</td>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Nomor Kontak</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['no_hp_pengirim'])  +"</td>";
        r=r+"</tr>";  

        r = r + "<tr>"
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Kota asal harga </b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['asal'])  +"</td>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Kota tujuan harga </b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['tujuan'])  +"</td>";
        r=r+"</tr>"; 
        
        r = r + "<tr>"
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Kota </b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['data_wilayah'][0]['kota_penerima'])  +"</td>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Kota</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['data_wilayah'][0]['kota_pengirim'])  +"</td>";
        r=r+"</tr>"; 
        r = r + "<tr>"
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Kecamatan </b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['data_wilayah'][0]['keca_penerima']) +"</td>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Kecamatan</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['data_wilayah'][0]['keca_pengirim']) +"</td>";
        r=r+"</tr>"; 
        r = r + "<tr>"
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Desa</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['data_wilayah'][0]['desa_penerima'])+"</td>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Desa</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['data_wilayah'][0]['desa_pengirim'])  +"</td>";
        r=r+"</tr>"; 
        r = r + "<tr>"
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Alamat</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+ changeNullToStrip(data[0]['alamat_penerima'])  +"</td>";
        r = r + "<td width='17%'><b> &nbsp;&nbsp;Alamat</b></td>";
        r = r + "<td>  &nbsp;&nbsp;"+changeNullToStrip(data[0]['alamat_pengirim'])  +"</td>";
        r=r+"</tr>";  

        tbody.html(r);  
    }
}

var dttable_resi={
    gen:async function (id_table,data,col) {
        const table=$("#"+id_table);
        const th = (table.find('thead').find('th'));
        var tbody = (table.find('tbody'));
        var isi=this.ceateTable(data,col);
        tbody.html(isi);

    },
    ceateTable:function(data,col){
        var isi="";
        for (let index = 0; index < data.length; index++) {
            var r="<tr>";
            for (let i = 0; i < col.length; i++) {
                if(col[i] == '') {
                    r=r+"<td> &nbsp;&nbsp;"+(index+1)+"</td>"; 
                } else {
                    if(typeof col[i] ==='object'){    
                        var cell=dttable_resi.typeOfValue(data[index],col[i]);   
                        r=r+"<td> &nbsp;&nbsp;"+cell+"</td>"; 
                    }else{
                        r=r+"<td> &nbsp;&nbsp;"+data[index][col[i]]+"</td>"; 
                    }       
                }
            }          
            r=r+"</tr>";
            isi=isi+r; 
        }
        return isi;
    },
    typeOfValue:function(data_row,data_obj){
        if(!data_row[data_obj.col] || data_row[data_obj.col]=='-' ){
            return '- ';
        }
        if(data_obj.tipe=='datetime'){
            var myDate = new Date(data_row[data_obj.col]);
            return (myDate.getMonth() + 1) + '/' + myDate.getDate() + '/' + myDate.getFullYear()+
            ' ' + myDate.getHours()+ ':' + myDate.getMinutes()+ ':' + myDate.getSeconds();
        }
        if(data_obj.tipe=='curency'){
            var angka=parseInt(data_row[data_obj.col]);
            var rp=new Intl.NumberFormat('ind-IND', { maximumSignificantDigits: 3 }).format(angka);
            return rp;
        }
        if(data_obj.tipe=='cm'){
            var cm = data_row[data_obj.col] + " cm";
            return cm;
        }
    }

}

function validation() {
    var resi = document.getElementById("data-resi").value;

    if(resi == null || resi == '') {
        alert("Silahkan masukan kode resi !");
        return false;
    }

    return true;
}

</script>

<div  class="modalresi modal fade bd-example-modal-lg centered-modal " id="modalresi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" id="modalresi-content">
      <div class="modal-header" style="background-color: #1D3A5E;">
          <div style="color: white;" class="row">
              <div class="col-md-6 col-xs-6">
                  <h4 class="modal-title" id="exampleModalLongTitle">Cari Resi</h4>
              </div>
              <div class="col-md-6 col-xs-6 text-right">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          </div>
      </div>
      <div class="modal-body">
        <div class="row" style="padding-right: 20px;">
            <div class="col-md-1"><b>No.Resi</b></div>
            <div class="col-md-11">
                <div class="input-group">
                    <input type="search" id="data-resi" class="form-control">
                    <span class="input-group-btn">
                        <button id="cari-resi-modal" class="btn btn-primary" type="button"><span class="fa fa-search"
                                aria-hidden="true">
                            </span> Cari</button>
                    </span>
                </div>
                <br/>
                <div id="pesan-pencarian"></div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="table-responsive" id="detail-pencarian-resi" style="display: none;">
          <div style="height: 400px; overflow-x: hidden; overflow-y: scroll" class="">
            <div class="row" style="padding-top: 10px; padding-bottom: 10px;"> 
                <div class="col-xs-6 text-left" >
                    <h5><b>Detail Resi</b></h5>
                </div>
                <div class="col-xs-6 text-right" style="padding-right: 20px;">
                    <button type="button" id="print-resi" class="btn btn-danger"><i class=" fa fa-print"></i> Cetak </button>
                </div>
            </div>
            <div class="row" style="padding: 0px 20px 0px 15px;">
                <div class="col-md-12 " style="border: 1px solid #1D3A5E;" id="isi-pencarian">
                        <!-- Tabel data AWB -->
                        <div class="box-body table-responsive">
                            <table id="tabel-detail-resi" class="table table-bordered ">
                                <thead style="background-color: #1D3A5E; color: white;">
                                    <tr>
                                        <th>No Resi</th>
                                        <th>Jasa</th>
                                        <th>Tujuan</th>
                                        <th>Penerima </th>
                                        <th>Tanggal Terima </th>
                                        <th>Diterima </th>
                                        <th>Status </th>
                                    </tr>
                                </thead>
                                <tbody id="isi-detail" class="table-row">
                                    
                                </tbody>

                                <tfoot>
                                </tfoot>

                            </table>
                        </div>
                        <br>

                        <!-- Tabel data Pengirim dan penerima -->
                        <div class="box-body table-responsive">
                            <table id="tabel-detail-resi-kirim" class="table table-bordered ">
                                <thead style="background-color: #1D3A5E; color: white;">
                                    <tr>
                                        <th colspan="2">Pengirim</th>
                                        <th colspan="2">Penerima</th>
                                    </tr>

                                </thead>
                                <tbody id="isi-detail-kirim" class="table-row">

                                </tbody>

                                <tfoot>
                                </tfoot>

                            </table>
                        </div>
                        <br>

                        <!-- Tabel detail barang -->
                        <div class="box-body table-responsive">
                          <table id="tabel-detail-resi-barang" class="table table-bordered">
                            <thead style="background-color: #1D3A5E; color: white;">
                                <tr>
                                    <th>Volume</th>
                                    <th>Berat</th>
                                    <th>Pajak</th>
                                    <th>Harga Barang</th>
                                    <th>Diskon</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody class="table-row">

                            </tbody>
                          </table>
                        </div>
                        <br>

                        
                        <!-- Tabel detail volume -->
                        <div class="box-body table-responsive">
                          <table id="tabel-detail-resi-volume" class="table table-bordered">
                            <thead class="table-row" style="background-color: #1D3A5E; color: white;">
                                <tr>
                                    <th colspan = "4">Detail Barang</th>
                                </tr>
                                <tr style="background-color: white; color: black;">
                                    <td>&nbsp;No</td>
                                    <td>&nbsp;Panjang</td>
                                    <td>&nbsp;Lebar</td>
                                    <td>&nbsp;Tinggi</td>
                                </tr>
                            </thead>
                            <tbody class="table-row">

                            </tbody>
                          </table>
                        </div>

                        <!-- Tabel data History -->
                        <div class="box-body table-responsive">
                            <table id="tabel-detail-resi_riwayat" class="table table-bordered">
                                <thead style="background-color: #1D3A5E; color: white;">
                                    <tr>
                                        <th colspan="2">Riwayat</th>
                                    </tr>
                                </thead>
                                <tbody id="isi-detail-riwayat" class="table-row">

                                </tbody>

                                <tfoot>
                                </tfoot>

                            </table>
                        </div>

                </div>
            </div>
          <div>
        </div>
      </div>
    </div>
  </div>
</div>