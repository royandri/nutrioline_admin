

<?php include_once 'cekSession.php'; ?>
<?php

$section ='dashboard';
$add ="add";

switch ($action) {
    case $add:
        $path_action=$loadview.$section.'/'.$action.'.php';        
        include_once $loadview.'template.php'; 
        break;

    default:    
        $title="Dashboard";
        $js_file=$section.'/dashboard/dashboard_js.php'; 
        $path_action=$loadview.$section.'/'.$controller.'.php';        
        include_once $loadview.'template.php'; 
        break;
}
	
?>