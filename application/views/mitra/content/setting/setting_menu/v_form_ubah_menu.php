<form method="post" name="formData" id="formData" action="javascript:void(0)" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nama Menu
        </div>
        <div class="col-md-4">
        	  <input type="hidden" name="id_menu" value="<?php echo $id_menu ?>">
            <input type="hidden" name="id_group_menu" value="<?php echo $id_group_menu ?>">
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" required value="<?php echo $nama_menu ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            No Urut
        </div>
        <div class="col-md-4">
            <input type="number" class="form-control" required id="no_urut" name="no_urut" value="<?php echo $no_urut ?>" placeholder="No urut">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            controler
        </div>
        <div class="col-md-4">
            <input class="form-control" value="<?php echo  $controler ?>" required id="controler" name="controler" >
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Font icon
        </div>
        <div class="col-md-4">
            <input class="form-control" value="<?php echo  $font_icon ?>" required id="font_icon" name="font_icon" >
        </div>
       
    </div>
    <div class="row">
    	<div class="col-md-4" id="label-form">
            Status
        </div>
        <div class="col-md-4">
            <select name="status_aktif" id="status_aktif" class="form-control">
            	<option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktif</option>
            </select>
        </div>
    </div>
    <hr width="100%">
    <div class="row">
        <div class="col-md-12">

          <button class="btn btn-danger btn-sm" onclick="kembali()"><i class="glyphicon glyphicon-backward"></i> Batal</button> &nbsp;
            <button  class="btn btn-primary btn-sm " onclick="ubah()" ><i class="glyphicon glyphicon-save"></i>Update</button>
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

function ubah(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'setting/setting_menu/edit_menu' ?>",
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

