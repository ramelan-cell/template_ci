<div class="row">
    <div class="col-md-12">
        <div class="row">
            <h3 style="margin-left: 15px">Akses User  <?php echo $name  ?> </h3>
        </div>
        <form method="post" name="formData" id="formData" action="javascript:void(0)" enctype="multipart/form-data">
            <input type="hidden" name="row_user_id" value="<?php echo $user_id ?>">
            <div style="height:300px;overflow-y: scroll;">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10%"></th>
                                <th>Nama Group Menu</th>
                                <th>Nama Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listmenu->result_array() as $data){
                                    $id_menu = $data['id_menu'];
                                    $id_group_menu = $data['id_group_menu'];
                                    $nama_group_menu = $data['nama_group_menu'];
                                    $nama_menu = $data['nama_menu'];
                                    $status_menu = $data['status_menu'];
                                ?>
                                <tr>
                                    <?php if($status_menu =='0'){ ?>
                                            <td align="center">
                                                <input value="<?php echo $id_menu?>" name="id_menu[]" id='id_menu' type="checkbox">
                                            </td>
                                    <?php }else{ ?>
                                            <td align="center">
                                                <input value="<?php echo $id_menu?>" name="id_menu[]" id='id_menu' type="checkbox" checked>
                                            </td>
                                    <?php } ?>
                                    <td><?php echo $nama_group_menu;?></td>
                                    <td><?php echo $nama_menu;?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2" id="label-form">
                    Duplicate jabatan access menu
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="kode_jabatan" id="kode_jabatan" >
                        <option value="">PILIH DATA</option>
                    </select>
                </div>
            </div>
            <hr width="100%">
            <div class="row">
                <div class="col-md-12">
                    <button  class="btn btn-primary btn-sm" onclick="simpan()" ><i class="glyphicon glyphicon-save"></i>Simpan</button>&nbsp;
                    <button  class="btn btn-danger btn-sm" onclick="kembali()" ><i class="glyphicon glyphicon-backward"></i>kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="ModalUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script >

$(function(){
    $.ajax({
        url : '<?php echo base_url().'master/master_data_jabatan' ?>',
        cache : false,
        type : 'post',
        dataType : 'json',
        success : function(res){;
            var select = $('#kode_jabatan');
            var options = select.prop('options');
            $('option', select).remove();
            $.each(res, function(index, array) {
                var kode_jabatan = array.kode_jabatan;
                var nama_jabatan = array.nama_jabatan;
                options[options.length] = new Option(nama_jabatan, kode_jabatan);
            });
        }
    });
});

function refresh(){
    $('#content-mitra').load('<?php echo base_url().'setting/setting_akses_menu' ?>');
}

$('#nama_userlain').click(function(){
    $.ajax({
        url: "<?php echo base_url().'setting/setting_akses_menu/form_modal_user' ?>",
        type: "POST",
        cache: false,
        beforeSend : function(){
            $('#ModalUser').modal({backdrop: 'static', keyboard: false});
        },
        success: function(html){
            $("#ModalUser").modal('show');
            $("#ModalUser").html(html);
        }
    });
});
    
function simpan(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'setting/setting_akses_menu/simpan_akses_menu' ?>",
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
                refresh();
            }else{
                swal("Opsss...", isPesan, "warning");
                return false;
                // $('#content-mitra').load('content/pwk/pwk_normal/form_data.php');
                // form_data();
            }

        
        }
    });

}

function kembali(){
    refresh();
}
</script>
