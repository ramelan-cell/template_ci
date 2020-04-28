<script>

$(function(){

    $('#table').DataTable({
        "searching" :true,
        "lengthChange" : true,
        "sort":false,
        ajax : {
            url : '<?php echo base_url()."setting/setting_menu/data_group_menu" ?>',
            dataSrc : '',
            type : 'post',
        },
        columns: [
            { mData: 'id_group_menu' },
            { mData: 'no_urut'},
            { mData: 'nama_group_menu'},
            { mData: 'font_icon'},
            { mData: 'status_aktif'}
        ],
        aoColumnDefs: [
           {
                aTargets : 0,
                mData : 'id_group_menu',
                mRender : function (data, type, row) {

                        return  '<button class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="form_edit(\''+ data +'\');"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</button>&nbsp;'+
                                '<button class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapusGroupMenu(\''+ data +'\');"><span class="glyphicon glyphicon-trash"></span>&nbsp;Hapus</button>&nbsp;'+
                                '<button class="btn btn-warning btn-sm"  href="javascript:void(0)" onclick="form_detail(\''+ data +'\');"><span class="glyphicon glyphicon-file"></span>&nbsp;Detail</button>&nbsp;';
                   
                }
            }
         ]
    });
});

function refresh(){
    $('#content-mitra').load('<?php echo base_url()."setting/setting_menu" ?>');
}


function tambahGroupMenu(){

    $('#content-mitra').load('<?php echo base_url()."setting/setting_menu/form_tambah" ?>');
}

function form_edit(id_group_menu){
    var data = {id_group_menu : id_group_menu };

     $('#content-mitra').load('<?php echo base_url()."setting/setting_menu/form_ubah" ?>',data);
    
}


function form_detail(id_group_menu){
    var data = {id_group_menu : id_group_menu};

    $('#content-mitra').load('<?php echo base_url().'setting/setting_menu/form_detail_group_menu' ?>',data);

}




function hapusGroupMenu(id_group_menu){

    swal({
      title: "Apakah anda yakin ?",
      text: "Data akan dihapus dan tidak akan kembali lagi ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data = {id_group_menu : id_group_menu};

        $.ajax({
            url: "<?php echo base_url().'setting/setting_menu/hapus_group_menu' ?>",
            type: "POST",
            cache: false,
            data : data,
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
        
      } else {
        swal("batal hapus data");
      }
    });

    
}
</script>

