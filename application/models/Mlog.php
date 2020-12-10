<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mlog extends CI_Model {
	
	public function log_history($data, $operasi, $keterangan){
		$ayy = $this->encryption->decrypt(base64_decode($this->session->userdata(nama_sesi)));
		$dtl = explode("|", $ayy);
		$id = $dtl[0];
		$kode = kode_oto();
		$ip = 'myip '.$_SERVER["REMOTE_ADDR"];
		$sql = "INSERT INTO log_history VALUES('$kode','$data','$operasi','$keterangan','$id','$ip',(SELECT NOW()))";
		$querySQL = $this->db->query($sql);	
	}

	public function lastlogin(){
		$q = "SELECT l.nama,g.tgl FROM `login` l INNER JOIN `log_history` g ON l.username = g.id_user ORDER BY tgl DESC LIMIT 1";
		$querySQL = $this->db->query($q);
		return $querySQL->result();

	}

}