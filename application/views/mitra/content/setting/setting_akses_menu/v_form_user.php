
<form method="post" name="formData" id="formData" action="javascript:void(0)" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4" id="label-form">
           Kantor
        </div>
        <div class="col-md-4">
            <select class="form-control" id="kode_kantor" name="kode_kantor">
                <option value="">PILIH DATA</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Username
        </div>
        <div class="col-md-4">
            <input  class="form-control" required id="username"  name="username"  placeholder="Username">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Password
        </div>
        <div class="col-md-4">
            <input type="password" class="form-control" required id="password"  name="password"  placeholder="Password">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nik
        </div>
        <div class="col-md-4">
            <input class="form-control" name="nik" id="nik" >
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nama lengkap
        </div>
        <div class="col-md-4">
            <input class="form-control" name="nama" id="nama" onkeyup="javascript:this.value=this.value.toUpperCase()">
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
            Nama Atasan
        </div>
        <div class="col-md-4">
            <select class="form-control" name="user_id_induk" id="user_id_induk">
                <option value="">PILIH DATA</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Jabatan
        </div>
        <div class="col-md-4">
             <select class="form-control" id="kode_jabatan" name="kode_jabatan">
                <option value="">PILIH DATA</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Divisi
        </div>
        <div class="col-md-4">
            <select class="form-control" id="kode_divisi" name="kode_divisi">
                <option value="">PILIH DATA</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="label-form">
           Tanggal Expired
        </div>
        <div class="col-md-4">
            <input  class="form-control" required id="tgl_expired" name="tgl_expired" >
        </div>
    </div>
    <hr width="100%">
    <div class="row">
        <div class="col-md-12">

          <button class="btn btn-danger btn-sm" onclick="refresh()"><i class="glyphicon glyphicon-backward"></i> Batal</button> &nbsp;
            <button  class="btn btn-primary btn-sm" onclick="simpan()" ><i class="glyphicon glyphicon-save"></i>Simpan</button>
        </div>
    </div>
</form>

<script>

$(function(){

    $('#tgl_expired').datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
    
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


function simpan(){
    var formData = new FormData($('#formData')[0]);

    $.ajax({
        url: "<?php echo base_url().'backend/setting_akses_menu/simpan_user' ?>",
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


</script>

