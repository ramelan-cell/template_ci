<?php
class Setting_divisi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}

	function index(){
		$this->load->view('mitra/content/setting/setting_divisi/v_index');
	}

	function data_divisi(){
		$PRM_MASTER_DIVISI = PRM_MASTER_DIVISI;
		$json = array();
		$query = "SELECT *
		          FROM $PRM_MASTER_DIVISI  ";

		$execute = $this->db->query($query);
		$count = $execute->num_rows();

		if($count > 0){
		    $json = $execute->result_array();
		}else{
		    $json = array();
		}

		echo json_encode($json);
	}

	function form_modal_tambah_divisi(){
		$this->load->view('mitra/content/setting/setting_divisi/v_form_modal_tambah_divisi');
	}

	function simpan_divisi(){
		$PRM_MASTER_DIVISI = PRM_MASTER_DIVISI;
		$user_id = $this->session->userdata('USER_ID');
		$nama_divisi = $this->input->post('nama_divisi');

		if(empty($nama_divisi)){
			$isValid = 0;
			$isPesan = "Nama divisi tidak boleh kosong !!!";
		}else{
			$query ="SELECT * from $PRM_MASTER_DIVISI WHERE nama_divisi ='$nama_divisi' ";
			$result = $this->db->query($query);
			$row    = $result->num_rows();

			if($row > 0){
				$isValid = 0;
			    $isPesan = "Nama divisi sudah ada !!!";
			}else{
				$query="INSERT INTO $PRM_MASTER_DIVISI(nama_divisi)"
			        . " values ('$nama_divisi')";
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
		
		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function form_modal_edit_divisi(){
		$PRM_MASTER_DIVISI = PRM_MASTER_DIVISI;
		$id = $this->input->post('id');

		$query ="SELECT * from $PRM_MASTER_DIVISI WHERE id_divisi ='$id' ";
		$result = $this->db->query($query);
		$x = $result->row();
		$data['id'] = $id;
		$data['nama_divisi'] = $x->nama_divisi;
		$this->load->view('mitra/content/setting/setting_divisi/v_form_edit_tambah_divisi',$data);
	}

	function update_divisi(){
		$PRM_MASTER_DIVISI = PRM_MASTER_DIVISI;
		$id = $this->input->post('id');
		$nama_divisi = $this->input->post('nama_divisi');


		$query ="UPDATE $PRM_MASTER_DIVISI SET nama_divisi ='$nama_divisi' WHERE id_divisi ='$id' ";
		$result = $this->db->query($query);

		if ($result){
		    $isValid = 1;
		    $isPesan = "Proses simpan berhasil !!!";
		}else{
		    $isValid = 0;
		    $isPesan = "Proses simpan gagal !!!";
		}

		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function hapus_divisi(){
		$PRM_MASTER_DIVISI = PRM_MASTER_DIVISI;
		$PRM_USER = PRM_USER;
		$id = $this->input->post('id');

		$query="SELECT * from $PRM_USER WHERE id_divisi ='$id' ";
		$result = $this->db->query($query);
		$count = $result->num_rows();


		if($count > 0){
			$isValid = 0;
		    $isPesan = "Tidak boleh di delete sudah ada yang memakai !!!";
		}else{
			$query ="DELETE  FROM $PRM_MASTER_DIVISI  WHERE id ='$id' ";
			$result = $this->db->query($query);

			if ($result){
			    $isValid = 1;
			    $isPesan = "Proses hapus berhasil !!!";
			}else{
			    $isValid = 0;
			    $isPesan = "Proses hapus gagal !!!";
			}
		}

		

		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

}