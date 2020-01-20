
<script>

$(document).ready(function(){
    $("#tanggal_sekarang").html(getTanggal());
    lodaDataHandler();
    // chartDashboard();
    // chartDashboardWeek();
});


/**
 * Menampilkan statstik harian 1 perminggu
 */
const chartDashboardWeek= () => {
    var container = document.getElementById('chart-area-2');
    var theme = { series: { colors: ['orange']}};
    tui.chart.registerTheme('newTheme', theme);

    var options = {
        chart: { width: 550, height: 400, title: ''},
        yAxis: { title: 'Kilogram', pointOnColumn: true},
        xAxis: { title: 'Tanggal'},
        series: { spline: true, showDot: false },
        tooltip: { suffix: 'kg'},
        legend: { align: 'top' },
        theme: 'newTheme'
    };


    GI.ajaxPost({
        url: '<?php echo api_url()?>dashboard/getChartWeek',
        params: {limit: 7},
        success: function(res) {
            if(res.success == 1) {
                if(res.data.tanggal.length > 0 && res.data.total_berat.length > 0) {
                    var data = {
                        categories: res.data.tanggal,
                        series: [
                            {
                                name: 'Total Berat',
                                data: res.data.total_berat
                            }
                        ]
                    };
                    tui.chart.lineChart(container, data, options);
                }else{
                    $("#isi_stat_mingguan").html("<h4 class='no-data'>Tidak ada data ! </h4>");
                }
                $("#statistik-harian").show();
            }else {
                $("#statistik-harian").hide();
            }
        }
    })
}


/**
 * Menampilkan data ke grafik
 */
const chartDashboard = () => {
    var container = document.getElementById('chart-area');
    GI.ajaxPost({
        url: '<?php echo api_url()?>dashboard/getChartToday',
        params: {limit: 7},
        success: function(res) {
            if(res.success == 1) {
                if(res.data.data_kota.length > 0 && res.data.total_kota.length > 0) {
                    var data = {
                        categories: res.data.data_kota ,
                        series: [
                            {
                                name: getTanggal(),
                                data: res.data.total_kota
                            }
                        ]
                    };
                    
                    var max = Math.max.apply(Math, res.data.total_kota);
                    max += parseInt(max/2);

                    var options = {
                        chart: { width: 550, height: 400, title: '', format: '10' },
                        yAxis: { title: 'Kilogram', min: 0, max: max },
                        xAxis: { title: 'Kota' },
                        legend: { align: 'top' }
                    };
                    tui.chart.columnChart(container, data, options);

                }else {
                    $("#isi_stat_harian").html("<h4 class='no-data'>Tidak ada data ! </h4>");
                }
                $("#statistik-harian").show();
            }else {
                $("#statistik-harian").hide();
            }
        }
    })

}


/**
* Fungsi untuk mengambil tanggal sekarang
* Return tanggal sekarang dengan hari dan bulan bahasa Indonesia
*/
const getTanggal = () => {
    let months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    let myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    let date = new Date();
    let day = date.getDate();
    let month = date.getMonth();
    let thisDays = date.getDay(),
    
    thisDay = myDays[thisDays];
    let yy = date.getYear();
    let year = (yy < 1000) ? yy + 1900 : yy;
    let tanggal = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;

    return tanggal;
}

/**
* Load dashboard data
*/
const loadData = () => {
    return new Promise(function(resolve, reject) {
        GI.ajaxPost({
            url: '<?php echo api_url()?>dashboard/getDashboard',
            params: {},
            success: function(data) {
                if(data.success == 1) {
                    document.getElementById("total_pengiriman").innerHTML =  addDashboardSTT(data.data.total_all['jumlah_stt']) ;
                    document.getElementById("departure").innerHTML =  addDashboardSTT(data.data.total_dept['jumlah_stt']) ;
                    document.getElementById("pending").innerHTML =  addDashboardSTT(data.data.total_pending['jumlah_stt']) ;
                    document.getElementById("reject").innerHTML =  addDashboardSTT(data.data.total_reject['jumlah_stt']) ;

                    document.getElementById("total_pengiriman-2").innerHTML =  addDashboardKG(data.data.total_all['total_colly'], data.data.total_all['total_kilo']) ;
                    document.getElementById("departure-2").innerHTML =  addDashboardKG(data.data.total_dept['total_colly'], data.data.total_dept['total_kilo']) ;
                    document.getElementById("pending-2").innerHTML =  addDashboardKG(data.data.total_pending['total_colly'], data.data.total_pending['total_kilo']) ;
                    document.getElementById("reject-2").innerHTML =  addDashboardKG(data.data.total_reject['total_colly'], data.data.total_reject['total_kilo']) ;
                    $("#rekapitulasi-harian").show();
                }else {
                    $("#rekapitulasi-harian").hide();
                }
                resolve();
            }
        });
    })
}

/**
 * Add data to dashboard
 * @param Integer stt
 * @param Integer kg
 * return data dathboard
 */
const addDashboardSTT = (stt) => {
    stt = stt == null ? 0 : stt;

    let data = `
        <h3>
            ${stt}<small style="font-size: 12pt !important; color: white !important; display: inline-block">stt</small>
        </h3>
    `;
    return data;
}

const addDashboardKG = (colly, kg) => {
    colly = colly == null ? 0 : colly;
    kg = kg == null ? 0 : kg;

    let data = `
        <h3>
            ${colly}<small style="font-size: 12pt !important; color: white !important; display: inline-block">colly</small>
            /
            ${kg}<small style="font-size: 12pt !important; color: white !important; display: inline-block">kg</small>
        </h3>
    `;
    return data;
}

/*
* Stop loading url after fetch data
* @param
* @return
*/
const stopLoading = () => {
    var getClass = document.querySelectorAll('.temp-bg.fetch-load');
    for(let i = 0; i < getClass.length; i++) {
        getClass[i].classList.remove("temp-bg");
        getClass[i].classList.remove("fetch-load");
    }
}

/*
* Execute load data then stop loading animation
* @param
* @return
*/
const lodaDataHandler = () => {
    loadData().then(function(){
        stopLoading();
    })
}

</script>