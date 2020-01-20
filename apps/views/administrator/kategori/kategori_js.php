<script>

var kat = {
    id : document.getElementById("idKategori"),
    nama : document.getElementById("namaKategori"),
    akses : document.getElementById("akses-data")
}

$(document).ready(function(){
    loadTable();
})

/*
Reload isi tabel
*/ 

function loadTable(){
    $('#tabel-kategori tr').not(function(){ return !!$(this).has('th').length; }).remove();
    
    tableGI.config({
        req_per_page:10,
        coloumn:['','nama', 'akses',
            [{
                param:['id','nama', 'akses'],
                data:['id'],
                click:"getKlik('_id','_nama', '_akses')",
                text:'<i class="fa fa-edit"></i> Edit',
                class:'btn btn-warning btn-xs _gittable_btn ',
                type:'button'
            },
            {
                param:['id'],
                click:"showConfirm('delKategori',_id,'Hapus data ?')",
                text:'<i class="fa fa-trash"></i> Hapus',
                class:'btn btn-danger btn-xs ',
                type:'button'
            }]
        ],
        ajax:{
            url:'<?php echo api_url()?>user_kategori/get_aktif',
            method:'GET',
            headerRequest:[
                {header:'Authorization', value:"Bearer "+localStorage.getItem("token")}
            ]
        }
    }).setUpTable('tabel-kategori');
}


function getKlik(id, nama, akses){
    startLoadingMask();
    showBatal('batal');
    kat.id.value = id;
    kat .nama.value = nama;
    kat .akses.value = akses;
    stopLoadingMask();
}

/*
Membersihkan field
*/
function clear(){
    kat.id.value = null;
    kat .nama.value = null;
    kat .akses.value = "";
}

/*
Validasi Form
*/
function validation(){
    if(kat.nama.value == null || kat.nama.value == ""){
        alert("Nama kategori kosong !");
        return false;
    }

    if(kat.akses.value == null || kat.akses.value == ""){
        alert("Akses data kosong !");
        return false;
    }

    return true;
}


/*
Insert / Update data
*/
function postKategori(){
    if(!validation()){
        return;
    }
    $("#simpankategori").prop("disabled", true);
    startLoadingMask();
    GI.ajaxPost({
        url:"<?php echo api_url()?>user_kategori/post",
        params: {
            id: kat.id.value,
            nama: kat.nama.value,
            akses: kat.akses.value,
            aktif : 1
        },
        success:function(data){
            $("#loading").html(data.message);
            hideNotif("loading");
            stopLoadingMask();
            if (data.success == 1) {
                loadTable(); 
            }
            $("#simpankategori").prop("disabled", false);     
            hideBatal('batal', 'clear');
        },
        error: function (e) {
            $("#simpankategori").prop("disabled", false);
            stopLoadingMask();
        }
    });
}

function delKategori(id){
    startLoadingMask();

    GI.ajaxGet({
        url: "<?php echo api_url()?>user_kategori/nonaktif/"+id,
        success:function(data){
            $("#loading").html(data.message);
            hideNotif("loading");
            stopLoadingMask();
            if(data.success  == 1){
                loadTable();
            } 
        },
        error: function (e) {
            console.log("ERROR : ", e);
            stopLoadingMask();
        }
    });
}
</script>