

<?php 
  $this->load->view('mitra/content/setting/setting_menu/js');
?> 
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-sm" onclick="tambahGroupMenu()" >
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="table-responsive" >
            <table id="table" class="table table-hover table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th width="30">no urut</th>
                        <th width="200">Group menu</th>
                        <th width="200">Font Icon</th>
                        <th width="100">Status</th>
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

</script>

