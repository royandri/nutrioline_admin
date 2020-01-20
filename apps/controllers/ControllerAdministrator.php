<?php include_once 'cekSession.php'; ?>



<?php

$section = "administrator";
$getadmin = "getadmin";
$add = "add";
$edit = "edit";
$delete = "delete";
$processadd = "processadd";
$processedit = "processedit";
$page = "page";

switch ($action) {
    case '':
        $title="Daftar Administrator";  
        $js_file=$section.'/admin_js.php'; 

        $path_action=$loadview.$section.'/'.$controller.'.php';      
        include_once $loadview.'template.php'; 
    break;

    case 'kategori':
        $title = "Kategori Admin";
        $js_file=$section.'/kategori/kategori_js.php'; 
        $path_action=$loadview.$section.'/kategori/kategori.php';      
        include_once $loadview.'template.php'; 
    break;

    case 'menu';
        $title = "Menu Admin";
        $js_file=$section.'/menu/menu_js.php'; 
        $path_action=$loadview.$section.'/menu/menu.php';      
        include_once $loadview.'template.php'; 
    break;

    case $add:
        $title="Tambah Administrator"; 
        $js_file=$section.'/add_js.php';
        $path_action=$loadview.$section.'/'.$action.'.php';      
        include_once $loadview.'template.php'; 
    break;

    case $edit:
        $title="Edit Administrator";   
        $js_file=$section.'/edit_js.php';
        $path_action=$loadview.$section.'/'.$action.'.php';      
        include_once $loadview.'template.php'; 
    break;

    case $delete: break;

    default:    
        $title="404";  
        $path_action=$loadview.'/404.php'; 
        include_once $loadview.'template.php'; 
}

?>