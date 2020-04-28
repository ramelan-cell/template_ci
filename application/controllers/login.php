<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
    }
    function index(){
        $this->load->view('mitra/v_login');
    }

    function auth(){
        $prm_user = PRM_USER;
        $prm_master_kantor = PRM_MASTER_KANTOR;
        $prm_master_divisi = PRM_MASTER_DIVISI;
        $prm_master_karyawan = PRM_MASTER_KARYAWAN;
        $prm_master_area = PRM_MASTER_AREA;
        $prm_master_group_menu = PRM_MASTER_GROUP_MENU;
        $prm_master_jabatan = PRM_MASTER_JABATAN;
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $bisnis = $this->input->post('bisnis');
        $u=$username;
        $p=$password;
        $today = date('Y-m-d');

        $query ="SELECT a.`user_id`,
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
                 where a.user_name='$u' and a.password=md5('$p') and a.flg_block='0' AND a.tgl_expired > $today  ";

        $result = $this->db->query($query);
        $count = $result->num_rows();

        if($count > 0){
             $data          =   $result->row_array();
             $user_id       =   $data['user_id'];         
             $nik           =   $data['nik'];
             $nama          =   $data['nama_lengkap'];
             $id_kantor     =   $data['kode_kantor'];
             $nama_kantor   =   $data['nama_kantor'];
             $id_divisi     =   $data['id_divisi'];
             $divisi        =   $data['nama_divisi'];
             $id_jabatan    =   $data['id_jabatan'];
             $jabatan       =   $data['nama_jabatan'];
             $flg_block     =   $data['flg_block'];
             $user_id_induk =   $data['user_id_induk'];
             $atasan        =   $data['nama_atasan'];
             $id_group_menu =   $data['id_group_menu'];
             $nama_group_menu = $data['nama_group_menu'];
             $id_area       =   $data['id_area'];
             $area          =   $data['nama_area'];
             $email         =   $data['email'];
             $tgl_expired   =   $data['tgl_expired'];

             $this->session->set_userdata('masuk',true);
             $this->session->set_userdata('BISNIS',$bisnis);
             $this->session->set_userdata('USER_ID',$user_id);
             $this->session->set_userdata('USERNAME',$u);
             $this->session->set_userdata('NAMA',$nama);
             $this->session->set_userdata('KODE_KANTOR',$id_kantor);
             $this->session->set_userdata('KANTOR',$nama_kantor);
             $this->session->set_userdata('KODE_DIVISI',$id_divisi);
             $this->session->set_userdata('DIVISI',$divisi);
             $this->session->set_userdata('KODE_JABATAN',$id_jabatan);
             $this->session->set_userdata('JABATAN',$jabatan);
             $this->session->set_userdata('USER_ID_INDUK',$user_id_induk);
             $this->session->set_userdata('ATASAN',$atasan);
             $this->session->set_userdata('EMAIL',$email);
             $this->session->set_userdata('FLG_BLOCK',$flg_block);
             $this->session->set_userdata('NIK',$nik);
             $this->session->set_userdata('KODE_AREA',$id_area);
             $this->session->set_userdata('AREA',$area);
             $this->session->set_userdata('KODE_GROUP_MENU',$id_group_menu);
             $this->session->set_userdata('GROUP_MENU',$nama_group_menu);
             $this->session->set_userdata('TGL_EXPIRED',$tgl_expired);
        }
        
        if($this->session->userdata('masuk') == true){
            redirect('login/berhasillogin');
        }else{
            redirect('login/gagallogin');
        }
    }

    function berhasillogin(){
        redirect('home');
    }
    function gagallogin(){
        $url=base_url('login');
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><strong>Warning!</strong> Username atau Password salah !!!</div>');
        redirect($url);
    }
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
}