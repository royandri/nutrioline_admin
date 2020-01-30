<script>
var datatable_dataset = "";
var dataset = [];

$(document).ready(() => {
    document.getElementById("btn-download-template").addEventListener("click", () => {
        downloadTemplate("data:text/html,umur,berat,tinggi,gaji,hasil\n58,20,107,2500000,Normal", "template.txt");
    });

    document.getElementById("btn-uji-data").addEventListener('click', () => {
        if(!validate()) return;

        handlerUjiData().then(() => {
            if(dataset.length < 1) return;

            datatable_dataset = $('#table-uji').DataTable({
            "data": dataset.dataset,
            "columns": [
                { 
                    "data": "id" ,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { "data": "hasil_uji" },
                { "data": "umur" },
                { "data": "berat" },
                { "data": "tinggi" },
                { "data": "gaji" },
                { "data": "hasil" }
            ],
            "columnDefs": [
                {"className": "dt-center", "targets": "_all"},
            ],
            "select": false,
            "responsive": true, 
            "paging": false,
            "searching": false
        });
        setDataConfusion(dataset.hasil_uji);
        setDataPerhitungan(dataset.hasil_akurasi);
        });
    })

});

const downloadTemplate = (dataurl, filename) =>  {
    var a = document.createElement("a");
    a.href = dataurl;
    a.setAttribute("download", filename);
    a.click();
}

const handlerUjiData = () => {
    return new Promise((resolve, reject) => {
        if(dataset.hasOwnProperty("dataset")) {
            datatable_dataset.destroy();
        }

        let template = document.getElementById("template")
        let data = new FormData;
        data.append("template", template.files[0]);
    
        $.ajax({
            url: "<?php echo api_url()?>naive/uji_data",
            type: "POST",
            enctype: "multipart/form-data",
            headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            success: function(data) {
                if(data.success == 1) {
                    dataset = data.data;
                    document.getElementById("panel-confusion").style.display = "block";

                    resolve();
                }else {
                    toastr.error(data.message);
                    document.getElementById("panel-confusion").style.display = "none";

                    resolve();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log("Error");
                resolve();
            }
        })
    })
}

const setDataConfusion = (data) => {
    document.getElementById("normal-normal").innerHTML = data.normal.normal;
    document.getElementById("normal-kurus").innerHTML = data.normal.kurus;
    document.getElementById("normal-obesitas").innerHTML = data.normal.obesitas;

    document.getElementById("kurus-normal").innerHTML = data.kurus.normal;
    document.getElementById("kurus-kurus").innerHTML = data.kurus.kurus;
    document.getElementById("kurus-obesitas").innerHTML = data.kurus.obesitas;

    document.getElementById("obesitas-normal").innerHTML = data.obesitas.normal;
    document.getElementById("obesitas-kurus").innerHTML = data.obesitas.kurus;
    document.getElementById("obesitas-obesitas").innerHTML = data.obesitas.obesitas;
}

const setDataPerhitungan = (data) => {
    document.getElementById("true-positive").innerHTML = data.true_positive;
    document.getElementById("false-negative").innerHTML = data.false_negative;
    document.getElementById("akurasi").innerHTML = data.akurasi;
    document.getElementById("galat").innerHTML = data.galat;
}

const validate = () => {
    let template = document.getElementById("template").value;

    if(template == "") {
        toastr.warning("Template can't be empty");
        return false;
    }

    return true;

}

</script>