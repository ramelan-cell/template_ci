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

?>
<div id="bungkus">
  <div id="menu_atas">
    <span id="menu_bar" class="fa fa-bars" style="background-color: white"></span>
  </div>

  <div id="sidebar">
    <div class="row">
      <div style="margin-left: 10px;"><a class="navbar-brand menu-kiri v_home.php" href="javascript:void(0)" data-path="home/dashbaord" data-header="Home">
        <div class="row" style="margin-top:-14px;font-size: 15px;color: white">
           <img src="<?php echo base_url().'assets/images/logo.png'?>" width="40" height="40">&nbsp;<b><?php echo $nama_aplikasi;?></b>
        </div>
    </a></div>
    </div><br>
      <ul class="sidebar-nav">
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
                        class="menu-kiri ">
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

<style type="text/css">
/*#bungkus {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#bungkus.toggled {
    padding-left: 250px;
}
*/

/*#content{
  padding-top: 0px;
}*/

#menu_bar{
  margin-top: 20px;
  margin-left: 20px;

}

#menu_atas {
    background-image: linear-gradient(to bottom,<?php echo $warna ?> 0,#111 100%);
    margin-left: -20px;
    margin-right: -20px;
    height: 50px;
    margin-top: -5px;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
        margin-top: 2px;
    margin-top: 2px;
    font-size: 12px;
    text-align: left;
    list-style: none;
    background-color: #282828;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    width: 100%;
}
#sidebar {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    margin-top: -50px;
    overflow-y: auto;
    background-image: linear-gradient(to bottom,<?php echo $warna ?> 0,#111 100%);
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#bungkus.toggled #sidebar {
    width: 200px;
}

#page-content-bungkus {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#bungkus.toggled #page-content-bungkus {
    position: absolute;
    margin-right: -250px;
}

.sidebar-nav {
    position: absolute;
    top: 50;
    width: 300px;
    margin: 0;
    padding: 0;
    list-style: none;
    margin-left: -25px;
    margin-top: 20px;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #d35400;
    font-weight: bold;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    background: #d35400;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}
.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
    font-weight: bold;
}

@media(min-width:768px) {

    #content{
/*      margin-top: -20px;*/
      margin-right: -13px;
    }

    #bungkus {
        padding-left: 250px;
    }

    #menu_atas{
      margin-left: -260px;
    }

    #bungkus.toggled {
        padding-left: 0;
    }

    #sidebar {
        width: 250px;
    }

    #bungkus.toggled #sidebar {
        width: 0;
    }

    #page-content-bungkus {
        padding: 20px;
        position: relative;
    }

    #bungkus.toggled #page-content-bungkus {
        position: relative;
        margin-right: 0;
    }
}
</style>

<script type="text/javascript">

    $(document).ready(function(){
        $("#menu_bar").click(function(e) {
          e.preventDefault();
          $("#bungkus").toggleClass("toggled");
        });
    });

    $('.menu-kiri').click(function(e){
        e.preventDefault();
        $("#bungkus").toggleClass("toggled");
    });

</script>