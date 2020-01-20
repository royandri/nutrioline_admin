<?php include_once 'cekSession.php'; ?>

<?php

$section ="master";

switch ($action) {

  case 'dataset':
    $title="Dataset";  
    $js_file=$section.'/dataset/dataset_js.php'; 
    $path_action=$loadview.$section.'/dataset.php';      
    include_once $loadview.'template.php'; 
  break;

  case 'rekomendasi':   
    $title="Rekomendasi";  
    $js_file=$section.'/rekomendasi/rekomendasi_js.php'; 
    $path_action=$loadview.$section.'/rekomendasi.php';      
    include_once $loadview.'template.php'; 
  break;

  default:
    $title="404";  
    $path_action=$loadview.'/404.php'; 
    include_once $loadview.'template.php'; 
}
?>