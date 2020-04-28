<?php
class Setting_akses_menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}


	function index(){
		$this->load->view('mitra/content/setting/setting_akses_menu/v_index');
	}

	function data_user(){
		$prm_user = PRM_USER;
		$prm_master_kantor = PRM_MASTER_KANTOR;
		$prm_master_divisi = PRM_MASTER_DIVISI;
		$prm_master_karyawan = PRM_MASTER_KARYAWAN;
		$prm_master_area = PRM_MASTER_AREA;
		$prm_master_group_menu = PRM_MASTER_GROUP_MENU;
		$prm_master_jabatan = PRM_MASTER_JABATAN;
		$user_id = $this->session->userdata('USER_ID');
		$parameter_keywoard = strtoupper($this->input->post('parameter_keywoard'));
		$kode_kantor = $this->input->post('kode_kantor');

		if(empty($kode_kantor)){
			$parameter_kantor ="";
		}else{
			$parameter_kantor ="AND kode_kantor ='$kode_kantor' ";
		}


		$query="SELECT a.`user_id`,
                       a.`user_name`,
                       a.`password`,
                       a.nik,
                       a.`kode_kantor`,
                       b.`nama_kantor`,
                       h.`nama_lengkap`,
                       a.`id_divisi`,
                       c.`nama_divisi`,
                       a.`id_jabatan`,
                       d.`nama_jabatan`,
                       a.`user_id_induk`,
                       (SELECT nama_lengkap FROM $prm_master_karyawan
                        WHERE nik = e.`nik`) AS nama_atasan,
                       a.`id_group_menu`,
                       g.`nama_group_menu`,
                       a.`id_area`,
                       f.`nama_area`,
                       a.`email`,
                       a.`flg_block`,
                       a.`tgl_expired`        
                FROM $prm_user a LEFT JOIN $prm_master_kantor b
                ON a.`kode_kantor` = b.`id_kantor` LEFT JOIN $prm_master_divisi c
                ON a.`id_divisi` = c.`id_divisi` LEFT JOIN $prm_master_jabatan d
                ON a.`id_jabatan` = d.`id_jabatan` LEFT JOIN $prm_user e
                ON a.`user_id_induk` = e.`user_id` LEFT JOIN $prm_master_area f
                ON a.`id_area` = f.`id_area` LEFT JOIN $prm_master_group_menu g
                ON a.`id_group_menu` = g.`id_group_menu` LEFT JOIN $prm_master_karyawan h
                ON a.nik = h.`nik`
		    WHERE  (a.nik LIKE '%$parameter_keywoard%' or h.nama_lengkap LIKE '%$parameter_keywoard%')
		    $parameter_kantor  ";

		$execute = $this->db->query($query);
		$count = $execute->num_rows();

		if($count > 0){
		    $json = $execute->result_array();
		}else{
		    $json = array();
		}

		echo json_encode($json);
	}

	function form_user(){
		$this->load->view('mitra/content/setting/setting_akses_menu/v_form_user');
	}

	function simpan_user(){
		$prm_user = USER;

		
		$kode_kantor         = $this->input->post('kode_kantor');
		$nik                 = $this->input->post('nik');
		$user_id_induk       = $this->input->post('user_id_induk');
		$nama                 = $this->input->post('nama');
		$tgl_expired         = $this->input->post('tgl_expired');
		$date_nulll = "00/00/0000";

		if(empty($tgl_expired)){
		    $tgl_expired = $date_nulll;
		}else{
		    $tgl_expired = $tgl_expired;
		}

		list($tgl, $bln, $thn) = explode("/", $tgl_expired);
		$tgl_expired = "$thn-$bln-$tgl";
		$username          = $this->input->post('username');
		$password          = $this->input->post('password');
		$kode_jabatan      = $this->input->post('kode_jabatan');
		$kode_divisi       = $this->input->post('kode_divisi');


		$query ="SELECT * from $prm_user where user_name ='$username' OR nik ='$nik' ";
		$result = $this->db->query($query);
		$rows   = $result->num_rows();

		if (empty($nik)) {
		   $isValid = 0;
		   $isPesan = "NIK di isi  !!!"; 
		}elseif (empty($nama)) {
		   $isValid = 0;
		   $isPesan = "Nama lengkap wajib di isi  !!!"; 
		}elseif (empty($kode_kantor)) {
		   $isValid = 0;
		   $isPesan = "kantor wajib di isi  !!!"; 
		}elseif (empty($kode_jabatan)) {
		   $isValid = 0;
		   $isPesan = "jabatab wajib di isi  !!!"; 
		}elseif (empty($kode_divisi)) {
		   $isValid = 0;
		   $isPesan = "divisi lengkap wajib di isi  !!!"; 
		}elseif (empty($tgl_expired)) {
		   $isValid = 0;
		   $isPesan = "Tanggal Expired di isi  !!!"; 
		}elseif (empty($username)) {
		   $isValid = 0;
		   $isPesan = "User di isi  !!!"; 
		}else{
		   if($rows > 0){
		   $isValid = 0;
		   $isPesan = "User sudah dibuat  !!!"; 
		  }else{
		      
		    $query ="INSERT INTO $prm_user (username,password,nama,nik,tgl_expired,id_kantor,id_divisi,id_jabatan,user_id_induk)
		                  VALUES ('$username',md5('$password'),'$nama','$nik','$tgl_expired','$kode_kantor','$kode_divisi','$kode_jabatan','$user_id_induk') ";
		    
		    $exe = $this->db->query($query);
		    if(!$exe){
		        $isValid = 0;
		        $isPesan = "Data gagal tersimpan, error : ".mysqli_error($KONEKSI);
		    }else{
		        $isValid = 1;
		        $isPesan = "Simpan user Sukses !!!";
		    }
		    
		  }
		}

		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function form_edit_user(){
		$prm_user = VIEW_MASTER_DATA_USER;
		$user_id = $this->input->post('user_id');
		$query ="SELECT *
				 from $prm_user WHERE user_id ='$user_id' ";
		$result = $this->db->query($query);
		$x   = $result->row();

		$data['user_id'] = $user_id;
		$data['user'] = $x->username;
		$data['id_divisi'] = $x->id_divisi;
		$data['nama_divisi'] = $x->nama_divisi;
		$data['id_jabatan'] = $x->id_jabatan;
		$data['nama_jabatan'] = $x->nama_jabatan;
		$data['nama_kantor'] = $x->nama_kantor;
		$data['kode_kantor'] = $x->id_kantor;
		$data['nik'] = $x->nik;
		$data['user_id_induk'] = $x->user_id_induk;
		$data['nama'] = $x->nama;
		$data['nama_atasan'] = $x->nama_atasan;
		$tgl_expired = $x->tgl_expired;
		$data['tgl_expired'] = date('d/m/Y',strtotime($tgl_expired));
		$data['flg_block'] = $x->flg_block;

		$this->load->view('mitra/content/setting/setting_akses_menu/v_form_edit_user',$data);
	}

	function update_user(){
		$prm_user = VIEW_MASTER_DATA_USER;
		$prm_user = prm_user;

		$user_id             = $this->input->post('user_id');
		$kode_kantor         = $this->input->post('kode_kantor');
		$nik                 = $this->input->post('nik');
		$nama                = $this->input->post('nama');
		$user_id_induk       = $this->input->post('user_id_induk');
		$id_user_id_induk    = $this->input->post('id_user_id_induk');
		$tgl_expired         = $this->input->post('tgl_expired');
		$date_nulll = "00/00/0000";

		if(empty($tgl_expired)){
		    $tgl_expired = $date_nulll;
		}else{
		    $tgl_expired = $tgl_expired;
		}

		list($tgl, $bln, $thn) = explode("/", $tgl_expired);
		$tgl_expired = "$thn-$bln-$tgl";
		$username          	= $this->input->post('username');
		$kode_jabatan     	= $this->input->post('kode_jabatan');
		$kode_divisi     	= $this->input->post('kode_divisi');
		$flg_block 			= $this->input->post('flg_block');

		$id_kantor 			= $this->input->post('id_kantor');
		$id_jabatan 		= $this->input->post('id_jabatan');
		$id_divisi 			= $this->input->post('id_divisi');

		if(empty($kode_kantor)){
			$kode_kantor = $id_kantor;
		}
		if(empty($kode_jabatan)){
			$kode_jabatan = $id_jabatan;
		}
		if(empty($kode_divisi)){
			$kode_divisi = $id_divisi;
		}

		if(empty($user_id_induk)){
			$user_id_induk = $id_user_id_induk;
		}


		$query ="SELECT * from $prm_user where (username ='$username' or nik ='$nik') and user_id <> '$user_id' ";

		$result = $this->db->query($query);
		$rows   = $result->num_rows();

		if (empty($nik)) {
		   $isValid = 0;
		   $isPesan = "NIK di isi  !!!"; 
		}elseif (empty($nama)) {
		   $isValid = 0;
		   $isPesan = "Nama lengkap wajib di isi  !!!"; 
		}elseif (empty($tgl_expired)) {
		   $isValid = 0;
		   $isPesan = "Tanggal Expired di isi  !!!"; 
		}elseif (empty($username)) {
		   $isValid = 0;
		   $isPesan = "User di isi  !!!"; 
		}else{
		   if($rows > 0){
		   $isValid = 0;
		   $isPesan = "User sudah dibuat  !!!"; 
		  }else{

		    $query ="UPDATE $prm_user SET username ='$username',
		                                    nik ='$nik',
		                                    nama ='$nama',
		                                    tgl_expired ='$tgl_expired',
		                                    id_kantor ='$kode_kantor',
		                                    id_divisi ='$kode_divisi',
		                                    id_jabatan ='$kode_jabatan',
		                                    flg_block ='$flg_block',
		                                    user_id_induk ='$user_id_induk'
		            WHERE user_id ='$user_id' ";
		    
		    $exe = $this->db->query($query);
		    if(!$exe){
		        $isValid = 0;
		        $isPesan = "Data gagal tersimpan, error : ".mysqli_error($KONEKSI);
		    }else{
		        $isValid = 1;
		        $isPesan = "Update user Sukses !!!";
		    }
		    
		  }
		}

		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

	function form_akses_user(){
		$table_access_menu = PRM_MENU_MITRA_ACCESS;
		$prm_user = PRM_USER;
		$prm_menu_mitra = PRM_MENU_MITRA;
		$table_group_menu = PRM_MENU_GROUP_MITRA;
		$user_id = $this->input->post('user_id');

		$query ="SELECT * from $prm_user where user_id ='$user_id' ";

		$result = $this->db->query($query);
		$x   = $result->row();
		$username   = $x->user_name;

		$error=array();
		$query=array();
		$result=array('rows' => array());

		$query_access="SELECT id_menu from $table_access_menu WHERE user_id='$user_id'";
		$ex_query_access= $this->db->query($query_access);
		$count = $ex_query_access->num_rows();

		if($count > 0){
			$res_query_access = $ex_query_access->row();
			$id_menu=$res_query_access->id_menu;
		}

		if($count == 0){
		    $data_menu="''";
		}else{
		    $data_menu=$id_menu;
		}

		$query ="SELECT a.id_menu,a.id_group_menu,b.nama_group_menu,a.nama_menu,
		        IF(a.id_menu IN ($data_menu),'1','0') AS status_menu
		        FROM $prm_menu_mitra AS a
		        LEFT JOIN $table_group_menu AS b ON a.id_group_menu=b.id_group_menu
		        ORDER BY a.id_group_menu, a.id_menu";

		$result = $this->db->query($query);

		$data['name'] = $username;
		$data['user_id'] = $user_id;
		$data['listmenu'] = $result;

		$this->load->view('mitra/content/setting/setting_akses_menu/v_form_akses_user',$data);
	}

	function form_modal_user(){
		$prm_user = VIEW_MASTER_DATA_USER;
		$query ="SELECT * from $prm_user ";

		$result = $this->db->query($query);
		$jml	= $result->num_rows();
		$data['listmenu'] = $result;
		$data['count'] = $jml;
		$this->load->view('mitra/content/setting/setting_akses_menu/v_form_modal_user',$data);
	}

	function ambil_modal_user(){
		$user_id = isset($_POST['user_id']) ? $_POST['user_id']:"";
		$prm_user = VIEW_MASTER_DATA_USER;

		$json = array();
		$query = "SELECT * from $prm_user WHERE user_id ='$user_id' ";

		$execute = $this->db->query($query);
		$count = $execute->num_rows();

		if($count > 0){
		    $json = $execute->result_array();
		}else{
		    $json = array();
		}

		echo json_encode($json);
	}

	function simpan_akses_menu(){
		$table_access_menu = PRM_MENU_MITRA_ACCESS;
		$prm_user = PRM_USER;
		$prm_master_jabatan = PRM_MASTER_JABATAN;
		$user_id = $this->session->userdata('USER_ID');
		$id_menu = $this->input->post('id_menu');
		$row_user_id = $this->input->post('row_user_id');
		$kode_jabatan = $this->input->post('kode_jabatan');

		if(!empty($kode_jabatan)){

			$query ="SELECT nama_jabatan from $prm_master_jabatan WHERE id_jabatan ='$kode_jabatan' ";
			$result = $this->db->query($query);
			$x = $result->row();
			$jabatan = $result->nama_jabatan;



			$query = "SELECT * from $table_access_menu WHERE jabatan = '$jabatan' LIMIT 1 ";

			$result = $this->db->query($query);
			$jml = $result->num_rows();

			if($jml == 0){
				$isValid = 0;
			    $isPesan = "Jabatan tersebut belum tersedia di hakakses menu";
			    $json = array( "isValid" => $isValid, "isPesan" => $isPesan);
				echo json_encode($json);
				die();
			}else{
				$x= $result->row();
				$id_group_menu = $x->id_group_menu;
				$id_menu = $x->id_menu;
				$id_divisi = $x->divisi_id;
			}

			$query ="SELECT * from $table_access_menu WHERE user_id = '$row_user_id' ";
			$result = $this->db->query($query);
			$count = $result->num_rows();

			if($count == 0){
				$query="INSERT INTO $table_access_menu (user_id,id_group_menu,id_menu,divisi_id,jabatan,
			                                                  created_date,created_time,created_by)
			          values ('$row_user_id','$id_group_menu','$id_menu','$id_divisi','$jabatan',
			                  NOW(),NOW(),'$user_id')";
			}else{
				$query="UPDATE $table_access_menu SET id_group_menu='$id_group_menu',
								id_menu='$id_menu',divisi_id ='$id_divisi',jabatan ='$jabatan',
								updated_date=NOW(),updated_time=NOW(),updated_by='$user_id' 
			            WHERE user_id='$row_user_id'";
			}

			$ex_query= $this->db->query($query);

			if ($ex_query){
			      $isValid = 1;
			      $isPesan = "Proses  berhasil !!!";
			}else{
			      $isValid = 0;
			      $isPesan = "Proses  gagal !!!";
			}

		}else{
			$query ="SELECT id_divisi,id_jabatan from $prm_user where user_id = '$row_user_id'";

			$result  = $this->db->query($query);
			$data    = $result->row();
			$divisi  = $data->id_divisi;
			$jabatan  = $data->id_jabatan;


			if (isset($_POST['id_menu'])){
			  $jumlahData=COUNT($id_menu);
			  $QUERY_USER="SELECT user_id FROM $table_access_menu WHERE user_id='$row_user_id'";
			  $EX_QUERY_USER= $this->db->query($QUERY_USER);
			  $JUMLAH= $EX_QUERY_USER->num_rows();

			  if ($id_menu=="" || empty($id_menu)){
			      $data_menu=0;
			  }else{
			      $data_menu=$id_menu;
			  }

			  $id_menu_arr ="";
			  $id_group_menu_arr ="";

			  if(!empty($id_menu)){
			      for ($i=0; $i < $jumlahData ; $i++) { 
			          if($i == $jumlahData - 1){
			             $id_menu_arr .= $id_menu[$i];  
			         }else{
			              $id_menu_arr .= $id_menu[$i].","; 
			         }
			          
			      }
			     
			      $query ="SELECT DISTINCT id_group_menu FROM prm_menu_mitra WHERE id_menu IN ($id_menu_arr)";
			      $result = $this->db->query($query);

			      foreach ($result->result_array() as $x) {
			      	$jml_group [] = $x['id_group_menu'];
			      }

			      for ($i=0; $i < count($jml_group) ; $i++) { 
			          if($i == count($jml_group) - 1){
			             $id_group_menu_arr .= $jml_group[$i];  
			         }else{
			              $id_group_menu_arr .= $jml_group[$i].","; 
			         }
			          
			      }

			  }


			  $json = array();

			  if($JUMLAH==0){
			      $query="INSERT INTO $table_access_menu (user_id,id_group_menu,id_menu,divisi_id,jabatan,
			                                                  created_date,created_time,created_by)
			          values ('$row_user_id','$id_group_menu_arr','$id_menu_arr','$divisi','$jabatan',
			                  NOW(),NOW(),'$user_id')";
			  }else{
			      $query="UPDATE $table_access_menu SET id_group_menu='$id_group_menu_arr',id_menu='$id_menu_arr',
			                                                divisi_id ='$divisi',jabatan ='$jabatan',updated_date=NOW(),
			                                                updated_time=NOW(),updated_by='$user_id' 
			              WHERE user_id='$row_user_id'";

			  }


			  $ex_query= $this->db->query($query);

			  if ($ex_query){
			      $isValid = 1;
			      $isPesan = "Proses  berhasil !!!";
			  }else{
			      $isValid = 0;
			      $isPesan = "Proses  gagal !!!";
			  }
			  
			}else{

			      $query="UPDATE $table_access_menu SET id_group_menu='',id_menu='',
			                                                divisi_id ='$divisi',jabatan ='$jabatan',updated_date=NOW(),
			                                                updated_time=NOW(),updated_by='$user_id' 
			              WHERE user_id='$row_user_id'";

			      $ex_query= $this->db->query($query);

			      if ($ex_query){
			          $isValid = 1;
			          $isPesan = "Proses  sukes !!!";
			      }else{
			          $isValid = 0;
			          $isPesan = "Proses  gagal !!!";
			      }

			}

		}

		$json = array( "isValid" => $isValid, "isPesan" => $isPesan);
		echo json_encode($json);
	}

}