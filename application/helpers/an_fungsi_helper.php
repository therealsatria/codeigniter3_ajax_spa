<?php
    function hash1arah($ps){
        $g = md5(base64_encode(openssl_encrypt($ps, "AES-256-CBC", kunci_ssl, 0, "0123456789abcdef")));
        return $g;
    }

    function tgl_indo($xy){
    	$tgl = substr($xy, 8, 2);
    	$bln = substr($xy, 5, 2);
     	$thn = substr($xy, 0, 4);
    	return $tgl."-".$bln."-".$thn;
    }

    function tgl_indo_lengkap($xy){
        $tgl = substr($xy, 8, 2);
    	$thn = substr($xy, 0, 4);
    	switch(substr($xy, 5, 2)){
    		case "01":
    			$bln = "Jan";
    			break;
    		case "02":
    			$bln = "Feb";
    			break;
    		case "03":
    			$bln = "Mar";
    			break;
    		case "04":
    			$bln = "Apr";
    			break;
    		case "05":
    			$bln = "Mei";
    			break;
    		case "06":
    			$bln = "Jun";
    			break;
    		case "07":
    			$bln = "Jul";
    			break;
    		case "08":
    			$bln = "Agu";
    			break;
    		case "09":
    			$bln = "Sep";
    			break;
    		case "10":
    			$bln = "Okt";
    			break;
    		case "11":
    			$bln = "Nov";
    			break;
    		default:
    			$bln = "Des";
    			break;
    	}
    	return $tgl. " ".$bln." ".$thn;
    }

    function hari_indo($xy){
    	$h = date("w", strtotime($xy));
    	$hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
    	return $hari[$h];
    }

    function tgl_terakhir_bulan_lalu($xy){
    	$bln = substr($xy, 5, 2);
     	$thn = substr($xy, 0, 4);
     	$h = date("Y-m-d", strtotime($thn."-".$bln."-00"));
     	return $h;
    }

    function tgl_terakhir_bulan_ini($xy){
        $bln = substr($xy, 5, 2);
        $thn = substr($xy, 0, 4);
        $h = date("t", strtotime($xy));
        return $thn."-".$bln."-".$h;
    }

    function kode_oto(){
        date_default_timezone_set("Asia/Jakarta");
        return strtotime(date("Y-m-d H:i:s"));
	}
	
	function ambil_user(){
        $ayy = $this->encryption->decrypt(base64_decode($this->session->userdata(nama_sesi)));
		$dtl = explode("|", $ayy);
		return $dtl[0];
    }