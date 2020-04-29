<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="post" name="form_data_warna" id="form_data_warna">
            <div class="modal-header">
                <center><font size="4"><b>Setting Warna</b></font></center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3" id="label-form">
                        Warna
                    </div>
                    <div class="col-md-9">
                        <input type="color" name="warna" class="form-control" id="warna" value="<?php echo $warna ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" id="label-form">
                        Menu
                    </div>
                    <div class="col-md-9">
                        <select class="form-control" id="menu" name="menu">
                            <option value="atas">Atas</option>
                            <option value="samping">Samping</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" id="label-form">
                        Animasi 
                    </div>
                    <div class="col-md-9">
                        <select class="form-control" name="animasi" id="animasi" >
                            <optgroup label="Attention Seekers">
                              <option value="bounce">bounce</option>
                              <option value="flash">flash</option>
                              <option value="pulse">pulse</option>
                              <option value="rubberBand">rubberBand</option>
                              <option value="shake">shake</option>
                              <option value="swing">swing</option>
                              <option value="tada">tada</option>
                              <option value="wobble">wobble</option>
                              <option value="jello">jello</option>
                              <option value="heartBeat">heartBeat</option>
                            </optgroup>

                            <optgroup label="Bouncing Entrances">
                              <option value="bounceIn">bounceIn</option>
                              <option value="bounceInDown">bounceInDown</option>
                              <option value="bounceInLeft">bounceInLeft</option>
                              <option value="bounceInRight">bounceInRight</option>
                              <option value="bounceInUp">bounceInUp</option>
                            </optgroup>

                            <optgroup label="Bouncing Exits">
                              <option value="bounceOut">bounceOut</option>
                              <option value="bounceOutDown">bounceOutDown</option>
                              <option value="bounceOutLeft">bounceOutLeft</option>
                              <option value="bounceOutRight">bounceOutRight</option>
                              <option value="bounceOutUp">bounceOutUp</option>
                            </optgroup>

                            <optgroup label="Fading Entrances">
                              <option value="fadeIn">fadeIn</option>
                              <option value="fadeInDown">fadeInDown</option>
                              <option value="fadeInDownBig">fadeInDownBig</option>
                              <option value="fadeInLeft">fadeInLeft</option>
                              <option value="fadeInLeftBig">fadeInLeftBig</option>
                              <option value="fadeInRight">fadeInRight</option>
                              <option value="fadeInRightBig">fadeInRightBig</option>
                              <option value="fadeInUp">fadeInUp</option>
                              <option value="fadeInUpBig">fadeInUpBig</option>
                            </optgroup>

                            <optgroup label="Fading Exits">
                              <option value="fadeOut">fadeOut</option>
                              <option value="fadeOutDown">fadeOutDown</option>
                              <option value="fadeOutDownBig">fadeOutDownBig</option>
                              <option value="fadeOutLeft">fadeOutLeft</option>
                              <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                              <option value="fadeOutRight">fadeOutRight</option>
                              <option value="fadeOutRightBig">fadeOutRightBig</option>
                              <option value="fadeOutUp">fadeOutUp</option>
                              <option value="fadeOutUpBig">fadeOutUpBig</option>
                            </optgroup>

                            <optgroup label="Flippers">
                              <option value="flip">flip</option>
                              <option value="flipInX">flipInX</option>
                              <option value="flipInY">flipInY</option>
                              <option value="flipOutX">flipOutX</option>
                              <option value="flipOutY">flipOutY</option>
                            </optgroup>

                            <optgroup label="Lightspeed">
                              <option value="lightSpeedIn">lightSpeedIn</option>
                              <option value="lightSpeedOut">lightSpeedOut</option>
                            </optgroup>

                            <optgroup label="Rotating Entrances">
                              <option value="rotateIn">rotateIn</option>
                              <option value="rotateInDownLeft">rotateInDownLeft</option>
                              <option value="rotateInDownRight">rotateInDownRight</option>
                              <option value="rotateInUpLeft">rotateInUpLeft</option>
                              <option value="rotateInUpRight">rotateInUpRight</option>
                            </optgroup>

                            <optgroup label="Rotating Exits">
                              <option value="rotateOut">rotateOut</option>
                              <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                              <option value="rotateOutDownRight">rotateOutDownRight</option>
                              <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                              <option value="rotateOutUpRight">rotateOutUpRight</option>
                            </optgroup>

                            <optgroup label="Sliding Entrances">
                              <option value="slideInUp">slideInUp</option>
                              <option value="slideInDown">slideInDown</option>
                              <option value="slideInLeft">slideInLeft</option>
                              <option value="slideInRight">slideInRight</option>

                            </optgroup>
                            <optgroup label="Sliding Exits">
                              <option value="slideOutUp">slideOutUp</option>
                              <option value="slideOutDown">slideOutDown</option>
                              <option value="slideOutLeft">slideOutLeft</option>
                              <option value="slideOutRight">slideOutRight</option>
                              
                            </optgroup>
                            
                            <optgroup label="Zoom Entrances">
                              <option value="zoomIn">zoomIn</option>
                              <option value="zoomInDown">zoomInDown</option>
                              <option value="zoomInLeft">zoomInLeft</option>
                              <option value="zoomInRight">zoomInRight</option>
                              <option value="zoomInUp">zoomInUp</option>
                            </optgroup>
                            
                            <optgroup label="Zoom Exits">
                              <option value="zoomOut">zoomOut</option>
                              <option value="zoomOutDown">zoomOutDown</option>
                              <option value="zoomOutLeft">zoomOutLeft</option>
                              <option value="zoomOutRight">zoomOutRight</option>
                              <option value="zoomOutUp">zoomOutUp</option>
                            </optgroup>

                            <optgroup label="Specials">
                              <option value="hinge">hinge</option>
                              <option value="jackInTheBox">jackInTheBox</option>
                              <option value="rollIn">rollIn</option>
                              <option value="rollOut">rollOut</option>
                            </optgroup>
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" id="label-form">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="wrap">
                           <span id="animationSandbox2" style="display: block;"><h5 class="site__title mega">Preview Animasi</h5></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Tutup
                </button>&nbsp;
                <button type="submit" onclick="simpanWarna()" class="btn btn-primary" id="btn_save" style="margin:5px">
		            <span class="glyphicon glyphicon-save"></span> Simpan
		        </button>
            </div>
        </form>
    </div>
</div>

<script>

function simpanWarna(){
	$(".preloader").fadeIn();

    var formData = $('#form_data_warna').serialize();
    $.ajax({
        url: "<?php echo base_url().'setting/setting_warna/simpan_data_warna' ?>",
        type: "POST",
        cache: false,
        data : formData,
        dataType : 'json',
        success: function(res){
            $(".preloader").fadeOut();
            var isPesan = res.isPesan;
            var isValid = res.isValid;

            if(isValid == 1){
                swal('Success !',isPesan,'success');
            }else{
                swal('Warning !',isPesan,'warning');
            }

        
        }
    });
}



function testAnimasi(x) {
    $('#animationSandbox2').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $(this).removeClass();
    });
};


$('#animasi').change(function(){
  var anim = $('#animasi').val();
  testAnimasi(anim);
});



</script>