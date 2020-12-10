<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	function __construct() {
        parent::__construct();
        $dtlogin = $this->authmodel->cek_login();
        if(is_array($dtlogin)){
        	redirect(base_url("maincontroller"));
        }
    }

	public function index(){
		$this->load->view('auth/login');
	}

	public function login(){
		$u = $this->input->post("u");
		$p = hash1arah($this->input->post("p"));
		$stlogin = $this->authmodel->login($u, $p);
		if(count($stlogin) > 0){
			foreach ($stlogin as $sl){
        		$usr = $sl->username;
        		$pas = $sl->password;
        	}
        	$token = base64_encode($this->encryption->encrypt($usr."|".$pas));
        	$this->session->set_userdata("pa3982l", $token);
            $this->mlog->log_history("Akses","Login","Login Berhasil");
        	echo "1";
		}else{
			echo "0";
		}
	}


}
