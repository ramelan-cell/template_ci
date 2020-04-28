sss<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="post" name="formData" id="formData">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <font size="4"><b>Input Divisi</b></font>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2" id="label-form">
                    Divisi
                </div>
                <div class="col-md-4">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input class="form-control" name="nama_divisi" id="nama_divisi" onkeyup="javascript:this.value=this.value.toUpperCase()" value="<?php echo $nama_divisi ?>">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" onclick="update_divisi()">
                <span class="glyphicon glyphicon-save"></span> Update
            </button>&nbsp;
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Tutup
            </button>
        </div>
        </form>
    </div>
</div>

<script>

function update_divisi(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'setting/setting_divisi/update_divisi' ?>",
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
                $("#ModalDivisi").modal('hide');
            }else{
                swal("Opsss...", isPesan, "warning");
                return false;
            }
            
        }
    });

}; 

</script>
