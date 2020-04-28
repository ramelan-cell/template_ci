<?php

	$created_by = $this->session->userdata('USER_ID');
	$setting_warna = PRM_SETTING_WARNA;
	

	$query ="SELECT warna,menu FROM $setting_warna WHERE user_id ='$created_by' ";
	$result = $this->db->query($query);
	$count = $result->num_rows($result);

	if($count > 0){
		$x = $result->row();
		$warna = $x->warna;
		$menu  = $x->menu;

	}else{
		$query ="SELECT warna ,menu FROM $setting_warna WHERE id ='1' ";
		$result = $this->db->query($query);
		$x = $result->row();
		$warna = $x->warna;
		$menu  = $x->menu;
	}

?>
<div class="container-fluid" id="bungkus">
		<header>
		    <div class="row">
		        <div class="col-md-12">
					<?php 
						if($menu =='samping'){
				          $this->load->view('mitra/v_menu');
						}else{
						  $this->load->view('mitra/v_menu1');
						}
			        ?>
		        </div>
		    </div>
		</header>

		<article>
			<div id="content">
				<div class="panel panel-primary">
						<div class="panel-heading">
								<b><h3 class="panel-title" id="panel-title"></h3></b>
						</div>
						<div class="panel-body">
								<div id="content-mitra"></div>
								
						</div>
				</div>
				
			</div>
		</article>
</div>
<footer class="nav navbar-inverse footer " style="color: #fff;height: auto;right: 0;left: 0;z-index: 1030;border-radius: 0px;">
		<?php 
          $this->load->view('mitra/v_footer');
        ?>
</footer>

<?php 
  $this->load->view('mitra/v_loading');
?>

<div class="backTop">Back to Top</div>
<script>
		var header = "Home";
 		$.ajax({
				url : '<?php echo base_url().'home/logo'?>',
				cache : false,
				success : function(data){
						$('#content-mitra').html(data);
						$('.panel-title').html(header);
				}
		});
</script>



<style type="text/css">

		#bungkus{
			font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
			/*padding-bottom:20px;*/
			font-size: 12px;

		}

		.panel-heading {
				background: #2e6da4;
				color: white;
		}

		#dropdown-menu > li > a:focus, #dropdown-menu > li > a:hover{
				background-image: linear-gradient(to bottom,#f5f5f5 0,#148089 100%);
		}

		.navbar-inverse .navbar-nav .open #dropdown-menu > li > a:focus, .navbar-inverse .navbar-nav .open #dropdown-menu > li > a:hover {
		    color: #fff;
		    background-color: transparent;
				background-image: linear-gradient(to bottom,#f5f5f5 0,#148089 100%);

		}

		#dropdown-menu{
			background: #282828;

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
		    font-size: 12px;
		    text-align: left;
		    list-style: none;
		    background-color: #282828;
		-webkit-background-clip: padding-box;
		background-clip: padding-box;
		border: 1px solid #ccc;
		border: 1px solid
		rgba(0,0,0,.15);
		border-radius: 4px;
		    border-top-left-radius: 4px;
		    border-top-right-radius: 4px;
		-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		box-shadow: 0 6px 12px
		    rgba(0,0,0,.175);
		}

		.dropdown-menu > li > a {
		    display: block;
		    padding: 3px 20px;
		    clear: both;
		    font-weight: 400;
		    line-height: 1.42857143;
		    color: #f7f2f2;
		    white-space: nowrap;
		}

		.navbar-inverse .navbar-nav .open
		#dropdown-menu > li > a {
				color: black;
		}

		.panel-primary > .panel-heading {
		    background-image: linear-gradient(to bottom,<?php echo $warna ?> 0,#111 100%);
		}

		thead{
			background-image: linear-gradient(to bottom,<?php echo $warna ?> 0,#111 100%);
			color: white;
			font-size: 12px;
		}

		tbody{
			font-size: 12px;
			color: black;
		}

		.backTop {
				position: fixed;
				bottom: 0;
				right: 0;
				display: inline-block;
				padding: 1em;
				margin: 1em;
				background: #E8E8E8;
				border: 2px solid #000;
		}
		.backTop:hover {
				cursor: pointer;
		}

		.col-lg-4, .col-lg-5, .col-lg-3, .col-lg-6, .col-lg-8, .col-lg-12 {
			padding-top: 10px;
		}

		.col-md-9{
			padding-top: 10px;
		}
		.col-md-4{
			padding-top: 10px;
		}
		.col-md-5{
			padding-top: 10px;
		}
		.col-md-8{
			padding-top: 10px;
		}
		.col-md-10{
			padding-top: 10px;
		}

		.navbar-brand{
				background-repeat: no-repeat;
				background-size: 40px;
				background-position: left;
		}

		.navbar-inverse {
				/*background: #fc0e0e;*/
				/*background: #282828;*/
				/*background : #2e6da4;*/
				/*background: #2e6da4;*/
				/*border-color: #080808;*/
				background-image: linear-gradient(to bottom,<?php echo $warna ?> 0,#111 100%);
		}


		.navbar-inverse .navbar-brand {
				color: yellow;
		}

		.btn-circle {
			  width: 30px;
			  height: 30px;
			  text-align: center;
			  padding: 6px 0;
			  font-size: 12px;
			  line-height: 1.428571429;
			  border-radius: 15px;
		}

		.btn-circle.btn-lg {
			  width: 50px;
			  height: 50px;
			  padding: 10px 16px;
			  font-size: 18px;
			  line-height: 1.33;
			  border-radius: 25px;
		}

		.btn-circle.btn-xl {
			  width: 280px;
			  height: 280px;
			  padding: 10px 16px;
			  font-size: 24px;
			  line-height: 1.33;
			  border-radius: 270px;
		}

		#label-form{
        padding-top:15px;
    }

	form{
		font-size : 14px;
	}
</style>
