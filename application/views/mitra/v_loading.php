<div class="preloader">
  <div class="loading">
    <img src="<?php echo base_url().'assets/images/loading.gif'?>" width="80">
  </div>
</div>

<style type="text/css">
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #0000;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
      background-color: #0000;
    }
</style>
<script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
</script>