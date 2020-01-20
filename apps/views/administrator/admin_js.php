
<script>

window.addEventListener('load', () => {
    loadtabel();
}, false);

document.getElementById("simpan-layanan").addEventListener('click', () => {
    postLayananUser();
});

function loadtabel(){
    $('#tabel-admin').find('tbody').html('');
    tableGI.config({
        req_per_page:10,
        coloumn:['','kode', 'nama','nameuser','email_id','contact_no', 'cabang',
            [{
                type:'link',
                param:['id'],
                text:'<i class="fa fa-edit"></i> Edit',
                class:'btn btn-warning btn-xs _gittable_btn ',
                link:"<?php echo base_url()?>administrator/edit/_id",
            },
            {
                param:['id', 'nameuser'],
                data:['id'],
                click:"modalLayanan('_id', '_nameuser')",
                text:'<i class="fa fa-plus"></i> Layanan',
                class:'btn btn-primary btn-xs _gittable_btn ',
                type:'button'
            }]
        ],
        ajax:{
            url:'<?php echo api_url()?>admin/getDataForTable',
            method:'POST',
            params: 
                {
                    nama:$('#nama_cari').val(),
                    username:$('#username_cari').val(),
                },
            headerRequest:[
                {header:'Authorization', value:"Bearer "+localStorage.getItem("token")}
            ],
            error:function(data){
                GI.respon_api(data);
            }
        }
    }).setUpTable('tabel-admin');

}

const loadLayanan = (id) => {
    startLoadingMask();
    $("#box-layanan").empty();
    GI.ajaxGet({
        url: "<?php echo api_url()?>harga/layananuser/get/"+id,
        success: function(data){
            data.data.forEach(element => {
                let isChecked = "";
                if(element.checked == "yes") {
                    isChecked = "checked";
                }else {
                    isChecked = "";
                }

                $("#box-layanan").append(
                    `
                        <div style="margin-bottom: 7px;" class="col-md-3 col-xs-4">
                            <input name="layanan" type="checkbox" ${isChecked} value="${element.id}" name="layanan" id="layanan">&nbsp; ${element.nama}
                        </div>
                    `
                );
            });
            stopLoadingMask();
        }
    });
}

const modalLayanan = (id, username) => {
    document.getElementById('id-user').value = id;
    document.getElementById('username').innerHTML = "@"+username;
    loadLayanan(id);
    $("#modal-layanan").modal('show');
}

const getChecked = () => {
    let checked = [];
    $.each($("input[name='layanan']:checked"), function(){            
        checked.push($(this).val());
    });

    return checked;
}

const postLayananUser = () => {
    startLoadingMask();
    document.getElementById("simpan-layanan").disabled = true;
    GI.ajaxPost({
        url: '<?php echo api_url()?>admin/postLayananUser',
        params: {
            id_user: document.getElementById('id-user').value,
            id_layanan: getChecked()
        },
        success: (data) => {
            if(data.success == 0) {
                loadLayanan(document.getElementById('id-user').value);
            }

            $("#loading-layanan").html(data.message);
            hideNotif("loading-layanan");
            document.getElementById("simpan-layanan").disabled = false;
            stopLoadingMask();

        }
    });
}


/*GI.ajaxGet({
    url: "<?php echo api_url()?>admin/get",
    success:function(data){
        //dttable.gen('tabel-admin',data.data, ['','nama','nameuser','email_id','contact_no', 'cabang']);
        
        createGiTable.gen({
            idTable     : 'tabel-admin',
            data        : data.data, 
            //col         : ['','nama','nameuser','email_id','contact_no', 'cabang'], 
            //namaButton  : ['Edit'], 
            //type        : ['openLink'],
            //classButton : ['warning'],
            //paramButton : [['id']]
        });
    }
});

var dttable={
    gen:function (id_table,data,col) {
        const table=$("#"+id_table);
        const th = (table.find('thead').find('th'));
        var tbody = (table.find('tbody'));
        for (let index = 0; index < data.length; index++) {
            var r="<tr>";
            for (let i = 0; i < col.length; i++) {
                if(col[i]==""){
                    r=r+"<td>"+(index+1)+"</td>"; 
                }else{
                    r=r+"<td>"+data[index][col[i]]+"</td>"; 
                }              
            }
            r=r+"<td align='center'><a href='<?php echo base_url()?>administrator/edit/"+data[index]['id']+"' class='btn btn-xs btn-warning'><i class='fa fa-pencil'></i>Edit</a></td>"; 
            r=r+"</tr>";
            tbody.append(r);            
        }
        tableGI.config({
            req_per_page:10
        }).setUpTable(id_table);

    }
}
*/
</script>