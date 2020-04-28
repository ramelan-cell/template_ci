<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
	}

	function index(){
		$prm_menu_mitra_access = PRM_MENU_MITRA_ACCESS;
		$nama_aplikasi = NAMA_APLIKASI;
		$user_id = $this->session->userdata('USER_ID');

		$query ="SELECT * from $prm_menu_mitra_access where user_id='$user_id'";
		$result = $this->db->query($query);

		$data['user_id'] =$user_id;
		$data['username'] =$this->session->userdata('USERNAME');
		$data['jabatan'] = $this->session->userdata('JABATAN');
		$data['nama'] = $this->session->userdata('NAMA');
		$data['nama_kantor'] = $this->session->userdata('KANTOR');
		$data['bisnis'] = $this->session->userdata('BISNIS');
		$data['nama_aplikasi'] = $nama_aplikasi;
		$data['row'] = $result;

		$this->load->view('mitra/v_index',$data);
	}

	function logo(){
		$this->load->view('mitra/v_logo');
	}


}