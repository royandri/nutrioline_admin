<?php

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	
	public function login($nameuser,$password)
	{
		$stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE nameuser=:nameuser");
		$stmt->bindparam(":nameuser",$nameuser);
		//$stmt->bindparam(":passuser",$password);
		$stmt->execute();
			//$row['data']=$stmt->fetchAll();	
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		
		if (password_verify($password, $editRow['passuser'])) {
			$id=$editRow['id'];
			$image=$editRow['foto'];
			$email=$editRow['nameuser'];
			$no_hp=$editRow['no_hp'];
			$nama=$editRow['nama'];
			$token=md5($id);
			$update=$this->db->prepare("UPDATE tbl_users SET token=:token WHERE id=:id ");
			$update->bindparam(":token",$token);
			$update->bindparam(":id",$id);
			$update->execute();
	
			$level="admin";
	
			create_sesi($token,$image,$nama,$no_hp,$email,$level);
			
			return $id;
		} else {
			return false;
		}
	}
	
	
}
