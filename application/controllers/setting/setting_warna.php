<?php
class Setting_warna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
	}

	function index(){
		$created_by = $this->session->userdata('USER_ID');
		$setting_warna = PRM_SETTING_WARNA;

		$query ="SELECT warna FROM $setting_warna WHERE user_id ='$created_by' ";
		$result = $this->db->query($query);
		$count = $result->num_rows($result);

		if($count > 0){
			$x = $result->row();
			$warna = $x->warna;

		}else{
			$query ="SELECT warna FROM $setting_warna WHERE id ='1' ";
			$result = $this->db->query($query);
			$x = $result->row();
			$warna = $x->warna;
		}
		
		$data['warna'] = $warna;

		$this->load->view('mitra/content/setting/setting_warna/v_index',$data);
	}

	function simpan_data_warna(){
		$setting_warna = PRM_SETTING_WARNA;

		$created_by = $this->session->userdata('USER_ID');
		$warna = $this->input->post('warna');
		$menu = $this->input->post('menu');

		$query ="SELECT * FROM $setting_warna WHERE user_id ='$created_by' ";
		$result = $this->db->query($query);
		$count = $result->num_rows();

		if($count > 0){
			$query ="UPDATE $setting_warna SET warna ='$warna' ,menu ='$menu' WHERE user_id ='$created_by' ";
		}else{
			$query ="INSERT INTO $setting_warna (user_id,warna,menu) VALUES ('$created_by','$warna','$menu') ";
		}

		$ex_query= $this->db->query($query);

		if ($ex_query){
		    $isValid = 1;
		    $isPesan = "Proses simpan berhasil !!!";
		}else{
		    $isValid = 0;
		    $isPesan = "Proses simpan gagal !!!";
		}

	}
}