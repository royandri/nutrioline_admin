<script>
var datatable_dataset = "";
var dataset = [];

$(document).ready(function() {
    getData().then(() => {
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
});

function getData() {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'GET',
            url: "<?php echo api_url()?>naive/uji_dataset",
            headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
            success: function (data) {
                dataset = data;
                resolve();
            },
            error: function (e) {
                console.log("ERROR : ", e);
            }
        });
    })
}

function setDataConfusion(data) {
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

function setDataPerhitungan(data) {
    document.getElementById("true-positive").innerHTML = data.true_positive;
    document.getElementById("false-negative").innerHTML = data.false_negative;
    document.getElementById("akurasi").innerHTML = data.akurasi;
    document.getElementById("galat").innerHTML = data.galat;

    document.getElementById("panel-confusion").style.display = "block";
}

</script>