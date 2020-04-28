<script>

$(function(){

    $('#table').DataTable({
        "searching" :true,
        "lengthChange" : true,
        "sort":false,
        ajax : {
            url : '<?php echo base_url()."setting/setting_divisi/data_divisi" ?>',
            dataSrc : '',
            type : 'post',
        },
        columns: [
            { mData: 'id_divisi' },
            { mData: 'nama_divisi'},
        ],
        aoColumnDefs: [
           {
                aTargets : 0,
                mData : 'id_divisi',
                mRender : function (data, type, row) {

                        return  '<button class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="form_edit(\''+ data +'\');"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</button>&nbsp;'+
                                '<button class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapusdivisi(\''+ data +'\');"><span class="glyphicon glyphicon-trash"></span>&nbsp;Hapus</button>&nbsp;';
                   
                }
            }
         ]
    });
});

function refresh(){
    $('#content-mitra').load("<?php echo base_url().'setting/setting_divisi' ?>");
}


function tambahdivisi(){
    $.ajax({
        url: "<?php echo base_url().'setting/setting_divisi/form_modal_tambah_divisi' ?>",
        type: "POST",
        cache: false,
        beforeSend : function(){
            $('#ModalDivisi').modal({backdrop: 'static', keyboard: false});
        },
        success: function(html){
            $("#ModalDivisi").modal('show');
            $("#ModalDivisi").html(html);
        }
    });
}

function form_edit (id){
    var data ={id:id}
    $.ajax({
        url: "<?php echo base_url().'setting/setting_divisi/form_modal_edit_divisi' ?>",
        type: "POST",
        data:data,
        cache: false,
        beforeSend : function(){
            $('#ModalDivisi').modal({backdrop: 'static', keyboard: false});
        },
        success: function(html){
            $("#ModalDivisi").modal('show');
            $("#ModalDivisi").html(html);
        }
    });
}

function hapusdivisi(id){
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
            url: "<?php echo base_url().'setting/setting_divisi/hapus_divisi' ?>",
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