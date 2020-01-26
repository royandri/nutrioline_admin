<script>
var selected_row = [];
var datatable_admin = "";
var status_data = "";

$(document).ready(function() {
    datatable_admin = $('#table-admin').DataTable( {
        "ajax":           {
            "url": '<?php echo api_url()?>user/get_all',
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
            { "data": "username" },
            { "data": "email" },
            { "data": "nama" },
            { "data": "createAt" }
        ],
        "columnDefs": [
            {"className": "dt-center", "targets": "_all"},
        ],
        "select": true,
        "responsive": true,
    } );

    $('#table-admin').on( 'click', 'tr', function () {
        if($(this).hasClass('header-table')) return;

        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            $("#delete-admin-btn").attr('disabled', true);
            $("#edit-admin-btn").attr('disabled', true);
            $("#password-admin-btn").attr('disabled', true);
            selected_row = [];
            
        }
        else {
            datatable_admin.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $("#delete-admin-btn").removeAttr('disabled');
            $("#edit-admin-btn").removeAttr('disabled');
            $("#password-admin-btn").removeAttr('disabled');
            selected_row = datatable_admin.rows('.selected').data();
        }
    });

    document.getElementById('delete-admin-btn').addEventListener('click', () => {
        deleteAdmin();
    })

    document.getElementById('edit-admin-btn').addEventListener('click', () => {
        modalAdmin('Edit');
    })

    document.getElementById('btn-save-admin').addEventListener('click', () => {
        handlerSaveAdmin();
    })


});

const deleteAdmin = () => {
    Swal.fire({
        icon: 'warning',
        title: 'Continue remove this item ?',
        text: 'Are you sure ?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return fetch(`<?php echo api_url()?>user/delete/${selected_row[0].id}`, {
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
            $("#delete-admin-btn").attr('disabled', true);
            $("#edit-admin-btn").attr('disabled', true);
            datatable_admin.ajax.reload();
        }else {
            toastr.error(result.value.message);
        }
    })
}

const modalAdmin = (status) => {
    $("#modal-title").html(status + " Admin");
    $("#modal-admin").modal('show');

    if(status == "Edit") {
        status_data = "";
        document.getElementById("id").value = selected_row[0].id;
        document.getElementById("username").value = selected_row[0].username;
        document.getElementById("username").disabled = true;
        document.getElementById("password").value = selected_row[0].password;
        document.getElementById("password").disabled = true;
        document.getElementById("nama").value = selected_row[0].nama;
        document.getElementById("email").value = selected_row[0].email;
        document.getElementById("nama").disabled = false;
        document.getElementById("email").disabled = false;

    }else if(status == "Password") {
        status_data = "password";
        document.getElementById("id").value = selected_row[0].id;
        document.getElementById("username").value = selected_row[0].username;
        document.getElementById("username").disabled = true;
        document.getElementById("password").value = selected_row[0].password;
        document.getElementById("password").disabled = false;
        document.getElementById("nama").value = selected_row[0].nama;
        document.getElementById("nama").disabled = true;
        document.getElementById("email").value = selected_row[0].email;
        document.getElementById("email").disabled = true;

    }else {
        status_data = "";
        document.getElementById("id").value = "";
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
        document.getElementById("email").value = "";
        document.getElementById("nama").value = "";
        document.getElementById("username").disabled = false;
        document.getElementById("password").disabled = false;
        document.getElementById("nama").disabled = false;
        document.getElementById("email").disabled = false;
    }
}

const handlerSaveAdmin = () => {
    if(!validate()) return;

    let form = $("#adminf")[0];
    let data = new FormData(form);
    data.append('status', status_data);

    $.ajax({
        type: "POST",
        url: "<?php echo api_url()?>user/post",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
        success: function (data) {
            if (data.success == 1) {
                toastr.success(data.message);
                $("#modal-admin").modal('hide');
                datatable_admin.ajax.reload();
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
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;

    if(username == "") {
        toastr.warning("Username can't be empty")
        return false;
    }
    if(password == "") {
        toastr.warning("Password can't be empty")
      return false;
    }
    if(nama == "") {
        toastr.warning("Nama can't be empty")
        return false;
    }
    if(email == "") {
        toastr.warning("Email can't be empty")
        return false;
    }

    return true;
}

</script>