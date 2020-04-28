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
</script>