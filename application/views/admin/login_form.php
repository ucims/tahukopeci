<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- Bootstrap -->
    <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.reboot.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.grid.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.grid.css" rel="stylesheet">

	<!-- Bootstrap -->
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Custom Theme Style -->   
    <link href="<?php echo base_url();?>asset/css/custom.css" rel="stylesheet">
</head>
<body >
		<div class="col-sm-12 col-xs-12">
         <div class="x_panel">
             <div class="x_title">
                <h2>Login</h2>                   
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
              	<?php 

				 if ($this->session->flashdata('login') == 'gagal') {

				 	$message = "<div class='alert alert-danger ' role='alert'>
				                    <strong>Username dan Password Salah</strong>
				                    <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
				                  </div>";;
				    echo $message;
				 } else if ($this->session->flashdata('login') == 'salah') {

				 	$message = "<div class='alert alert-danger ' role='alert'>
				                    <strong>Password Salah</strong>
				                    <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
				                  </div>";;
				    echo $message;
				 } 
				?>
                <?php
                
                $attributes = array('class' => 'form-horizontal form-label-left ', 'method' => 'post');
                echo form_open('Login/login');
                ?>
    			Username :
				<input type="text" name="username" class="form-control" placeholder="Username">
				Password :
				<input type="password" name="password" class="form-control" placeholder="Password">
				<br>
				<input type="submit" name="login" value="Login" class="btn btn-success">
				<button type="reset" class="btn btn-primary">Reset </button>
		   		<?php echo form_close(); ?>
                    
              </div>
            </div>
        </div>
<!-- jQuery -->
	<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>   
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>asset/js/custom.min.js"></script>
</body>
</html>