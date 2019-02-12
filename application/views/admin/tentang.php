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
	<title>Resto Tahu Kopeci</title>
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
                    <h2>Tentang Resto Tahu Kopeci</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <p>Tahu merupakan panganan yang diolah dari biji kedelai melalui proses fermentasi.  Diantara sentra produksi tahu yang terkenal 	adalah produksi tahu “Kopeci” (Koperasi Pemuda Cikentrungan)<br><br>	
					Tahu kopeci atau dikenal juga sebagai tahu lamping yaitu tahu asli Kuningan. Kuliner khas Kuningan yang satu ini konon lebih lezat daripada tahu sumedang. walaupun secara fisik bentuk kedua tahu ini nampak sama. Berbentuk kotak persegi empat dan setelah digoreng berwarna coklat. Tahu loadadmping ini memiliki bagian dalam yang padat dan halus,Rasanya gurih. Tahu Kopeci sangat cocok dinikmati bersamaan dengan cabai rawit. <br><br>
					Sekitar tahun 2000 bapak wandi memulai usaha  tahu. Usaha tahu ini awalnya adalah milik Orang tua Bapak wandi . Dan setelah beliau meninggal usaha ini diteruskan oleh bapak wandi. Usaha yang dijalankan awalnya hanya usaha tahu rumahan yang memiliki fasilitas pabrik kecil dan peralatan yang terbatas, dengan modal awal Rp.50jt. Sekarang setelah dikelola oleh bapak wandi, usaha tahu ini semakin berkembang</p>
							
        					<p  align="center"> <h2>Foto - Foto</h2> </p>
        					<img src="<?php echo base_url();?>asset/img/owner.png" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar1.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar2.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar3.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar4.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar5.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar6.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <img src="<?php echo base_url();?>asset/img/gambar7.jpg" alt="..."  width = '320' height ='460' align='center'>  
                  <!-- <img src="<?php echo base_url();?>asset/img/gambar8.jpg" alt="..."  width = '320' height ='460' align='center'>   -->

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
