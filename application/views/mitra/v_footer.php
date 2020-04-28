<?php
  $PT = PT;
  $alamat = ALAMAT;
  $copyright = COPYRIGHT;
?>
<div  id="bungkus" style="height: 250px;">
  <div class="row" style="color: white">
      <div class="col-md-6 item text">
          <h3><?php echo $PT ?></h3>
          <p><?php echo $alamat ?></p>
      </div>
      <div class="col d-none item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
  </div>
  <div class="row">
    <p><center><?php echo $copyright ." " .date('Y') ?></center></p>
  </div>
</div>
