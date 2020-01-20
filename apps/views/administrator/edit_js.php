<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/select2.css">
<script src="<?php echo base_url()?>assets/plugins/select2/select2.js"></script>
<script>
var admin = {
    id: document.getElementById("id"),
    user: document.getElementById("user"),
    pass: document.getElementById("pass"),
    nama: document.getElementById("nama"),
    email: document.getElementById("email"),
    nohp: document.getElementById("nohp"),
    id_cabang: document.getElementById("cabang"),
    id_user_kategori: document.getElementById("id_user_kategori"),
}


//persiapkan tampilan
$('#form_admin').submit(function(e) {
    startLoadingMask();
    e.preventDefault();
    $("#simpandata").prop("disabled", true);

    GI.ajaxPost({
        url: "<?php echo api_url()?>admin/post",
        params: {
            id: admin.id.value,
            user: admin.user.value,
            pass: admin.pass.value,
            nama: admin.nama.value,
            email: admin.email.value,
            nohp: admin.nohp.value,
            id_cabang: admin.id_cabang.value,
            id_user_kategori: admin.id_user_kategori.value
        },
        success: function(data) {
            $("#loading").html(data.message);
            if (data.success == 1) {
                window.location.replace("<?php echo base_url()?>/administrator");
            }
            console.log("SUCCESS : ", data);
            $("#simpandata").prop("disabled", false);
            stopLoadingMask();


        },
        error: function(e) {
            console.log("ERROR : ", e);
            $("#simpandata").prop("disabled", false);
            stopLoadingMask();

        }
    })
});
$('#cabang').html('');
$('#cabang').append('<option value="0">pilih cabang</option>');

startLoadingMask();
GI.ajaxGet({
    url: "<?php echo api_url()?>cabang/get",
    success: function(data) {
        if (data.success == 1) {
            data.data.forEach(element => {
                $('#cabang').append('<option value="' + element.id + '">' + element.nama + '(' +
                    element.kode + ')</option>');
            });
            $('#cabang').select2();
        } else {
            $('#loading').append('<label>Error cabang</label>' + data.message);
        }
        GI.ajaxGet({
            url: "<?php echo api_url()?>user_kategori/get_aktif",
            success: function(data) {
                if (data.success == 1) {
                    data.data.forEach(element => {
                        $('#id_user_kategori').append('<option value="' + element.id +
                            '">' + element.nama + '</option>');
                    });
                    $('#id_user_kategori').select2();
                } else {
                    $('#loading').append('<label>Error cabang</label>' + data.message);
                }
                GI.ajaxGet({
                    url: "<?php echo api_url()?>admin/get/<?php echo $id?>",
                    success: function(data) {
                        $('#user').val(data.data[0]['nameuser']);
                        $('#nama').val(data.data[0]['nama']);
                        $('#email').val(data.data[0]['email_id']);
                        $('#nohp').val(data.data[0]['contact_no']);
                        $('#cabang').val(data.data[0]['id_cabang']).change();
                        $('#id_user_kategori').val(data.data[0]['id_user_kategori'])
                            .change();
                        $("#simpandata").prop("disabled", false);
                        stopLoadingMask();
                    }
                });
            }
        });
    }
});

//$("#simpandata").prop("disabled", true);
//isi tampilan
</script>