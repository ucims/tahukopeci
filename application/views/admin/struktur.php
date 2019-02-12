<!DOCTYPE html>
<html>
<head>
   <?php

      if ($this->session->flashdata('simpan_ramalan') == 'Gagal') {
        ?>
          echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
        <?php
      } 
    ?>
	<title>Struktur</title>
	<script type="text/javascript" src="../asset/jquery.min.js"></script>
	<script>
      function konfirmasi()
      {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
        else return false;
      };
  </script>
 <!-- Bootstrap -->
  <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>asset/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
	<div class="container body">
      <div class="main_container">

        <?php $this->load->view('admin/nav') ?>
        
            <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Struktur</h2> 
                    <div class="clearfix"></div>
                  </div>
                  <img src="<?php echo base_url();?>asset/img/struktur_new.png" alt="..." width = '520' height ='480' align='center'>             
                </div>
              </div>
            </div>
          </div>
		    <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>   
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>asset/js/custom.min.js"></script>
</body>
</html>
