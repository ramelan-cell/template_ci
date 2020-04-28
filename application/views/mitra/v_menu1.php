<?php
$data = $row->row_array();
$count = $row->num_rows();

if($count == 0){
  $id_group_menu = "NULL";
}else{
  $id_group_menu = $data['id_group_menu'];
  $id_menu = $data['id_menu'];
}

if($bisnis == "INDIVIDU"){
  $parameter = "AND versi ='1' AND id_menu_aplikasi in ('1','0') ";
}else{
  $parameter = "AND versi ='1' AND id_menu_aplikasi in ('2','0') ";
}

?>
<div id="menu_aplikasi">
<div class="navbar navbar-inverse navbar-fixed-top" id="mainnav" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" id="btn_collapse" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand menu-kiri v_home.php" href="javascript:void(0)" data-path="home/dashbaord" data-header="Home">
                <div class="row" style="margin-top:-14px;">
                   <img src="<?php echo base_url().'assets/images/kami-sistem.png'?>" width="40" height="40">&nbsp;<b><?php echo $nama_aplikasi;?></b>
                </div>
            </a>
        </div>
        <div  class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                  $prm_menu_group_mitra = PRM_MENU_GROUP_MITRA;
                  $query ="SELECT a.* FROM $prm_menu_group_mitra AS a
                                        WHERE a.id_group_menu IN ($id_group_menu) and a.flag_aktif='1'  $parameter
                                        Order by no_urut asc ";

                  $query_group_menu=$this->db->query($query);

                  foreach ($query_group_menu->result_array() as $res_ex_query_group_menu) {

                    $nama_group_menu=$res_ex_query_group_menu['nama_group_menu'];
                    $font_icon=$res_ex_query_group_menu['font_icon'];
                    $id_group_menu=$res_ex_query_group_menu['id_group_menu'];
                ?>
                <li class="dropdown">
                    <a style="color: white;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="<?php echo $font_icon;?>"></span> &nbsp;<b> <?php echo $nama_group_menu;?></b> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <?php
                          $prm_menu_mitra = PRM_MENU_MITRA;
                          $query = "SELECT distinct     nama_menu,id_menu,font_icon ,controler 
                                    from $prm_menu_mitra as a
                                    where a.id_group_menu=$id_group_menu
                                    AND a.`id_menu` IN ($id_menu)
                                    and a.flag_aktif='1' 
                                    order by a.no_urut asc";

                          $query_group_menu=$this->db->query($query);
                  
                          foreach ($query_group_menu->result_array() as $res_ex_query_menu) {
                              $nama_menu=$res_ex_query_menu['nama_menu'];
                              $font_icon_menu=$res_ex_query_menu['font_icon'];
                              $controler=$res_ex_query_menu['controler'];

                      ?>
                      <li>
                          <a href="javascript:void(0)" data-path="<?php echo $controler;?>" data-header="<?php echo $nama_menu;?>"
                            class="menu-kiri">
                              <span class="<?php echo $font_icon_menu;?>"></span>
                              &nbsp; <b><?php echo $nama_menu;?></b>
                          </a> 
                      </li>
                      <!-- <li role="seperator" class="divider"></li> -->
                      <?php } ?>
                    </ul>
                </li>
                <?php
                }
                ?>
                <li class="dropdown">
                    <a style="color: white;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span> &nbsp; <b><?php echo $username;?></b> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" id="dropdown-menu" >
                        <li>
                            <a href="javascript:void(0)" style="color: white;">
                                <span class="glyphicon glyphicon-user"></span> &nbsp;<b> <?php echo $nama;?></b>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" style="color: white;">
                                <span class="glyphicon glyphicon-user"></span> &nbsp; <b> <?php echo $jabatan;?></b>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" style="color: white;">
                                <span class="glyphicon glyphicon-user"></span> &nbsp; <b> <?php echo $nama_kantor;?></b>
                            </a>
                        </li>
                        <!-- <li role="seperator" class="divider"></li> -->
                        <li>
                            <a href="<?php echo base_url().'login/logout' ?>" style="color: white;">
                                <span class="glyphicon glyphicon-log-out"></span>&nbsp; <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    </div>
</div>
