<?php include_once 'cekSession.php'; ?>

<?php

$section ="perhitungan";

switch ($action) {

  case 'prediksi':
    $title="Prediksi Gizi";  
    $js_file=$section.'/prediksi/prediksi_js.php'; 
    $path_action=$loadview.$section.'/prediksi.php';      
    include_once $loadview.'template.php'; 
  break;

  case 'uji':   
    $title="Uji Dataset";  
    $js_file=$section.'/uji/uji_js.php'; 
    $path_action=$loadview.$section.'/uji.php';      
    include_once $loadview.'template.php'; 
  break;

  case 'ujidata':   
    $title="Uji Data";  
    $js_file=$section.'/ujidata/ujidata_js.php'; 
    $path_action=$loadview.$section.'/ujidata.php';      
    include_once $loadview.'template.php'; 
  break;

  default:
    $title="404";  
    $path_action=$loadview.'/404.php'; 
    include_once $loadview.'template.php'; 
}
?>