<!DOCTYPE html>
<html lang="en">
	
<?php 
	$this->load->view('mitra/v_header');
?>
	
<div class="row justify-content-center" style="margin-top: 50px;">
	<div class="col-md-8">
	    <div class="card-group">
	        <div class="card p-4" style="background-color: black">
	            <div class="card-body" style="background-image: linear-gradient(to bottom,#ee7c1c 0,#111 100%);">
	                <h1 style="color: white">Login</h1>
	                <p class="text-muted" style="color: black">Sign In to your account</p>
	                <?php echo $this->session->flashdata('msg');?>
	                <form class="form floating-label" action="<?php echo base_url().'login/auth'?>" accept-charset="utf-8" method="post">
						<div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="icon-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="icon-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-database"></i>
                                </span>
                            </div>
                            <select class="form-control" id="bisnis" name="bisnis">
                            	<option value="INDIVIDU">INDIVIDU</option>
                            	<option value="KELOMPOK">KELOMPOK</option>
                            </select>
                        </div>
						<div class="input-group mb-3">
							<button class="btn btn-primary btn-raised" type="submit"><span class="fa fa-lock"></span> Login</button>
						</div>
					</form>
	            </div>
	        </div>
	        <div class="card text-white bg-primary py-5 d-md-down-none" style="background-image: linear-gradient(to bottom,#ee7c1c 0,#111 100%);">
	            <div class="card-body text-center">
	                <img src="<?php echo base_url().'assets/images/kami-sistem.png'?>" width="300" heigth="300">
	            </div>
	        </div>
	    </div>
	</div>
</div>
<?php 
	$this->load->view('mitra/v_footer');
?>
