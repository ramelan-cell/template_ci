<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="post" name="form_data_kelompok" id="form_data_kelompok">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <font size="4"><b>Data User</b></font>
        </div>
        <div class="modal-body">
            <div style="border:1px solid white;width:100%;height:100%;overflow-y:scroll;overflow-x:scroll;">  
                <div class="table-responsive" width="800">
                    <table id="table_data_kelompok" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5"><center>Pilih</center></th>
                                <th width="200">Username</th>
                                <th width="200">NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($count==0){
                            ?>
                                <tr>
                                    <td align="center" colspan="6">
                                        No data available in table
                                    </td>
                                </tr>
                            <?php
                            }else{
                                foreach($listmenu->result_array() as $key){
                                    $id = $key['user_id'];
                                    $user = $key['username'];
                                    $nik = $key['nik'];
                                ?>
                                <tr>
                                    <td align="center">
                                        <input type="radio" id="id" name="id" value="<?php echo $id;?>">
                                    </td>
                                    <td><?php echo $user?></td>
                                    <td><?php echo $nik?></td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" onclick="pilih_user()">
                <span class="glyphicon glyphicon-save"></span> Pilih
            </button>&nbsp;
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Tutup
            </button>
        </div>
        </form>
    </div>
</div>

<script>
$(function(){
    $('.modal-body').css({height:'350px'});

    setTimeout(function(){
        $('#table_data_kelompok').DataTable();
    },300);


})

function pilih_user(){
    var user_id = $('input:radio[name=id]:checked').val();
    var data ={user_id:user_id}

    $.ajax({
            url: "<?php echo base_url().'backend/setting_akses_menu/ambil_modal_user' ?>",
            type: "POST",
            cache: false,
            data : data,
            dataType : 'json',
            success: function(res){
                $(".preloader").fadeOut();

                var user_id = res[0].user_id;
                var username = res[0].username;

                $('#useridlain').val(user_id);
                $('#nama_userlain').val(username);

                $('#ModalUser').modal('hide');

                
            }
        });
}; 

</script>
