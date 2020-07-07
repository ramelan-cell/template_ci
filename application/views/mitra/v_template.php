<?php

	$created_by = $this->session->userdata('USER_ID');
	$setting_warna = PRM_SETTING_WARNA;
	

	$query ="SELECT warna,menu,animasi FROM $setting_warna WHERE user_id ='$created_by' ";
	$result = $this->db->query($query);
	$count = $result->num_rows($result);

	if($count > 0){
		$x = $result->row();
		$warna = $x->warna;
		$menu  = $x->menu;
		$animasi = $x->animasi;

	}else{
		$query ="SELECT warna ,menu FROM $setting_warna WHERE id ='1' ";
		$result = $this->db->query($query);
		$x = $result->row();
		$warna = $x->warna;
		$menu  = $x->menu;
		$animasi = $x->animasi;
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
			<div id="animationSandbox" style="display: none;">
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

$(function(){
	setTimeout(function(){
        $('#animationSandbox').css('display','block');
        var anim = '<?php echo $animasi ?>';
        testAnim(anim);
    },300);
})

var header = "Home";
	$.ajax({
		url : '<?php echo base_url().'home/logo'?>',
		cache : false,
		success : function(data){
				$('#content-mitra').html(data);
				$('.panel-title').html(header);
		}
});

$(function(){
    var height = $('.navbar-header').height() + parseInt(10);
    $('#content').css({'padding-top':height});

    $(document).on("click", "a.menu-kiri", function(e){
        try{
        	
            var $this=$(this);
            var class_name_array=$this.attr('class').replace('active').trim().split(' ');
            var isPath=$this.data('path');
            var header = $this.data('header');
            var url=class_name_array[class_name_array.length-1];
            var dataTable="path="+isPath+"&url="+url;

            $.ajax({
                url : isPath,
                cache : false,
                success : function(data){
                    $('#content-mitra').html(data);
                    $('#panel-title').html(header);
                }
            });
            $('#btn_collapse').trigger('click');

            setTimeout(function(){
                $('#animationSandbox').css('display','block');
                var anim = '<?php echo $animasi ?>';
                testAnim(anim);
            },1000);

            return false;
        }catch(e){
            alert(e);
        }
    });

    $('#footer').load('footer.php');

    history.pushState(null, null); window.addEventListener('popstate', function(event) { history.pushState(null, null); });

});


function testAnim(x) {
    $('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $(this).removeClass();
    });
};


function formatNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
}

$(function() {
      var $backToTop = $(".backTop");
      $backToTop.hide();
      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
          $backToTop.fadeIn();
        } else {
          $backToTop.fadeOut();
        }
      });

      $backToTop.on('click', function(e) {
        $("html, body").animate({scrollTop: 0}, 500);
      });
});

function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa  = split[0].length % 3,
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function checkPassword(){
    var password_baru=$('#password_baru').val();
    var password_baru_2=$('#password_baru_2').val();

    if(password_baru!=password_baru_2){
        $('#check_password').html('<font color="red" size="3"><span class="glyphicon glyphicon-user">&nbsp; Password Tidak Sama</span></font>');
        document.getElementById('btn_simpan_password').disabled=true;
    }else{
        $('#check_password').html('<font color="green" size="3"><span class="glyphicon glyphicon-user">&nbsp; Password Sesuai</span></font>');
        document.getElementById('btn_simpan_password').disabled=false;
    }
}

function simpanPassword(){
    var password_lama=$('#password_lama').val();
    var password_baru=$('#password_baru').val();
    var password_baru_2=$('#password_baru_2').val();

    var queryParams = {
        password_lama : password_lama,
        password_baru : password_baru,
        password_baru_2 : password_baru_2
    }

    $.ajax({
      type: "POST",
          url: "__proses_simpan_password.php",
          data: queryParams,
          dataType : 'json',
          cache: false,
          beforeSend : function(){
              document.getElementById('btn_simpan_password').disabled=true;
          },
          success: function(data){
              document.getElementById('btn_simpan_password').disabled=false
              if(data.status==0){
                  $('#hasilProses').html(data.pesan);
              }else{
                  alert(data.pesan);
                  $('#btn_close').trigger('click');
              }
          }
    });
}


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
