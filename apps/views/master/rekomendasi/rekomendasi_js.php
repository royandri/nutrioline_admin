<script>
var selected_row = [];
var datatable_rekomendasi = "";

$(document).ready(function() {
    datatable_rekomendasi = $('#table-rekomendasi').DataTable( {
        "ajax":           {
            "url": '<?php echo api_url()?>rekomendasi/get/',
            "type": "GET",
            "headers": {"Authorization": "Bearer "+localStorage.getItem("token")},
            "contentType": "application/json",
            "data": function (res) {
                return JSON.stringify(res.data);
            }
        },
        "columns": [
            { 
                "data": "id" ,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "umur" },
            { "data": "pemberian_makanan" },
            { "data": "tahap_perkembangan" },
            { "data": "rangsangan_perkembangan" },
            { "data": "tip_sehat" }
        ],
        "columnDefs": [
            {"className": "dt-center", "targets": []},
        ],
        "select": true,
        "responsive": true,       
    } );

    $('#table-rekomendasi').on( 'click', 'tr', function () {
        if($(this).hasClass('header-table')) return;

        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            $("#delete-rekomendasi-btn").attr('disabled', true);
            $("#edit-rekomendasi-btn").attr('disabled', true);
            selected_row = [];
            
        }
        else {
            datatable_rekomendasi.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $("#delete-rekomendasi-btn").removeAttr('disabled');
            $("#edit-rekomendasi-btn").removeAttr('disabled');
            selected_row = datatable_rekomendasi.rows('.selected').data();
        }
    });

    document.getElementById('delete-rekomendasi-btn').addEventListener('click', () => {
        deleterekomendasi();
    })

    document.getElementById('edit-rekomendasi-btn').addEventListener('click', () => {
        modalRekomendasi('Edit');
    })

    document.getElementById('btn-save-rekomendasi').addEventListener('click', () => {
        handlerSaveRekomendasi();
    })

    $('#pemberian-makanan').summernote({
        height : '250px'
    });

    $('#tahap-perkembangan').summernote({
        height : '250px'
    });

    $('#rangsangan-perkembangan').summernote({
        height : '250px'
    });

    $('#tip-sehat').summernote({
        height : '250px'
    });
    
});

const modalRekomendasi = (status) => {
    $("#modal-title").html(status + " Rekomendasi");
    $("#modal-rekomendasi").modal('show');

    if(status == "Edit") {
        $("#pemberian-makanan").summernote("code", selected_row[0].pemberian_makanan);
        $("#tahap-perkembangan").summernote("code", selected_row[0].tahap_perkembangan);
        $("#rangsangan-perkembangan").summernote("code", selected_row[0].rangsangan_perkembangan);
        $("#tip-sehat").summernote("code", selected_row[0].tip_sehat);
        document.getElementById("id").value = selected_row[0].id;
        document.getElementById("umur").value = selected_row[0].umur;
    }else {
        $("#pemberian-makanan").summernote("code", "");
        $("#tahap-perkembangan").summernote("code", "");
        $("#rangsangan-perkembangan").summernote("code", "");
        $("#tip-sehat").summernote("code", "");
        document.getElementById("id").value = "";
        document.getElementById("umur").value = "";
    }

}

const handlerSaveRekomendasi = () => {
    let id = document.getElementById("id").value;
    let umur = document.getElementById("umur").value;
    let pemberian_makanan = $('#pemberian-makanan').summernote('code');
    let tahap_perkembangan = $('#tahap-perkembangan').summernote('code');
    let rangsangan_perkembangan = $('#rangsangan-perkembangan').summernote('code');
    let tip_sehat = $('#tip-sehat').summernote('code');


    if(!validate()) return;

    $.ajax({
        type: "POST",
        url: "<?php echo api_url()?>rekomendasi/post",
        data: {
            id: id,
            umur: umur,
            pemberian_makanan: pemberian_makanan,
            tahap_perkembangan: tahap_perkembangan,
            rangsangan_perkembangan: rangsangan_perkembangan,
            tip_sehat: tip_sehat
        },
        timeout: 600000,
        headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
        success: function (data) {
            if (data.success == 1) {
                toastr.success(data.message);
                $("#modal-rekomendasi").modal('hide');
                datatable_rekomendasi.ajax.reload();
            }else{                    
                toastr.warning(data.message);
            }
        },
        error: function (e) {
            console.log("ERROR : ", e);
            toastr.warning(data.message);
    
        }
    });
}

const validate = () => {
    let pemberian_makanan = $('#pemberian-makanan').summernote('code');
    let tahap_perkembangan = $('#tahap-perkembangan').summernote('code');
    let rangsangan_perkembangan = $('#rangsangan-perkembangan').summernote('code');
    let tip_sehat = $('#tip-sehat').summernote('code');
    let umur = document.getElementById("umur").value;

    if(umur == "") {
        toastr.warning("Umur can't be empty")
        return false;
    }

    if(pemberian_makanan == "") {
        toastr.warning("Pemberian makananan can't be empty")
        return false;
    }

    if(tahap_perkembangan == "") {
        toastr.warning("Tahap perkembangan can't be empty")
      return false;
    }
    if(rangsangan_perkembangan == "") {
        toastr.warning("Rangsangan perkembangan can't be empty")
        return false;
    }
    if(tip_sehat == "") {
        toastr.warning("Tip sehat can't be empty")
        return false;
    }

    return true;
}

const deleterekomendasi = () => {
    Swal.fire({
        icon: 'warning',
        title: 'Continue remove this item ?',
        text: 'Are you sure ?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return fetch(`<?php echo api_url()?>rekomendasi/delete/${selected_row[0].id}`, {
                method: 'GET',
                headers: new Headers({
                    'Authorization': "Bearer "+localStorage.getItem("token"), 
                    'Content-Type': 'application/json'
                }), 
            })
            .then(response => {
                if (!response.ok) {
                    toastr.success("Server error")
                }
                return response.json()
            })
            .catch(error => {
                toastr.error(error)
            })
        }
    }).then((result) => {
        if (result.value.success) {
            toastr.success(result.value.message);
            $("#delete-rekomendasi-btn").attr('disabled', true);
            $("#edit-rekomendasi-btn").attr('disabled', true);
            datatable_rekomendasi.ajax.reload();
        }else {
            toastr.error(result.value.message);
        }
    })
}

</script>