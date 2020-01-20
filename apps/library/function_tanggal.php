<?php 
function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;     
    return($result);
}




function ubahtanggal2($date){
$date=date("d M Y",strtotime($date)); 
return $date;
}

function ubahtanggal($date){
$date=date("d/m/Y",strtotime($date)); 
return $date;
}

function ubahwaktu($date){
$date=date("d/m/Y H:i",strtotime($date)); 
return $date;
}

function ubahwaktu2($date){
$date=date("d M Y H:i",strtotime($date)); 
return $date;
}



?>