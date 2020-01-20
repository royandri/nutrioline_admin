<?php
class crudUmum {
	private $db;
	public $sel_q="";
	public $table_q="";
	public $where_q="";
	public $join_q="";
	public $query="";
	function __construct($DB_con) {
		$this->db = $DB_con;
		$this->query="";
	}

	public function query() {
		if (!$this->sel_q) {
			$this->sel_q='SELECT * ';
		}
		if (!$this->table_q) {
			echo "table empty ";
			die();
		}
			$this->query = $this->sel_q.
			$this->table_q.
			$this->join_q.
			$this->where_q;
			return $this->query;
	}

	public function sel($sel) {
			$this->sel_q .= "SELECT $sel";
	}
	public function getTable($tabel=0) {
		if (!$tabel) {
			echo "table empty ";
			die();
		}
			$this->table_q .= " from $tabel ";
	}
	public function where($kol,$val) {
		if ($this->where_q) {
			$this->where_q .= " AND $kol='$val' ";
		}else{			
			$this->where_q .= " WHERE $kol='$val' ";
		}
	}
	public function join($table,$on,$join='inner') {
			$this->join_q .= " $join JOIN $table on $on ";
	}

	public function eksekusi()
	{
		try
		{			
			$q=$this->query();
			$stmt = $this->db->prepare($q);
			$stmt->execute();
			$data=$stmt->fetchAll();
			$this->query='';
			return $data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			die();//return false;
		}
	}
	public function eksekusiStmt()
	{
		try
		{			
			$q=$this->query();
			$stmt = $this->db->prepare($q);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			die();//return false;
		}
	}
	/////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////

	
	public function get_id_admin_by_token($token) {
		try {
			$query = "SELECT id_admin FROM admin
			where token='$token'";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$row = $stmt->fetch();
			return $row['id_admin'];
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	public function SelectWhere($table,$kolom,$val)
	{
		try
		{			
			$q="SELECT * from $table where $table.$kolom='$val'";
			$stmt = $this->db->prepare($q);
			$stmt->execute();
			$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

			return $data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	public function Delete($table,$kolom,$val)
	{
		try
		{			
			$q="SELECT * from $table where $table.$kolom='$val'";
			$stmt = $this->db->prepare($q);
			$stmt->execute();
			$data=$stmt->fetch();
			if ($data) {				
					$q="DELETE from $table where $table.$kolom='$val'";
					$stmt = $this->db->prepare($q);
					$stmt->execute();
			}else{
				echo "data tidak delete ditemukan";	
				return false;
			}

			return $data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	public function SelectAll($table)
	{
		try
		{			
			$q="SELECT * from $table";
			$stmt = $this->db->prepare($q);
			$stmt->execute();
			$data=$stmt->fetchAll();

			return $data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	public function insert($table,$data)
	{
		$key_array=array_keys($data);
		$key=implode(',',$key_array);
		$VALUE=array();;
		for ($i=0; $i <sizeof($key_array) ; $i++) { 
			//$VALUE[$i]=":".$key_array[$i];
			$VALUE[$i]="?";
		}
		$isi=implode(',', $VALUE);
		try
		{
			$q="INSERT INTO $table
            ($key)
			VALUES ($isi);";
			$stmt = $this->db->prepare($q);
			for ($i=0; $i <sizeof($key_array) ; $i++) { 
				$stmt->bindparam(($i+1),$data[$key_array[$i]]);
			}
			//print_r($q);die();

			$stmt->execute();
			//$stmt->debugDumpParams();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			die();
			return false;
		}
	}
	public function insert_id($table,$data)
	{
		$key_array=array_keys($data);
		$key=implode(',',$key_array);
		$VALUE=array();;
		for ($i=0; $i <sizeof($key_array) ; $i++) { 
			$VALUE[$i]=":".$key_array[$i];
		}
		$isi=implode(',', $VALUE);
		try
		{
			$q="INSERT INTO $table
            ($key)
			VALUES ($isi);";
			$stmt = $this->db->prepare($q);
			for ($i=0; $i <sizeof($key_array) ; $i++) { 
				$stmt->bindparam(":".$key_array[$i],$data[$key_array[$i]]);
			}
			//print_r($q);die();

			$stmt->execute();
			$id = $this->db->lastInsertId();

			return $id;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	public function update($table,$data,$id,$kolom_id)
	{
		$key_array=array_keys($data);
		$key=implode(',',$key_array);
		$setKey=array();
		$VALUE=array();
		for ($i=0; $i <sizeof($key_array) ; $i++) { 
			$VALUE[$i]=":".$key_array[$i];
		}
		for ($i=0; $i <sizeof($key_array) ; $i++) { 
			$setKey[$i]=$key_array[$i]."=:".$key_array[$i];
		}
		$setKeyisi=implode(',', $setKey);
		try
		{
			$q="UPDATE $table
            SET $setKeyisi
			WHERE $table.$kolom_id='$id';";
			$stmt = $this->db->prepare($q);
			for ($i=0; $i <sizeof($key_array) ; $i++) { 
				$stmt->bindparam(":".$key_array[$i],$data[$key_array[$i]]);
			}
			//print_r($q);die();

			$stmt->execute();

			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	function MultiInsert($tableName, $data, $pdoObject=""){
    	$pdoObject = ($pdoObject =="") ? $this->db : $pdoObject ;
	    //Will contain SQL snippets.
	    $rowsSQL = array();
	 
	    //Will contain the values that we need to bind.
	    $toBind = array();
	    
	    //Get a list of column names to use in the SQL statement.
	    $columnNames = array_keys($data[0]);
	 
	    //Loop through our $data array.
	    foreach($data as $arrayIndex => $row){
	        $params = array();
	        foreach($row as $columnName => $columnValue){
	            $param = ":" . $columnName . $arrayIndex;
	            $params[] = $param;
	            $toBind[$param] = $columnValue; 
	        }
	        $rowsSQL[] = "(" . implode(", ", $params) . ")";
	    }
	 
	    //Construct our SQL statement
	    $sql = "INSERT INTO `$tableName` (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
	 
	    //Prepare our PDO statement.
	    $pdoStatement = $pdoObject->prepare($sql);
	 
	    //Bind our values.
	    foreach($toBind as $param => $val){
	        $pdoStatement->bindValue($param, $val);
	    }
	    
	    //Execute our statement (i.e. insert the data).
	    return $pdoStatement->execute();
	}
}