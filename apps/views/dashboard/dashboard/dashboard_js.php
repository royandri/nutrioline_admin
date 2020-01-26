
<script>

var dashboard = {};

$(document).ready(() => {
    getDashboard().then(() => {
        document.getElementById("pengujian").innerHTML = dashboard.jumlah_pengujian;
        document.getElementById("normal").innerHTML = dashboard.jumlah_normal;
        document.getElementById("kurus").innerHTML = dashboard.jumlah_kurus;
        document.getElementById("obesitas").innerHTML = dashboard.jumlah_obesitas;
    });
})

function getDashboard() {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'GET',
            url: "<?php echo api_url()?>dashboard/get_dashboard",
            headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
            success: function (data) {
                dashboard = data;
                resolve();
            },
            error: function (e) {
                console.log("ERROR : ", e);
            }
        });
    })
}


</script>