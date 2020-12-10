<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authmodel extends CI_Model {

	public function cek_login(){
		if($this->session->userdata(nama_sesi)){
			$ayy = $this->encryption->decrypt(base64_decode($this->session->userdata(nama_sesi)));
			$dtl = explode("|", $ayy);
			$usr = $dtl[0];
			$pas = $dtl[1];
			$sql = "SELECT * FROM login WHERE username = '$usr' AND password = '$pas'";
			$querySQL = $this->db->query($sql);
			return $querySQL->result();
		}else{return 0;}
	}

	public function login($u, $p){
		$sql = "SELECT * FROM login WHERE username = '$u' AND password = '$p'";
		$querySQL = $this->db->query($sql);
		if($querySQL){
			return $querySQL->result();
		}else{return 0;}
	}

	public function update_password($b, $c){
		$sql = "UPDATE login SET password = '$b' WHERE username = '$c'";
		$querySQL = $this->db->query($sql);
        if($querySQL){$status = "1";}
        else {$status = "0";}
        return $status;
	}

	public function register($u, $n, $p, $l){
		$sql = "INSERT INTO `login` (`username`, `nama`, `password`, `level`) VALUES ('$u', '$n', '$p', '$l') ";
		$querySQL = $this->db->query($sql);
		if($querySQL){$status = "1";}
        else {$status = "0";}
        return $status;
	}
}
