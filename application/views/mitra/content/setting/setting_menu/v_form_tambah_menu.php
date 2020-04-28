<form method="post" name="formData" id="formData" action="javascript:void(0)" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nama Menu
        </div>
        <div class="col-md-4">
          <input type="hidden" name="id_group_menu" value="<?php echo $id_group_menu ?>">
            <input class="form-control" required id="nama_menu" name="nama_menu" placeholder="Nama Menu">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            No Urut
        </div>
        <div class="col-md-4">
            <input type="number" class="form-control" required id="no_urut" name="no_urut" placeholder="No urut">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Controler
        </div>
        <div class="col-md-4">
            <input class="form-control" required id="controler" name="controler" placeholder="Controler">
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Font Icon
        </div>
        <div class="col-md-4">
            <input class="form-control" value="glyphicon glyphicon-" required id="font_icon" name="font_icon" placeholder="Font Icon">
        </div>
       
    </div>
    <hr width="100%">
    <div class="row">
        <div class="col-md-12">

          <button class="btn btn-danger btn-sm" onclick="kembali()"><i class="glyphicon glyphicon-backward"></i> Batal</button> &nbsp;
            <button  class="btn btn-primary btn-sm"  onclick="simpan()" ><i class="glyphicon glyphicon-save"></i>Simpan</button>
        </div>
    </div>
</form>


<script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })

function kembali (){

    var id_group_menu = "<?php echo $id_group_menu ?>";
    var data ={id_group_menu : id_group_menu};

     $('#content-mitra').load('<?php echo base_url().'setting/setting_menu/form_detail_group_menu' ?>',data);
    
}


function simpan(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'setting/setting_menu/simpan_menu' ?>",
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
                var id_group_menu = res.id_group_menu;
                var data = {id_group_menu : id_group_menu};

                $('#content-mitra').load('<?php echo base_url().'setting/setting_menu/form_detail_group_menu' ?>',data);
            }else{
                swal("Opsss...", isPesan, "warning");
                return false;
                // $('#content-mitra').load('content/pwk/pwk_normal/form_data.php');
                // form_data();
            }

        
        }
    });

}


</script>

