<?php
class Setting_menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}


	function index(){
		$this->load->view('mitra/content/setting/setting_menu/v_index');
	}

	function data_group_menu(){
		$table_group_menu = PRM_MENU_GROUP_MITRA;
		$json = array();
		$query = "SELECT id_group_menu,no_urut,font_icon,nama_group_menu,
						IF(flag_aktif = '1','Aktif','Non Aktif') AS status_aktif
		          FROM $table_group_menu  Order by no_urut ";

		$execute = $this->db->query($query);
		$count = $execute->num_rows();

		if($count > 0){
		    $json = $execute->result_array();
		}else{
		    $json = array();
		}

		echo json_encode($json);
	}

	function form_detail_group_menu(){
		$x['id_group_menu'] = $this->input->post('id_group_menu');
		$this->load->view('mitra/content/setting/setting_menu/v_form_detail_group_menu',$x);
	}

	function data_menu(){
		$PRM_MENU_MITRA = PRM_MENU_MITRA;
		$id_group_menu= $this->input->post('id_group_menu');;


		$query ="SELECT id_menu,id_group_menu,controler,nama_menu,
		          IF(flag_aktif = '1','Aktif','Non Aktif') AS status_aktif , font_icon
		          FROM $PRM_MENU_MITRA where id_group_menu='$id_group_menu' order by no_urut ";

		$execute = $this->db->query($query);
		$count = $execute->num_rows();

		if($count > 0){
		    $json = $execute->result_array();
		}else{
		    $json = array();
		}

		echo json_encode($json);
	}

	function form_tambah(){
		$this->load->view('mitra/content/setting/setting_menu/v_form_tambah');
	}

	function simpan_group_menu(){
		$table_group_menu  = PRM_MENU_GROUP_MITRA;
		$versi = VERSI;

		$font_icon= $this->input->post('font_icon');
		$nama_group_menu= $this->input->post('nama_group_menu');
		$no_urut= $this->input->post('no_urut');
		$user_id = $this->session->userdata('USER_ID');


		if(empty($nama_group_menu)){
			$isValid = 0;
			$isPesan = "Nama group menu tidak boleh kosong !!!";
			$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
			echo json_encode($json);
			die();
		}

		if(empty($no_urut)){
			$isValid = 0;
			$isPesan = "No urut tidak boleh kosong !!!";
			$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
			echo json_encode($json);
			die();
		}


		$query="INSERT INTO $table_group_menu(font_icon,no_urut,nama_group_menu,
											  created_date,created_by)"
	        . " values ('$font_icon','$no_urut','$nama_group_menu',now(),'$user_id')";
		$ex_query= $this->db->query($query);

		if ($ex_query){
		    $isValid = 1;
		    $isPesan = "Proses simpan berhasil !!!";
		}else{
		    $isValid = 0;
		    $isPesan = "Proses simpan gagal !!!";
		}


		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function form_ubah(){
		$id_group_menu = $this->input->post('id_group_menu');
		$table_group_menu = PRM_MENU_GROUP_MITRA;

		$query = "SELECT id_group_menu,font_icon,nama_group_menu,IF(flag_aktif = '1','Aktif','Non Aktif') AS status_aktif,no_urut
		          FROM $table_group_menu where id_group_menu ='$id_group_menu' ";

		$execute = $this->db->query($query);
		$x    = $execute->row();

		$data['id_group_menu']   = $id_group_menu;
		$data['nama_group_menu'] = $x->nama_group_menu;
		$data['font_icon']       = $x->font_icon;
		$data['status_aktif']    = $x->status_aktif;
		$data['no_urut']         = $x->no_urut;

		$this->load->view('mitra/content/setting/setting_menu/v_form_ubah',$data);

	}

	function update_group_menu(){
		$table_group_menu  = PRM_MENU_GROUP_MITRA;
	
		$status_aktif= $this->input->post('status_aktif');
		$font_icon= $this->input->post('font_icon');
		$nama_group_menu= $this->input->post('nama_group_menu');
		$id_group_menu= $this->input->post('id_group_menu');
		$no_urut= $this->input->post('no_urut');
		$user_id = $this->session->userdata('USER_ID');

		if($status_aktif=="Aktif"){
		    $status='1';
		}else{
		    $status='0';
		}

		$query="UPDATE $table_group_menu SET font_icon='$font_icon',nama_group_menu='$nama_group_menu',
				flag_aktif='$status' ,no_urut ='$no_urut' where id_group_menu='$id_group_menu' ";


		$ex_query= $this->db->query($query);

		if ($ex_query){
		    $isValid = 1;
		    $isPesan = "Proses update berhasil !!!";
		}else{
		    $isValid = 0;
		    $isPesan = "Proses update gagal !!!";
		}



		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function hapus_group_menu(){
		$table_group_menu = PRM_MENU_GROUP_MITRA;
		$PRM_MENU_MITRA = PRM_MENU_MITRA;

		$id_group_menu= $this->input->post('id_group_menu');

		$query ="SELECT * from $PRM_MENU_MITRA WHERE id_group_menu ='$id_group_menu' ";
		$result = $this->db->query($query);
		$count  = $result->num_rows();

		if($count > 0){
			$isValid = 0;
		    $isPesan = "Tidak boleh dihapus ada detailnya !!!";
		}else{
			$query = "DELETE FROM $table_group_menu where id_group_menu='$id_group_menu'";
			$ex_query= $this->db->query($query);

			if ($ex_query){
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

	function form_tambah_menu(){
		$id_group_menu = $this->input->post('id_group_menu');
		$data['id_group_menu'] = $id_group_menu;
		$this->load->view('mitra/content/setting/setting_menu/v_form_tambah_menu',$data);
	}

	function simpan_menu(){
		$PRM_MENU_MITRA  = PRM_MENU_MITRA;
		$no_urut = $this->input->post('no_urut');
		$id_group_menu =  $this->input->post('id_group_menu');
		$nama_menu =  $this->input->post('nama_menu');
		$controler = $this->input->post('controler');
		$font_icon = $this->input->post('font_icon');
		$user_id=$this->session->userdata('USER_ID');


		if(empty($no_urut)){
			$isValid = 0;
		    $isPesan = "No Urut tidak boleh kosong !!!";
		    $json = array( "id_group_menu"=>$id_group_menu, "isValid" => $isValid, "isPesan" => $isPesan);
			echo json_encode($json);
			die;
		}


		if(empty($nama_menu)){
			$isValid = 0;
		    $isPesan = "Kolom tidak boleh kosong !!!";
		    $json = array( "id_group_menu"=>$id_group_menu, "isValid" => $isValid, "isPesan" => $isPesan);
			echo json_encode($json);
			die;
		}

		if(empty($controler)){
			$isValid = 0;
		    $isPesan = "Kolom tidak boleh kosong !!!";
		    $json = array( "id_group_menu"=>$id_group_menu, "isValid" => $isValid, "isPesan" => $isPesan);
			echo json_encode($json);
			die;
		}



		$query="INSERT INTO $PRM_MENU_MITRA(id_group_menu,no_urut,font_icon,nama_menu,controler,created_date,created_by)"
		        . " values ('$id_group_menu','$no_urut','$font_icon','$nama_menu','$controler',now(),'$user_id')";
		$ex_query= $this->db->query($query);

		if ($ex_query){
		    $isValid = 1;
		    $isPesan = "Proses simpan berhasil !!!";
		}else{
		    $isValid = 0;
		    $isPesan = "Proses simpan gagal !!!";
		}

		$json = array( "id_group_menu"=>$id_group_menu, "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function hapus_menu(){
		$PRM_MENU_MITRA  = PRM_MENU_MITRA;
		$id_menu= $this->input->post('id_menu');

		$query ="SELECT id_group_menu from $PRM_MENU_MITRA where id_menu ='$id_menu' ";
		$result = $this->db->query($query);
		$data   = $result->row();
		$id_group_menu = $data->id_group_menu;

		$query="DELETE FROM $PRM_MENU_MITRA where id_menu='$id_menu'";
		$ex_query= $this->db->query($query);

		if ($ex_query){
		    $isValid = 1;
		    $isPesan = "Proses hapus berhasil !!!";
		}else{
		    $isValid = 0;
		    $isPesan = "Proses hapus gagal !!!";
		}

		$json = array( "id_group_menu"=>$id_group_menu, "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function form_ubah_menu(){
		$id_menu = $this->input->post('id_menu');
		$PRM_MENU_MITRA = PRM_MENU_MITRA;
		$query ="SELECT id_menu,no_urut,id_group_menu,controler,nama_menu,
      				IF(flag_aktif = '1','Aktif','Non Aktif') AS status_aktif,
          			font_icon
         		 FROM $PRM_MENU_MITRA where id_menu='$id_menu' ";


		$execute = $this->db->query($query);
		$x       = $execute->row();

		$data['id_menu'] 		 = $id_menu;
		$data['no_urut']   	     = $x->no_urut;
		$data['id_group_menu']   = $x->id_group_menu;
		$data['nama_menu']       = $x->nama_menu;
		$data['controler']       = $x->controler;
		$data['font_icon']       = $x->font_icon;
		$data['status_aktif']    = $x->status_aktif;

		$this->load->view('mitra/content/setting/setting_menu/v_form_ubah_menu',$data);
	}

	function edit_menu(){
		$PRM_MENU_MITRA  = PRM_MENU_MITRA;
		$no_urut= $this->input->post('no_urut');
		$id_group_menu= $this->input->post('id_group_menu');
		$id_menu=  $this->input->post('id_menu');
		$nama_menu= $this->input->post('nama_menu');
		$controler= $this->input->post('controler');
		$font_icon = $this->input->post('font_icon');
		$status_aktif= $this->input->post('status_aktif');
		$user_id=$this->session->userdata('USER_ID');


		if($status_aktif=="Aktif"){
		    $status='1';
		}else{
		    $status='0';
		}

		$query="UPDATE $PRM_MENU_MITRA SET no_urut ='$no_urut', nama_menu='$nama_menu',controler='$controler',flag_aktif='$status' ,
				font_icon ='$font_icon'
				where id_menu='$id_menu'";
		$ex_query= $this->db->query($query);

		if ($ex_query){
		    $isValid = 1;
		    $isPesan = "Proses update berhasil !!!";
		}else{
		    $isValid = 0;
		    $isPesan = "Proses update gagal !!!";
		}

		$json = array( "id_group_menu"=>$id_group_menu, "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}


}