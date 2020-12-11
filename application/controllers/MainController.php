<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	function __construct() {
      parent::__construct();
      $dtlogin = $this->authmodel->cek_login();
      if(is_array($dtlogin)){

      }else{redirect(base_url('auth'));}
  }

	public function index()
	{
		redirect(base_url()."MainController/list/");
	}

	public function logout(){
      $this->mlog->log_history("Akses","Logout","Logout Berhasil");
      unset($_SESSION[nama_sesi]);
      redirect(base_url("auth"));
    }

	public function list(){
      $data['fill'] = 'component/main';
      $this->load->view('masterview',$data);
  }

	public function lastid(){
      $dt = $this->connector->select_lastid();
			if(count($dt) > 0){
        foreach ($dt as $d){
          $q1 = $d->id_barang;
        }
        echo "$q1";
				}else{
				echo "0";
				}
  }

	public function store(){
      $f1 = trim(str_replace("'","''",$this->input->post("v1")));
      $f2 = trim(str_replace("'","''",$this->input->post("v2")));
      $f3 = trim(str_replace("'","''",$this->input->post("v3")));
      $f4 = trim(str_replace("'","''",$this->input->post("v4")));
			$f5 = trim(str_replace("'","''",$this->input->post("v5")));

			$t = 'barang'; //nama table
      $operasi = $this->connector->insert($t,$f1,$f2,$f3,$f4,$f5);
      echo $operasi;
  }

	public function filter(){
      $where = $this->input->post("no");
			$table = "barang";
			$field = "id_barang";
      $dt = $this->connector->filter($table,$field,$where);
      if(count($dt) > 0){
        foreach ($dt as $d){
          $q1 = $d->id_barang;
          $q2 = $d->nama_barang;
          $q3 = $d->harga;
          $q4 = $d->stok;
          $q5 = $d->id_supplier;
        }
        echo "$q1|$q2|$q3|$q4|$q5";
      }else{
        echo "0";
      }
  }

	public function dataJSON(){
        $dtJSON = '{"data": [xxx]}';
        $dtisi = "";
				$t = 'barang';
				$f = '*';
	      $dt = $this->connector->select($f,$t);
				$numbering = '1';
        foreach ($dt as $k){
						$c0 = $numbering ++ ;
            $c1 = $k->id_barang;
						$c2 = $k->nama_barang;
						$c3 = $k->harga;
						$c4 = $k->stok;
            $btnedit = "<button type='button' class='btn btn-outline-secondary btn-sm' onclick='get(".$c1.")'>Edit</button> | <button type='button' class='btn btn-outline-warning btn-sm' data-kode='".$c1."' onclick='hapus(this)'>Hapus</button>";
            $dtisi .= '["'.$c0.'","'.$c2.'","'.$c3.'","'.$c4.'","'.$btnedit.'"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
  }

	public function update(){
      $f1 = trim(str_replace("'","''",$this->input->post("v1")));
      $f2 = trim(str_replace("'","''",$this->input->post("v2")));
      $f3 = trim(str_replace("'","''",$this->input->post("v3")));
      $f4 = trim(str_replace("'","''",$this->input->post("v4")));
			$f5 = trim(str_replace("'","''",$this->input->post("v5")));

			$t = 'barang';
      $operasi = $this->connector->update($t,$f1,$f2,$f3,$f4,$f5);
      echo $operasi;
  }

	public function drop(){
				$f1 = trim($this->input->post("kd"));
				$operasi = $this->connector->delete($f1);
				echo  $operasi;
	}

}
