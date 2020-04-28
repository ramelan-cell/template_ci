
<?php 
  $this->load->view('mitra/content/setting/setting_divisi/js');
?> 
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-9">
                <button class="btn btn-primary btn-sm" onclick="tambahdivisi()" >
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </button>&nbsp;
                <button class="btn btn-warning btn-sm" onclick="refresh()" >
                  <i class="glyphicon glyphicon-refresh"></i> Refresh
                </button>
            </div>
        </div>
        <hr width="100%">
        <div class="table-responsive" >
            <table id="table" class="table table-hover table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Nama Divisi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div id="ModalDivisi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script>

$('#parameter_keyword').keyup(function(){
    doSearch();
});

</script>

