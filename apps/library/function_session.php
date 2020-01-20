<?php


/*
| -------------------------------------------------------------------
| 					ABOUT THIS FUNCTION
| -------------------------------------------------------------------
|		 
| 		cek_sesi		: 	Mengecek Sesi yang Sedang Berlangsung berdasarkan TOKEN
|		create_sesi		:	Membuat Sesi Baru
|		destroy_sesi	:	Hapus Semua Sesi

| For complete instructions please read the 'SESSION FUNCTION'
| page of the Documentation.
|
| -------------------------------------------------------------------
| 							END OF NOTE
| -------------------------------------------------------------------
*/


function cek_sesi($controller) {
	$token=$_SESSION['token'];
	$level=$_SESSION['level'];
	if(empty($token)){
	
		if($controller!="login" ){	
			destroy_sesi();
			$url=base_url()."login";

	header('location: '.$url);
	exit;	
		}
	}else if ($level!='USER'){


		if($controller!="login" ){	
			destroy_sesi();
			$url=base_url()."login";

	header('location: '.$url);
	exit;	

	}		
		}
}

function cek_sesi_admin($controller) {
	$token=$_SESSION['token'];
	$level=$_SESSION['level'];
	if(empty($token)){
	
			destroy_sesi();
			$url=base_url()."login";

	header('location: '.$url);
	exit;	
		
	}
	
}





function create_sesi($token,$image,$nama,$no_hp,$email,$level){
$_SESSION['token']=$token;	
$_SESSION['image']=$image;	
$_SESSION['nama']=$nama;	
$_SESSION['no_hp']=$no_hp;	
$_SESSION['email']=$email;	
$_SESSION['level']=$level;	
}

function get_sesi(){

	$token=$_SESSION['token'];
	return $token;
}

function destroy_sesi(){
session_destroy();
$url=base_url()."login";
header("location:".$url.""); 
}

?>