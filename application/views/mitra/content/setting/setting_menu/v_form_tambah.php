<form method="post" name="formData" id="formData" action="javascript:void(0)" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nama Group Menu
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="nama_group_menu" id="nama_group_menu" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Font Icon Group Menu
        </div>
        <div class="col-md-4">
            <input class="form-control"  id="font_icon" name="font_icon" value="glyphicon glyphicon-" placeholder="Font Icon Group Menu">
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            No Urut
        </div>
        <div class="col-md-4">
            <input type="number" class="form-control"  id="no_urut" name="no_urut"  placeholder="No urut">
        </div>
    </div>
    <hr width="100%">
    <div class="row">
        <div class="col-md-12">

          <button class="btn btn-danger btn-sm" onclick="refresh()"><i class="glyphicon glyphicon-backward"></i> Batal</button> &nbsp;
            <button  class="btn btn-primary btn-sm" onclick="simpan()" ><i class="glyphicon glyphicon-save"></i>Simpan</button>
        </div>
    </div>
</form>


<script>


function simpan(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'setting/setting_menu/simpan_group_menu' ?>",
        type: "POST",
        cache: false,
        data : formData,
        processData: false,
        contentType: false,
        dataType : 'json',
        success: function(res){


            var isPesan = res.isPesan;
            var isValid = res.isValid;

            if(isValid == 1){
                swal("Good job!", isPesan, "success");
                $('#content-mitra').load('<?php echo base_url().'setting/setting_menu' ?>');
            }else{
                swal("Opsss...", isPesan, "warning");
                return false;
            }

        
        }
    });

}


</script>

