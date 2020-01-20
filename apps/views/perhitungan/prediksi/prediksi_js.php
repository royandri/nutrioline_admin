<script>

$(document).ready(function() {
    document.getElementById('btn-cek-gizi').addEventListener('click', () => {
        handlerCekGizi();
    })
});

const handlerCekGizi = () => {
    if(!validasi()) return;


    let form = $("#cekf")[0];
    let data = new FormData(form);

    let nama = document.getElementById('nama').value;
    let jenis_kelamin = document.getElementById('jenis_kelamin').value;
    let umur = document.getElementById('umur').value;
    let tinggi = document.getElementById('tinggi').value;
    let berat = document.getElementById('berat').value;
    let gaji = document.getElementById('gaji').value;

    $.ajax({
        type: 'POST',
        url: "<?php echo api_url()?>naive/cekgizi",
        data: {
            nama: nama,
            jenis_kelamin: jenis_kelamin,
            umur: umur,
            berat: berat,
            tinggi: tinggi,
            gaji: gaji
        },
        headers: {"Authorization": "Bearer "+localStorage.getItem("token")},
        success: function (data) {
            if (data.success == 1) {
                toastr.success(data.message);
                document.getElementById("det-hasil").innerHTML = data.data[0].status;
                
                document.getElementById("det-pemberian-makanan").innerHTML = data.data[0].rekomendasi[0].pemberian_makanan;
                document.getElementById("det-tahap-perkembangan").innerHTML = data.data[0].rekomendasi[0].tahap_perkembangan;
                document.getElementById("det-rangsangan-perkembangan").innerHTML = data.data[0].rekomendasi[0].rangsangan_perkembangan;
                document.getElementById("det-tip-sehat").innerHTML = data.data[0].rekomendasi[0].tip_sehat;

                // mean obesitas
                document.getElementById('mean-obesitas-umur').innerHTML = data.data_perhitungan["Mean"]["Mean Obesitas"]["Mean Obesitas Umur"];
                document.getElementById('mean-obesitas-gaji').innerHTML = data.data_perhitungan["Mean"]["Mean Obesitas"]["Mean Obesitas Gaji"];
                document.getElementById('mean-obesitas-tinggi').innerHTML = data.data_perhitungan["Mean"]["Mean Obesitas"]["Mean Obesitas tinggi"];
                document.getElementById('mean-obesitas-berat').innerHTML = data.data_perhitungan["Mean"]["Mean Obesitas"]["Mean Obesitas berat"];

                // mean kurus
                document.getElementById('mean-kurus-umur').innerHTML = data.data_perhitungan["Mean"]["Mean Kurus"]["Mean Obesitas Umur"];
                document.getElementById('mean-kurus-gaji').innerHTML = data.data_perhitungan["Mean"]["Mean Kurus"]["Mean Obesitas Gaji"];
                document.getElementById('mean-kurus-tinggi').innerHTML = data.data_perhitungan["Mean"]["Mean Kurus"]["Mean Obesitas tinggi"];
                document.getElementById('mean-kurus-berat').innerHTML = data.data_perhitungan["Mean"]["Mean Kurus"]["Mean Obesitas berat"];

                // mean normal
                document.getElementById('mean-normal-umur').innerHTML = data.data_perhitungan["Mean"]["Mean Normal"]["Mean Obesitas Umur"];
                document.getElementById('mean-normal-gaji').innerHTML = data.data_perhitungan["Mean"]["Mean Normal"]["Mean Obesitas Gaji"];
                document.getElementById('mean-normal-tinggi').innerHTML = data.data_perhitungan["Mean"]["Mean Normal"]["Mean Obesitas tinggi"];
                document.getElementById('mean-normal-berat').innerHTML = data.data_perhitungan["Mean"]["Mean Normal"]["Mean Obesitas berat"];

                // sd obesitas
                document.getElementById('sd-obesitas-umur').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Obesitas"]["SD Umur"];
                document.getElementById('sd-obesitas-gaji').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Obesitas"]["SD gaji"];
                document.getElementById('sd-obesitas-tinggi').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Obesitas"]["SD tinggi"];
                document.getElementById('sd-obesitas-berat').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Obesitas"]["SD berat"];
                // sd kurus
                document.getElementById('sd-kurus-umur').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Kurus"]["SD Umur"];
                document.getElementById('sd-kurus-gaji').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Kurus"]["SD gaji"];
                document.getElementById('sd-kurus-tinggi').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Kurus"]["SD tinggi"];
                document.getElementById('sd-kurus-berat').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Kurus"]["SD berat"];

                // sd normal
                document.getElementById('sd-normal-umur').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Normal"]["SD Umur"];
                document.getElementById('sd-normal-gaji').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Normal"]["SD gaji"];
                document.getElementById('sd-normal-tinggi').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Normal"]["SD tinggi"];
                document.getElementById('sd-normal-berat').innerHTML = data.data_perhitungan["Standar Deviasi"]["SD Normal"]["SD berat"];

                 // dg obesitas
                document.getElementById('dg-obesitas-umur').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Obesitas"]["SD Umur"];
                document.getElementById('dg-obesitas-gaji').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Obesitas"]["SD gaji"];
                document.getElementById('dg-obesitas-tinggi').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Obesitas"]["SD tinggi"];
                document.getElementById('dg-obesitas-berat').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Obesitas"]["SD berat"];

                 // dg kurus
                 document.getElementById('dg-kurus-umur').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Kurus"]["SD Umur"];
                document.getElementById('dg-kurus-gaji').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Kurus"]["SD gaji"];
                document.getElementById('dg-kurus-tinggi').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Kurus"]["SD tinggi"];
                document.getElementById('dg-kurus-berat').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Kurus"]["SD berat"];

                // dg normal
                document.getElementById('dg-normal-umur').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Normal"]["SD Umur"];
                document.getElementById('dg-normal-gaji').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Normal"]["SD gaji"];
                document.getElementById('dg-normal-tinggi').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Normal"]["SD tinggi"];
                document.getElementById('dg-normal-berat').innerHTML = data.data_perhitungan["Densitas Gauss"]["DG Normal"]["SD berat"];


                // probabilitas
                document.getElementById('probabilitas-obesitas').innerHTML = data.data_perhitungan["Probabilitas"]["Obesitas"];
                document.getElementById('probabilitas-kurus').innerHTML = data.data_perhitungan["Probabilitas"]["Kurus"];
                document.getElementById('probabilitas-normal').innerHTML = data.data_perhitungan["Probabilitas"]["Normal"];

                // normalisasi
                document.getElementById('likelihood-obesitas').innerHTML = data.data_perhitungan["Likelihood (Normalisasi)"]["Obesitas"];
                document.getElementById('likelihood-kurus').innerHTML = data.data_perhitungan["Likelihood (Normalisasi)"]["Kurus"];
                document.getElementById('likelihood-normal').innerHTML = data.data_perhitungan["Likelihood (Normalisasi)"]["Normal"];

                $("#hasil-perhitungan").show();
            }else{                    
                toastr.warning(data.message);
                $("#hasil-perhitungan").hide();

            }
        },
        error: function (e) {
            console.log("ERROR : ", e);
            toastr.warning(data.message);
        }
    });
}

const validasi = () => {
    let nama = document.getElementById('nama').value;
    let jenis_kelamin = document.getElementById('jenis_kelamin').value;
    let umur = document.getElementById('umur').value;
    let tinggi = document.getElementById('tinggi').value;
    let berat = document.getElementById('berat').value;
    let gaji = document.getElementById('gaji').value;


    if(nama == "") {
        toastr.warning("Nama can't be empty")
        return false;
    }

    if(jenis_kelamin == "") {
        toastr.warning("Jenis can't be empty")
        return false;
    }

    if(umur == "") {
        toastr.warning("Umur can't be empty")
        return false;
    }
    if(tinggi == "") {
        toastr.warning("Tinggi can't be empty")
        return false;
    }

    if(berat == "") {
        toastr.warning("Berat can't be empty")
        return false;
    }

    if(gaji == "") {
        toastr.warning("Pendapatan can't be empty")
        return false;
    }

    return true;
}

</script>