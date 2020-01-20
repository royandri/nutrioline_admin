<?php include_once 'cekSession.php'; ?>

<?php

$section = "profil";

switch ($action) {
    case '':
        $title="Profil";  
        $js_file=$section.'/profil/profil_js.php'; 
        $path_action=$loadview.$section.'/'.$controller.'.php';      
        include_once $loadview.'template.php'; 
    break;
    case 'updateloggedin': 
        if(isset($_POST['foto_lama']) || isset($_POST['kode_name']) || isset($_FILES['foto']['tmp_name'])) {
            $folder  = $_SERVER['DOCUMENT_ROOT'].'/admin/public/images/admin';
            $file_lama = $folder."/".$_POST['foto_lama'];
            $file = $folder.'/'.$_POST['kode_name'];
    
            if(file_exists($file_lama)) {
                unlink($file_lama);
            }
    
            $upload = move_uploaded_file($_FILES['foto']['tmp_name'], $file);
            echo $upload ? " sukses" : " gagal";
            die();
        }
        $title="404";  
        $path_action=$loadview.'/404.php'; 
        include_once $loadview.'template.php'; 
    break;

    default:    
        $title="404";  
        $path_action=$loadview.'/404.php'; 
        include_once $loadview.'template.php'; 
}

?>