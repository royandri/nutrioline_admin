<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/select2.css">
<script src="<?php echo base_url()?>assets/plugins/select2/select2.js"></script>

<script>
setupPage();
var admin = {
    kode: document.getElementById("kode"),
    user: document.getElementById("user"),
    pass: document.getElementById("pass"),
    nama: document.getElementById("nama"),
    email: document.getElementById("email"),
    nohp: document.getElementById("nohp"),
    id_cabang: document.getElementById("cabang"),
    id_user_kategori: document.getElementById("id_user_kategori")
}

$('#form_admin').submit(function(e) {
    e.preventDefault();
    startLoadingMask();
    $("#simpandata").prop("disabled", true);
    //data.append('id','');

    GI.ajaxPost({
        url: "<?php echo api_url()?>admin/post",
        params: {
            id: "",
            kode: admin.kode.value,
            user: admin.user.value,
            pass: admin.pass.value,
            nama: admin.nama.value,
            email: admin.email.value,
            nohp: admin.nohp.value,
            id_cabang: admin.id_cabang.value,
            id_user_kategori: admin.id_user_kategori.value
        },
        success: function(data) {
            data = respon_api(data);
            if (data.success == 1) {
                window.location.replace("<?php echo base_url()?>/administrator");
            }else{
              $("#loading").html(data.message);
              hideNotif("loading");
            }
            $("#simpandata").prop("disabled", false);
            stopLoadingMask();
        },
        error: function(e) {
            console.log("ERROR : ", e);
            $("#simpandata").prop("disabled", false);
            stopLoadingMask();
        }
    });

});

$('#cabang').html('');
$('#cabang').append('<option value="0">pilih cabang</option>');

$('#id_user_kategori').html('');
$('#id_user_kategori').append('<option value="0">pilih Kategori User</option>');

function setupPage() {
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
                            $('#id_user_kategori').append('<option value="' + element
                                .id + '">' + element.nama + '</option>');
                        });
                        $('#id_user_kategori').select2();
                    } else {
                        $('#loading').append('<label>Error cabang</label>' + data.message);
                    }
                    stopLoadingMask();
                }
            });
        }
    });
}


/**
 * Genereate 3LC Code 
 */
// const generate3LC = () => {
//     const alphabet = [...'ABCDEFGHIJKLMNOPQSTUVWXYZ'];
//     let head3LC = alphabet[Math.floor(Math.random() * alphabet.length)];
//     let tail3LC = Math.random().toString(36).substr(2, 2).toUpperCase();
//     let get3LC = head3LC+tail3LC;

//     return get3LC;
// }


/**
 * Check if 3LC code is available
 * If 3LC generated from system and not available, run this function as recursive function
 * If 3LC inputed by user and not availavle, show message to user
 * @param {url} String -> API url to check is 3LC available ?
 * @param {kode} String -> code for generate 3LC code
 * If you want to generate 3LC {kode} -> "none"
 * if you want to check 3LC by yours {kode} -> "YOUR_3LC_CODE"
 * @param {id_field} String -> Field id to show created 3LC Code
 */
// const check3LC = (url, kode, id_field) => {
//     let temp_kode;
//     temp_kode = kode == "none" ? generate3LC() : kode; 

//     GI.ajaxPost({
//         url: url,
//         params: {
//             kode: temp_kode
//         },
//         success: function(data) {
//             if(data.success == 1) {
//                 if(temp_kode != "none") {
//                     if(data != null) {
//                         document.getElementById(id_field).value = data.data;
//                         console.log(data.message);
//                     }
//                 }else {
//                     if(data.data == null) {
//                         return check3LC(url,kode);
//                     }else {
//                         document.getElementById(id_field).value = data.data;
//                     }
//                 }
//             }
//         }
//     });
// }

// check3LC("http://localhost:8080/v1/admin/cekKode", "none" ,"kode");
</script>