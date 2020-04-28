<?php
class Master_data_kantor extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}


	function index(){
        $prm_mater_kantor = PRM_MASTER_KANTOR;
		$group_menu = $this->session->userdata('GROUP_MENU');
    	$kode_kantor = $this->session->userdata('KODE_KANTOR');

    	if($group_menu =="IT" || $group_menu =="PUSAT"){
    		$parameter_kantor = "";
    	}else{
    	   $parameter_kantor = "AND kode_kantor ='$kode_kantor' ";
    	}

	    $q1 = "SELECT '' as kode_kantor, 'PILIH DATA' as nama_kantor UNION
	    SELECT id_kantor as kode_kantor, nama_kantor FROM $prm_mater_kantor WHERE 1 $parameter_kantor ";



	    $exe = $this->db->query($q1);

	    echo json_encode($exe->result_array());
	}


}