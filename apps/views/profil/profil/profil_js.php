<link rel="stylesheet" href="<?php echo asset_url();?>/dist/css/dropify.min.css">
<script src="<?php echo base_url()?>assets/dist/js/dropify.min.js"></script>
<script>


let profil = {
    id : localStorage.getItem("_ia"),
    nama : document.getElementById("nama"),
    foto: document.getElementById("input-file-max-fs"),
    kontak :  document.getElementById("kontak"),
    password_baru : document.getElementById("password_baru"),
    password_lama : document.getElementById("password_lama"),
    password_konfirmasi : document.getElementById("password_konfirmasi")
};


$(document).ready(function(){
    showData(profil.id);
    $('.dropify').dropify();
});

$(document).on("click", "#simpan_profil", function(){
    ubahData(true, "simpan_profil");
});

$(document).on("click", "#batal_ubah_profil" , function(){
    clearUpload();
    showData(profil.id);
});

$(document).on("click", "#simpan_password", function() {
    ubahData(false, "simpan_password");
})

$(document).on("click", "#batal_simpan_password" , function(){
    clearPasswordForm();
});


/**
* Show logged in profile's data
* @param Integer id
*/
function showData(id) {
    startLoadingMask();
    GI.ajaxGet({
        url :"<?php echo api_url()?>admin/get/"+id,
        success : function(data) {
            if(data.success == 1) {
                getCabang = data.data[0]['cabang'];
                getUsername = data.data[0]['nameuser'];
                getEmail = data.data[0]['email_id'];
                getNama = data.data[0]['nama'];
                getKontak = data.data[0]['contact_no'];
                getFoto = data.data[0]['foto_user'];

                $("#avatar").attr("src", "<?php echo base_url();?>public/images/admin/"+getFoto);
                $("#nama_user").html(
                    `<b>${getNama}</b>` + `<small> ${getEmail} </small>`
                );
                $("#getCabang").text(getCabang);
                $("#getUsername").text('@'+getUsername);
                $("#getKontak").text(getKontak);
                $("#id").val(id);
                $("#username").val(getUsername);
                $("#email").val(getEmail);
                $("#nama").val(getNama);
                $("#cabang").val(getCabang);
                $("#kontak").val(getKontak);
                stopLoadingMask();
            }
        }
    })
}

/**
* Function for update profil data
* @param Bool param
* @param String Tombol -> ID tombol
* If param True -> Update Profile
* If param False -> Update Password
*/
function ubahData(param, tombol) {
    let loading = "";
    $("#"+tombol).prop("disabled", true);
    startLoadingMask();

    let data = new FormData;
    data.append("id", profil.id);

    if(param) {
        loading = "loading";
        data.append("nama", profil.nama.value);
        data.append("kontak", profil.kontak.value);
        data.append("foto", profil.foto.files[0]);
        data.append("jenis_update", "profil");

    }else {
        loading = "loading_password";
        data.append("password_lama", profil.password_lama.value);
        data.append("password_baru", profil.password_baru.value);
        data.append("password_konfirmasi", profil.password_konfirmasi.value);
        data.append("jenis_update", "password");
    }

    $.ajax({
        url: "<?php echo api_url()?>admin/post/update_logged",
        type: "POST",
        enctype: "multipart/form-data",
        headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
        processData: false,
        contentType: false,
        cache: false,
        data: data,
        success: function(data) {
            if(data.success == 1) {
                if(param) {
                    showData(profil.id);
                    clearUpload();
                }else{
                    clearPasswordForm();
                }
            }
            $("#"+loading).html(respon_api(data).message);
            hideNotif(loading);
            $("#"+tombol).prop("disabled", false);
            stopLoadingMask();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log("Error");
            $("#"+tombol).prop("disabled", false);
            stopLoadingMask();
        }
    })
}


/**
* Remove selected file
*/
function clearUpload() {
    $(".dropify-clear").trigger("click");
}

/**
* Clear change password form
*/
function clearPasswordForm() {
    profil.password_baru.value = "";
    profil.password_lama.value = "";
    profil.password_konfirmasi.value = "";
}

</script>