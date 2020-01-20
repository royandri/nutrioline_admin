<?php include_once 'cekSession.php'; ?>

<?php

$section ="management";

switch ($action) {

  case 'user':
    ?> <script> cekMenu("<?php echo $section ?>/user"); </script><?php
    $title="User";  
    $js_file=$section.'/user/user_js.php'; 
    $path_action=$loadview.$section.'/user.php';      
    include_once $loadview.'template.php'; 
  break;

  case 'admin':   
    ?> <script> cekMenu("<?php echo $section ?>/admin"); </script><?php
    $title="Admin";  
    $js_file=$section.'/admin/admin_js.php'; 
    $path_action=$loadview.$section.'/admin.php';      
    include_once $loadview.'template.php'; 
  break;

  default:
    $title="404";  
    $path_action=$loadview.'/404.php'; 
    include_once $loadview.'template.php'; 
}
?>