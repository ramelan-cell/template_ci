 <form method="post" name="formData" id="formData" action="javascript:void(0)" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4" id="label-form">
           Kantor
        </div>
        <div class="col-md-4">
            <div id="display_kantor">
                <input type="hidden" name="id_kantor" value="<?php echo $kode_kantor ?>">
                <input disabled name="nama_kantor" id="nama_kantor" value="<?php echo $nama_kantor?>" class="form-control" style="width:75%;display:inline;">
                &nbsp;
                <button type="button" class="btn btn-primary" onclick="show_update_kantor()">
                    <i class="glyphicon glyphicon-edit"></i>
                </button>
            </div>
            <div id="update_kantor" style="display:none">
                <select class="form-control" id="kode_kantor" name="kode_kantor" style="width: 75%;display: inline;">
                    <option value="">PILIH DATA</option>
                </select>
                &nbsp;
                <button type="button" class="btn btn-danger" onclick="hide_update_kantor()">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Username
        </div>
        <div class="col-md-4">
            <input readonly  class="form-control" required id="username" value="<?php echo $user ?>" name="username"  placeholder="Username">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nik
        </div>
        <div class="col-md-4">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <input class="form-control" name="nik" id="nik" value="<?php echo $nik ?>">
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nama lengkap
        </div>
        <div class="col-md-4">
            <input class="form-control" name="nama" id="nama" value="<?php echo $nama ?>" onkeyup="javascript:this.value=this.value.toUpperCase()">
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nama Atasan
        </div>
        <div class="col-md-4">
            <div id="display_user_id_induk">
                <input type="hidden" name="id_user_id_induk" value="<?php echo $user_id_induk ?>">
                <input disabled name="nama_user_id_induk" id="nama_user_id_induk" value="<?php echo $nama_atasan ?>" class="form-control" style="width:75%;display:inline;">
                &nbsp;
                <button type="button" class="btn btn-primary" onclick="show_update_user_id_induk()">
                    <i class="glyphicon glyphicon-edit"></i>
                </button>
            </div>
            <div id="update_user_id_induk" style="display:none">
                <select class="form-control" name="user_id_induk" id="user_id_induk" style="display: inline;width: 75%">
                    <option value="">PILIH DATA</option>
                </select>
                &nbsp;
                <button type="button" class="btn btn-danger" onclick="hide_update_user_id_induk()">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Jabatan
        </div>
        <div class="col-md-4">
             
            <div id="display_jabatan">
                <input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan ?>">
                <input disabled name="nama_jabatan" id="nama_jabatan" value="<?php echo $nama_jabatan ?>" class="form-control" style="width:75%;display:inline;">
                &nbsp;
                <button type="button" class="btn btn-primary" onclick="show_update_jabatan()">
                    <i class="glyphicon glyphicon-edit"></i>
                </button>
            </div>
            <div id="update_jabatan" style="display:none">
                <select class="form-control" id="kode_jabatan" name="kode_jabatan" style="width: 75%;display: inline;">
                    <option value="">PILIH DATA</option>
                </select>
                &nbsp;
                <button type="button" class="btn btn-danger" onclick="hide_update_jabatan()">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Divisi
        </div>
        <div class="col-md-4">
            <div id="display_divisi">
                <input type="hidden" name="id_divisi" value="<?php echo $id_divisi ?>">
                <input disabled name="nama_divisi" id="nama_divisi" value="<?php echo $nama_divisi ?>" class="form-control" style="width:75%;display:inline;">
                &nbsp;
                <button type="button" class="btn btn-primary" onclick="show_update_divisi()">
                    <i class="glyphicon glyphicon-edit"></i>
                </button>
            </div>
            <div id="update_divisi" style="display:none">
                <select class="form-control" id="kode_divisi" name="kode_divisi" style="width: 75%;display: inline;">
                    <option value="">PILIH DATA</option>
                </select>
                &nbsp;
                <button type="button" class="btn btn-danger" onclick="hide_update_divisi()">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Tanggal Expired
        </div>
        <div class="col-md-4">
            <input  class="form-control" required id="tgl_expired" value="<?php echo $tgl_expired ?>" name="tgl_expired" >
        </div>
    </div>
     <div class="row">
        <div class="col-md-4" id="label-form">
           Status
        </div>
        <div class="col-md-4">
            <select class="form-control"  id="flg_block" name="flg_block" >
                <option value="N">Aktif</option>
                <option value="Y">Non Aktif</option>
            </select>
        </div>
    </div>
    <hr width="100%">
    <div class="row">
        <div class="col-md-12">

          <button class="btn btn-danger btn-sm" onclick="refresh()"><i class="glyphicon glyphicon-backward"></i> Batal</button> &nbsp;
            <button  class="btn btn-primary btn-sm" onclick="update()" ><i class="glyphicon glyphicon-save"></i>Update</button>
        </div>
    </div>
</form>

<script>

$(function(){


    $('#tgl_expired').datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth: true,
        changeYear: true
    });

    $.ajax({
        url : '<?php echo base_url().'master/master_data_user' ?>',
        cache : false,
        type : 'post',
        dataType : 'json',
        success : function(res){;
            var select = $('#user_id_induk');
            var options = select.prop('options');
            $('option', select).remove();
            $.each(res, function(index, array) {
                var user_id = array.user_id;
                var nama = array.nama;
                options[options.length] = new Option(nama, user_id);
            });
        }
    });

    $.ajax({
        url : '<?php echo base_url().'master/master_data_kantor' ?>',
        cache : false,
        type : 'post',
        dataType : 'json',
        success : function(res){;
            var select = $('#kode_kantor');
            var options = select.prop('options');
            $('option', select).remove();
            $.each(res, function(index, array) {
                var kode_kantor = array.kode_kantor;
                var nama_kantor = array.nama_kantor;
                options[options.length] = new Option(nama_kantor, kode_kantor);
            });
        }
    });

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

     $.ajax({
        url : '<?php echo base_url().'master/master_data_divisi' ?>',
        cache : false,
        type : 'post',
        dataType : 'json',
        success : function(res){;
            var select = $('#kode_divisi');
            var options = select.prop('options');
            $('option', select).remove();
            $.each(res, function(index, array) {
                var kode_divisi = array.kode_divisi;
                var nama_divisi = array.nama_divisi;
                options[options.length] = new Option(nama_divisi, kode_divisi);
            });
        }
    });

});

function refresh(){
  $('#content-mitra').load('<?php echo base_url().'backend/setting_akses_menu' ?>');
}


function update(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'backend/setting_akses_menu/update_user' ?>",
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
            }

        
        }
    });

}

function show_update_kantor (){
    $('#update_kantor').show();
    $('#display_kantor').hide();
}

function hide_update_kantor(){
    $('#update_kantor').hide();
    $('#display_kantor').show();
}


function show_update_jabatan (){
    $('#update_jabatan').show();
    $('#display_jabatan').hide();
}

function hide_update_jabatan(){
    $('#update_jabatan').hide();
    $('#display_jabatan').show();
}

function show_update_divisi (){
    $('#update_divisi').show();
    $('#display_divisi').hide();
}

function hide_update_divisi(){
    $('#update_divisi').hide();
    $('#display_divisi').show();
}

function show_update_user_id_induk (){
    $('#update_user_id_induk').show();
    $('#display_user_id_induk').hide();
}

function hide_update_user_id_induk(){
    $('#update_user_id_induk').hide();
    $('#display_user_id_induk').show();
}

</script>

