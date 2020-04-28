

<?php 
  $this->load->view('mitra/content/setting/setting_akses_menu/js');
?>
<div class="row">
    <div class="col-md-4">
         <div class="form-group">
            <select class="form-control" name="kode_kantor" id="kode_kantor">
                <option value="">PILIH DATA</option>
            </select>  
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input id="parameter_keywoard" name="parameter_keywoard" class="form-control" placeholder="Nama lengkap">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="tambah_user()" >
          <i class="glyphicon glyphicon-plus"></i> Tambah
        </button>
        <div class="table-responsive" >
            <table id="table" class="table table-hover table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Nama lengkap</th>
                        <th>NIK</th>
                        <th>Nama Kantor</th>
                        <th>Divisi</th>
                        <th>Jabatan</th>
                        <th>Tgl Expired</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<script >

$('#parameter_keywoard').keyup(function(){
    doSearch();
});

$('#kode_kantor').change(function(){
    doSearch();
});

$(function(){
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
        
});

function tambah_user(){
     $('#content-mitra').load('<?php echo base_url().'setting/setting_akses_menu/form_user' ?>');
}

</script>
