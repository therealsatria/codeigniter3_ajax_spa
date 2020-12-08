<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Connector extends CI_Model {

  function select($field, $table){
		$query = ("SELECT $field FROM `$table`;");
    return $this->db->query($query)->result();
	 }

   function select_lastid(){
 		$query = ("SELECT id_barang FROM `barang` ORDER BY id_barang DESC LIMIT 1 ;");
     return $this->db->query($query)->result();
 	 }

  function insert($table,$d1,$d2,$d3,$d4,$d5){
 		$query = ("INSERT INTO $table VALUES ('$d1','$d2','$d3','$d4','$d5','');");
    $querySQL = $this->db->query($query);
    if($querySQL){return "1";}
    else{return "0";}
 	 }

   function filter($table,$field,$where){
 		$q = "SELECT * FROM $table WHERE $field = '$where' ";
 		$qSQL = $this->db->query($q);
 		if($qSQL){return $qSQL->result();
 		}else{return 0;}
 	}

  public function update($table,$d1,$d2,$d3,$d4,$d5){
		$sql = "UPDATE $table SET nama_barang='$d2', harga='$d3', stok='$d4', id_supplier='$d5' WHERE id_barang='$d1'";
		$querySQL = $this->db->query($sql);
		if($querySQL){return "1";}
		else{return "0";}
	}

  public function delete($no){
		$sql = "DELETE FROM barang WHERE id_barang='$no'";
		$querySQL = $this->db->query($sql);
		if($querySQL){return "1";}
		else{return "0";}
	}

}
