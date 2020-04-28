<?php
class Master_data_jabatan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}


	function index(){
        $prm_mater_jabatan = PRM_MASTER_JABATAN;

	    $q1 = "SELECT '' as kode_jabatan, 'PILIH DATA' as nama_jabatan UNION
	    SELECT id_jabatan as kode_jabatan, nama_jabatan FROM $prm_mater_jabatan WHERE 1  ";

	    $exe = $this->db->query($q1);

	    echo json_encode($exe->result_array());
	}


}