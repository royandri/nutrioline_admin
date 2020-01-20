<script>
var selected_row = [];
var datatable_dataset = "";

$(document).ready(function() {
    datatable_dataset = $('#table-dataset').DataTable( {
        "ajax":           {
            "url": '<?php echo api_url()?>dataset/get/',
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
            { "data": "berat" },
            { "data": "tinggi" },
            { "data": "gaji" },
            { "data": "hasil" }
            // {
            //     "data": null,
            //     "defaultContent": "<button>Edit</button>"
            // }
        ],
        "columnDefs": [
            {"className": "dt-center", "targets": "_all"},
            // {"targets": [6], "orderable": false}
        ],
        "select": true,
        "responsive": true,
        // "order": [[ 1, "asc" ]]        
    } );

    $('#table-dataset').on( 'click', 'tr', function () {
        if($(this).hasClass('header-table')) return;

        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            $("#delete-dataset-btn").attr('disabled', true);
            $("#edit-dataset-btn").attr('disabled', true);
            selected_row = [];
            
        }
        else {
            datatable_dataset.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $("#delete-dataset-btn").removeAttr('disabled');
            $("#edit-dataset-btn").removeAttr('disabled');
            selected_row = datatable_dataset.rows('.selected').data();
        }
    });

    document.getElementById('delete-dataset-btn').addEventListener('click', () => {
        deleteDataset();
    })

    document.getElementById('edit-dataset-btn').addEventListener('click', () => {
        modalDataset('Edit');
    })

    document.getElementById('btn-save-dataset').addEventListener('click', () => {
        handlerSaveDataset();
    })


});

const deleteDataset = () => {
    Swal.fire({
        icon: 'warning',
        title: 'Continue remove this item ?',
        text: 'Are you sure ?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return fetch(`<?php echo api_url()?>dataset/delete/${selected_row[0].id}`, {
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
            $("#delete-dataset-btn").attr('disabled', true);
            $("#edit-dataset-btn").attr('disabled', true);
            datatable_dataset.ajax.reload();
        }else {
            toastr.error(result.value.message);
        }
    })
}

const modalDataset = (status) => {
    $("#modal-title").html(status + " Dataset");
    $("#modal-dataset").modal('show');

    if(status == "Edit") {
        document.getElementById("id").value = selected_row[0].id;
        document.getElementById("umur").value = selected_row[0].umur;
        document.getElementById("berat").value = selected_row[0].berat;
        document.getElementById("tinggi").value = selected_row[0].tinggi;
        document.getElementById("gaji").value = selected_row[0].gaji;
        document.getElementById("hasil").value = selected_row[0].hasil;
    }else {
        document.getElementById("id").value = "";
        document.getElementById("umur").value = "";
        document.getElementById("berat").value = "";
        document.getElementById("tinggi").value = "";
        document.getElementById("gaji").value = "";
        document.getElementById("hasil").value = "";
    }
}

const handlerSaveDataset = () => {
    if(!validate()) return;

    let form = $("#datasetf")[0];
    let data = new FormData(form);

    $.ajax({
        type: "POST",
        url: "<?php echo api_url()?>dataset/post",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
        success: function (data) {
            if (data.success == 1) {
                toastr.success(data.message);
                $("#modal-dataset").modal('hide');
                datatable_dataset.ajax.reload();
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
    let umur = document.getElementById("umur").value;
    let berat = document.getElementById("berat").value;
    let tinggi = document.getElementById("tinggi").value;
    let gaji = document.getElementById("gaji").value;
    let hasil = document.getElementById("hasil").value;

    if(umur == "") {
        toastr.warning("Umur can't be empty")
        return false;
    }
    if(berat == "") {
        toastr.warning("Berat can't be empty")
      return false;
    }
    if(tinggi == "") {
        toastr.warning("Tinggi can't be empty")
        return false;
    }
    if(gaji == "") {
        toastr.warning("Gaji can't be empty")
        return false;
    }
    if(hasil == "") {
        toastr.warning("Status can't be empty")
        return false;
    }

    return true;
}

</script>