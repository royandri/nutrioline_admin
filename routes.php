<?php 


	$path='apps/controllers/Controller'.ucfirst($controller).'.php';
    if (file_exists($path))  {
    	$loadview ='apps/views/';
    	$getview  ='apps/views/theme/';
    	$getmodel ='apps/models/Model';
		include_once $path;  		
	} else {
		include_once 'apps/views/404.php';
	}

?>