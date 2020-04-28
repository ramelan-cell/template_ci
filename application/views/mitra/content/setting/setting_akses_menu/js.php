<script>
$(function(){

    $('#table').DataTable({
        "searching" :false,
        "lengthChange" : false,
        "sort":false,
        ajax : {
            url : '<?php echo base_url().'setting/setting_akses_menu/data_user' ?>',
            dataSrc : '',
            type : 'post',
        },
        columns: [
            { mData: 'user_id' },
            { mData: 'nama_lengkap' },
            { mData: 'nik'},
            { mData: 'nama_kantor'},
            { mData: 'nama_divisi' },
            { mData: 'nama_jabatan'},
            { mData: 'tgl_expired'}

        ],
        aoColumnDefs: [
           {
                aTargets : 0,
                mData : 'user_id',
                mRender : function (data, type, row) {

                    return  '<button class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="form_edit(\''+ data +'\');"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</button>&nbsp;'+
                             '<button class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="form_setting(\''+ data +'\');"><span class="glyphicon glyphicon-cog"></span>&nbsp;Setting</button>&nbsp;';   

                    
                }
            }
         ]
    });
});


function doSearch(){
    var parameter_keywoard = $('#parameter_keywoard').val();
    var kode_kantor        = $('#kode_kantor').val();

    var queryParams = {
        parameter_keywoard : parameter_keywoard,
        kode_kantor : kode_kantor
    }
    
    $('#table').DataTable().destroy();
    $('#table').DataTable({
        "searching" :false,
        "lengthChange" : false,
        "sort":false,
        ajax : {
            url : '<?php echo base_url().'setting/setting_akses_menu/data_user' ?>',
            dataSrc : '',
            type : 'post',
            data : queryParams
        },
        columns: [
            { mData: 'user_id' },
            { mData: 'nama_lengkap' },
            { mData: 'nik'},
            { mData: 'nama_kantor'},
            { mData: 'nama_divisi' },
            { mData: 'nama_jabatan'},
            { mData: 'tgl_expired'}
        ],
        aoColumnDefs: [
           {
                aTargets : 0,
                mData : 'user_id',
                mRender : function (data, type, row) {

                    return  '<button class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="form_edit(\''+ data +'\');"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</button>&nbsp;'+
                            '<button class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="form_setting(\''+ data +'\');"><span class="glyphicon glyphicon-cog"></span>&nbsp;Setting</button>&nbsp;';        
                    
                                
                }
            }
         ]
    });
}

function form_setting(user_id){
    var data = {user_id : user_id };
    
     $('#content-mitra').load('<?php echo base_url().'setting/setting_akses_menu/form_akses_user' ?>',data);
}

function form_edit(user_id){
    var data = {user_id : user_id };

     $('#content-mitra').load('<?php echo base_url().'setting/setting_akses_menu/form_edit_user' ?>',data);
}



function refresh(){
    $('#content-mitra').load('<?php echo base_url().'setting/setting_akses_menu' ?>');
}

</script>