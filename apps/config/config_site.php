<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // 1: Development 0: Launching


date_default_timezone_set('Asia/Jakarta');
$datenow		=date('Y-m-d H:i:s');


function base_url(){	
  $url_base   ='http://'.$_SERVER['HTTP_HOST'].str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
return $url_base;
}

function api_url(){	
  // $url_base   ='http://54.169.134.192/apiweb_adminpusat_pro/public/v1/';;
  // $url_base   ='http://54.169.134.192/apiweb_adminpusat/public/v1/';;
  $url_base   ='http://localhost:8080/v1/';
  return $url_base;
}


function asset_url(){
		$url_asset      = base_url().'assets/';
		return $url_asset;
}

function site_title(){
		$site_title      ="Nutrioline";
		return $site_title;
}

function cdn_url(){
  $url_asset      ='';
  return $url_asset;
}

?>