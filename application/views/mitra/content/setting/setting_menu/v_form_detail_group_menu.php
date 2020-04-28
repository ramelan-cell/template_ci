<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-sm" onclick="tambahMenu()" >
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </button>&nbsp;
                <button class="btn btn-warning btn-sm" onclick="kembali()" >
                  <i class="glyphicon glyphicon-backward"></i> Kembali
                </button>
            </div>
        </div>
        <hr width="100%">
        <div class="table-responsive" >
            <table id="table" class="table table-hover table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th width="50">Action</th>
                        <th width="200">Menu </th>
                        <th width="100">Controler</th>
                        <th width="50">Font Icon</th>
                        <th width="20">Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>

$('#parameter_keyword').keyup(function(){
    doSearch();
});

function kembali (){

    $('#content-mitra').load('<?php echo base_url().'setting/setting_menu' ?>');
}

function tambahMenu (){
    var id_group_menu = "<?php echo $id_group_menu; ?>";
    var data = {id_group_menu : id_group_menu};

    $('#content-mitra').load('<?php echo base_url().'setting/setting_menu/form_tambah_menu' ?>',data);
}


$(function(){

    var id_group_menu = "<?php echo $id_group_menu; ?>";
    var data = {id_group_menu : id_group_menu};


    $('#table').DataTable({
        "searching" :false,
        "lengthChange" : false,
        "sort":false,
        ajax : {
            url : '<?php echo base_url().'setting/setting_menu/data_menu' ?>',
            dataSrc : '',
            type : 'post',
            data : data,
        },
        columns: [
            { mData: 'id_menu' },
            { mData: 'nama_menu'},
            { mData: 'controler'},
            { mData: 'font_icon'},
            { mData: 'status_aktif'}
        ],
        aoColumnDefs: [
           {
                aTargets : 0,
                mData : 'id_menu',
                mRender : function (data, type, row) {

                        return  '<button class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="form_edit_menu(\''+ data +'\');"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</button>&nbsp;'+
                                '<button class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus_data_menu(\''+ data +'\');"><span class="glyphicon glyphicon-trash"></span>&nbsp;Hapus</button>&nbsp;';
                   
                }
            }
         ]
    });
});

function form_edit_menu(id_menu){
    var data ={id_menu : id_menu};

     $('#content-mitra').load('<?php echo base_url().'setting/setting_menu/form_ubah_menu' ?>',data);
}


function hapus_data_menu(id_menu){
    var data = {id_menu :id_menu}

    swal({
      title: "Apakah anda yakin ?",
      text: "Data akan terhapus dan tidak kembali !!!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        $.ajax({
            url: "<?php echo base_url().'setting/setting_menu/hapus_menu' ?>",
            type: "POST",
            cache: false,
            data : data,
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
                }
            }
        });
        
      } else {
        swal("proses hapus batal ");
      }
    });
}

</script>

