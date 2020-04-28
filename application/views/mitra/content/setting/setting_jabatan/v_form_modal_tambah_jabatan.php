<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="post" name="formData" id="formData">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <font size="4"><b>Input jabatan</b></font>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2" id="label-form">
                    jabatan
                </div>
                <div class="col-md-4">
                    <input class="form-control" name="nama_jabatan" id="nama_jabatan" onkeyup="javascript:this.value=this.value.toUpperCase()">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" onclick="simpan_jabatan()">
                <span class="glyphicon glyphicon-save"></span> Simpan
            </button>&nbsp;
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Tutup
            </button>
        </div>
        </form>
    </div>
</div>

<script>

function simpan_jabatan(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'backend/setting_jabatan/simpan_jabatan' ?>",
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
            }else{
                swal("Opsss...", isPesan, "warning");
                return false;
            }
            $("#Modaljabatan").modal('hide');
        }
    });

}; 

</script>
