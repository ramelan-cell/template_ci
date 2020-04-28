<script>

$(function(){

    $('#table').DataTable({
        "searching" :true,
        "lengthChange" : true,
        "sort":false,
        ajax : {
            url : '<?php echo base_url()."backend/setting_jabatan/data_jabatan" ?>',
            dataSrc : '',
            type : 'post',
        },
        columns: [
            { mData: 'id' },
            { mData: 'nama_jabatan'},
        ],
        aoColumnDefs: [
           {
                aTargets : 0,
                mData : 'id',
                mRender : function (data, type, row) {

                        return  '<button class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="form_edit(\''+ data +'\');"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</button>&nbsp;'+
                                '<button class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapusjabatan(\''+ data +'\');"><span class="glyphicon glyphicon-trash"></span>&nbsp;Hapus</button>&nbsp;';
                   
                }
            }
         ]
    });
});

function refresh(){
    $('#content-mitra').load("<?php echo base_url().'backend/setting_jabatan' ?>");
}


function tambahjabatan(){
    $.ajax({
        url: "<?php echo base_url().'backend/setting_jabatan/form_modal_tambah_jabatan' ?>",
        type: "POST",
        cache: false,
        beforeSend : function(){
            $('#Modaljabatan').modal({backdrop: 'static', keyboard: false});
        },
        success: function(html){
            $("#Modaljabatan").modal('show');
            $("#Modaljabatan").html(html);
        }
    });
}

function form_edit (id){
    var data ={id:id}
    $.ajax({
        url: "<?php echo base_url().'backend/setting_jabatan/form_modal_edit_jabatan' ?>",
        type: "POST",
        data:data,
        cache: false,
        beforeSend : function(){
            $('#Modaljabatan').modal({backdrop: 'static', keyboard: false});
        },
        success: function(html){
            $("#Modaljabatan").modal('show');
            $("#Modaljabatan").html(html);
        }
    });
}

function hapusjabatan(id){
    swal({
      title: "Apakah anda yakin ?",
      text: "Data akan dihapus dan tidak akan kembali lagi ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data = {id : id};

        $.ajax({
            url: "<?php echo base_url().'backend/setting_jabatan/hapus_jabatan' ?>",
            type: "POST",
            cache: false,
            data : data,
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
                }
            }
        });
        
      } else {
        swal("batal hapus data");
      }
    });
}

</script>